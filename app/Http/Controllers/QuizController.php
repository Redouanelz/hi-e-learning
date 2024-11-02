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

class QuizController extends Controller
{
    public function show($id)
    {
        // Find the quiz by ID, including its questions
        $quiz = Quiz::with('questions')->findOrFail($id);

        // Return the quiz data as JSON
        return response()->json($quiz);
    }

}
