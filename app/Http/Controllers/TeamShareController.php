<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         return TeamShare::all()->toJson();
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         $TeamShare =new TeamShare();
         $ByUserid=Auth::user()->id;
         $TeamShare->ByUser()->associate($ByUserid);
         $TouserId=User::find($request->ToUserId);
         $TeamShare->ToUser()->associate($TouserId);
         $TeamShare->phoneNo=$request->phoneNo;
         $TeamShare->email=$request->email;
         $TeamShare->fb=$request->fb;
         $TeamShare->google=$request->google;
         $TeamShare->joined=$request->joined;
         $TeamShare->save();

     }

     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
       return TeamShare::find($id)->toJson();
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
       return TeamShare::find($id)->toJson();
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $id)
     {
       TeamShare::destroy($id);
       $TeamShare =new TeamShare();
       $ByUserid=Auth::user()->id;
       $TeamShare->ByUser()->associate($ByUserid);
       $TouserId=User::find($request->TouserId);
       $TeamShare->ByUser()->associate($ToUserid);
       $TeamShare->phoneNo=$request->phoneNo;
       $TeamShare->email=$request->email;
       $TeamShare->fb=$request->fb;
       $TeamShare->google=$request->google;
       $TeamShare->downloaded=$request->downloaded;
       $TeamShare->save();
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TeamShare::destroy($id);
    }
}
