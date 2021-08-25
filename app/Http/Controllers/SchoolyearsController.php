<?php

namespace App\Http\Controllers;
use App\Models\schoolyears;
use Illuminate\Http\Request;

class SchoolyearsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function indexApi()
    {
        $schoolyears = Schoolyears::latest()->get();
        return response()->json([
            'message' => 'successfully getting schoolyears',
            'schoolyears' => $schoolyears
        ], 200);
    }
}
