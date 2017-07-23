<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Illuminate\Contracts\Routing\ResponseFactory;
use App\Apps;
class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apps=Apps::all()->toJson();
        // $app=Response::Json($apps);
        // dd($apps);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('apps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $app= new Apps();
        $app->title=$request->title;
        $app->sub_title=$request->sub_title;
        $app->link=$request->link;
        $app->img_url=$request->img_url;
        $app->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Apps::find($id)->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return Apps::find($id)->toJson();
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
      Apps:destroy($id);
      $app= new Apps();
      $app->title=$request->title;
      $app->sub_title=$request->sub_title;
      $app->link=$request->link;
      $app->img_url=$request->img_url;
      $app->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Apps:find($id)->delete();
    }
}
