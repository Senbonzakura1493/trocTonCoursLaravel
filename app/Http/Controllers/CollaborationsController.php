<?php

namespace App\Http\Controllers;
use App\Models\Collaboration;
use App\Models\User;
use Illuminate\Http\Request;

class CollaborationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function indexApi()
    {
        $collaborations = Collaboration::latest()->get();
        return response()->json([
            'message' => 'successfully getting items',
            'collaborations' => $collaborations
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collaboration
     * @param  \App\Models\User
     * @return \Illuminate\Http\Response
    */
    public function showAPI(User $user )
    {
       
        $collaborations_demandees = Collaboration::where('f_student_id',$user->id)->get();
        $collaborations_acceptees = Collaboration::where('s_student_d',$user->id)->get();
        return response()->json([
            'message' => 'successfully getting item',
            'collaborations_demandees' => $collaborations_demandees,
            'collaborations_acceptees' => $collaborations_acceptees    
        ], 200);
        
    }
}
