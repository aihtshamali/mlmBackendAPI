<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return User::all()->toJson();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('username', $request['username'])
                    ->orWhere(function($query) use ($request) {
                      $query->where('email', $request['email']);
                    })->get();
        if (count($user) > 0) {
          return response()->Json([
            'error' => 'username or email already exist, try another one.',
            'error_code' => 20123
          ]);
        }
        $result = User::create([
            'phon'=> "{$request['phon']}",
            'cardNo'=>$request['cardNo'],
            'dependent'=>$request['dependent'],
            'bank_name'=>$request['bank_name'],
            'bankAccNo'=>$request['bankAccNo'],
            'bankRouteNo'=>$request['bankRouteNo'],
            'name' => $request['name'],
            'email' => "{$request['email']}",
            'username' => $request['username'],
            'card_type' => $request['card_type'],
            'billingAddress' => $request['billingAddress'],
            'socialSecurityNo' => $request['socialSecurityNo'],
            'cvv_no' => $request['cvv_no'],
            'dob' => $request['dob'],
            'exp' => $request['exp'],
            'matrial_status' => $request['matrial_status'],
            'password' => bcrypt($request['password']),
        ]);
        return $result->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user=User::find($id);
      return  response()->Json(['id'=>$user->id,
                'name'=>$user->name,
                'username'=>$user->username,
                'card_type'=>$user->card_type,
                'billingAddress'=>$user->billingAddress,
                'socialSecurityNo'=>$user->socialSecurityNo,
                'cvv_no'=>$user->cvv_no,
                'dob'=>$user->dob,
                'exp'=>$user->exp,
                'matrial_status'=>$user->matrial_status,
                'created_at'=>$user->created_at,
                'updated_at'=>$user->updated_at,
              ]);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // return User::find($id)->toJson();
      $user=User::find($id);
      return  response()->Json(['id'=>$user->id,
                'name'=>$user->name,
                'username'=>$user->username,
                'card_type'=>$user->card_type,
                'billingAddress'=>$user->billingAddress,
                'socialSecurityNo'=>$user->socialSecurityNo,
                'cvv_no'=>$user->cvv_no,
                'dob'=>$user->dob,
                'exp'=>$user->exp,
                'matrial_status'=>$user->matrial_status,
                'created_at'=>$user->created_at,
                'updated_at'=>$user->updated_at,
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
    }
}
