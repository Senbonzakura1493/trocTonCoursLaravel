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
     * 
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

     /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request 
     * @return \Illuminate\Http\Response
    */
    public function storeApi(Request $request)
    {
        // validation to do here
        request()->validate([
            'course_id' => 'required',
            'course_two_id' => 'required',
            'f_student_id' => 'required',
            's_student_d' => '',
            'hours' => 'required',
            'status'=> 'required',
            'schoolyear_id'=>'required',
            'description' =>'required'

        ]);
        Collaboration::create($request->all());
        return response()->json([
            'message' => 'successfully added collaboration',  
        ], 201);
        
    }

    /**
     * Put modification to the collaboration
     *@param  \App\Models\Collaboration
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Collaboration $collab,Request $request)
    {
        
        return response()->json([
            'message' => 'Collaboration successfully updated',
            'user_info' => $this->guard()->user()
        ], 201);
    }
}
