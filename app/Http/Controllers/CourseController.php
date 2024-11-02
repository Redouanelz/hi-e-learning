<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use Illuminate\Support\Facades\Log;
use App\Models\Enrollment;
use App\Models\Quiz;

class CourseController extends Controller
{
    public function index()
    {
        return Course::with('instructor')->get(); // Return all courses as JSON
    }


    public function show($id)
    {
        // Fetch the course details by ID
        $course = Course::with('instructor')->findOrFail($id);

        // Return course details as JSON
        return response()->json($course);
    }

    /**
     * Get lessons for a specific course
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getLessons($id)
    {
        // Fetch the course by ID, along with its lessons
        $course = Course::with('lessons')->findOrFail($id);

        // Return the lessons as JSON
        return response()->json($course->lessons);
    }

    public function enroll(Request $request, $courseId)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the course exists
        $course = Course::find($courseId);
        if (!$course) {
            return response()->json(['message' => 'Course not found.'], 404);
        }

        // Check if the user is already enrolled in the course
        $existingEnrollment = Enrollment::where('user_id', $user->id)
            ->where('course_id', $courseId)
            ->first();

        if ($existingEnrollment) {
            return response()->json(['message' => 'You are already enrolled in this course.'], 409);
        }

        // Create a new enrollment
        $enrollment = Enrollment::create([
            'user_id' => $user->id,
            'course_id' => $courseId,
        ]);

        // Return success response
        return response()->json(['message' => 'Successfully enrolled in the course.', 'enrollment' => $enrollment], 201);
    }


    public function isEnrolled($courseId)
    {
        $user = Auth::user();
        $isEnrolled =  Enrollment::where('user_id', $user->id)
            ->where('course_id', $courseId)
            ->exists();
        return response()->json(['isEnrolled' => $isEnrolled]);
    }


    public function unenroll(Request $request, $courseId)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the enrollment exists
        $enrollment = Enrollment::where('user_id', $user->id)
            ->where('course_id', $courseId)
            ->first();

        if (!$enrollment) {
            return response()->json(['message' => 'You are not enrolled in this course.'], 404);
        }

        // Delete the enrollment
        $enrollment->delete();

        // Return success response
        return response()->json(['message' => 'Enrollment removed successfully.'], 200);
    }

    // In CourseController.php or EnrollmentController.php

    public function getStudentEnrollments()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Fetch the user's enrollments along with course details
        $enrollments = Enrollment::where('user_id', $user->id)->with('course')->get();

        // Return as JSON response
        return response()->json($enrollments);
    }


    // In EnrollmentController.php

    public function removeEnrollment($courseId)
    {
        $user = Auth::user();

        // Find the enrollment for this user and course
        $enrollment = Enrollment::where('user_id', $user->id)->where('course_id', $courseId)->first();

        if (!$enrollment) {
            return response()->json(['message' => 'Enrollment not found.'], 404);
        }

        // Delete the enrollment
        $enrollment->delete();

        return response()->json(['message' => 'Enrollment removed successfully.']);
    }


    public function getQuizzes($courseId)
    {
        // Fetch quizzes associated with the course using a direct where clause
        $quizzes = Quiz::where('course_id', $courseId)->get(['id', 'title']);
        
        return response()->json($quizzes);
    }
    

}
