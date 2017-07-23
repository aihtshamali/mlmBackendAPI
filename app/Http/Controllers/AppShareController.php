<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppShare;
use App\User;
use Auth;
class AppShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appShares=AppShare::all();
        return view('appShare.index',compact('appShares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $a=AppShare::all();
      return view('appshare.create',compact($a));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appshare =new AppShare();
        $ByUserid=Auth::user()->id;
        $appshare->ByUser()->associate($ByUserid);
        $TouserId=User::find($request->ToUserId);
        $appshare->ToUser()->associate($TouserId);
        $appshare->phoneNo=$request->phoneNo;
        $appshare->email=$request->email;
        $appshare->fb=$request->fb;
        $appshare->google=$request->google;
        $appshare->downloaded=$request->downloaded;
        $appshare->save();
        return redirect()->route('appshare.index')->withMessage('Data Inserted Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $a=AppShare::find($id);
        return view('appshare.edit',compact('a'));
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
      AppShare::destroy($id);
      $appshare =new AppShare();
      $ByUserid=Auth::user()->id;
      $appshare->ByUser()->associate($ByUserid);
      $TouserId=User::find($request->TouserId);
      $appshare->ByUser()->associate($ToUserid);
      $appshare->phoneNo=$request->phoneNo;
      $appshare->email=$request->email;
      $appshare->fb=$request->fb;
      $appshare->google=$request->google;
      $appshare->downloaded=$request->downloaded;
      $appshare->save();
      return redirect()->route('appshare.index')->withMessage('Data updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
