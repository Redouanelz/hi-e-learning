<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use Illuminate\Support\Facades\Log;
use App\Models\Enrollment;


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
}