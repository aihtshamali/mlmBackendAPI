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
      // I think this is the Better Way
      return Apps::all()->toJson();


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

      $apps=Apps::find($id);
      return  response()->Json(['id'=>$apps->id,
                'title'=>$apps->title,
                'sub_title'=>$apps->sub_title,
                'link'=>$apps->link,
                'img_url'=>$apps->img_url,
                'created_at'=>$apps->created_at,
                'updated_at'=>$apps->updated_at,
              ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $apps=Apps::find($id);
      return  response()->Json(['id'=>$apps->id,
                'title'=>$apps->title,
                'sub_title'=>$apps->sub_title,
                'link'=>$apps->link,
                'img_url'=>$apps->img_url,
                'created_at'=>$apps->created_at,
                'updated_at'=>$apps->updated_at,
              ]);
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
