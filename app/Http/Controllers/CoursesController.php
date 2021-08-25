<?php

namespace App\Http\Controllers;
use App\Models\courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function indexApi()
    {
        $courses = courses::latest()->get();
        return response()->json([
            'message' => 'successfully getting courses',
            'courses' => $courses
        ], 200);
    }
}
