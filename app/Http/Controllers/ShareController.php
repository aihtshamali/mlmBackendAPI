<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Email;
class ShareController extends Controller
{
    public function joinpage() {
      return view('share.join');
    }

    public function email(Request $request) {
      $email = $request->input('email');
      $lnk   = $request->input('link');

      if (empty($email) || empty($lnk)) {
        redirect('/share/join');
      }

      $e = Email::create([
        'to_email' => $email,
        'link'  => $request->input('link'),
        'timestamp_of_share'  => ($request->input('timestamp')/1000),
        'object_id' => $request->input('id'),
        'type'  => $request->input('type'),
        'from_email'  => $request->input('from_email'),
        'via' => $request->input('via')
      ]);
      if ($e) {
        return redirect('/share/join');
      } else {
        return view('share.error');
      }



    }
    public function index(Request $request) {
      $host = 'http://192.168.1.21/shared/email/';
      $data = [];
      if ($request->has('type') &&
          $request->has('id') &&
          $request->has('email') &&
          $request->has('time') &&
          $request->has('via')

          //$request->has('via') &&
          //$request->has('email') &&
          ) {

          $lnk =  $host . '?email=' . $request->input('email')
          . '&id=' . $request->input('id')
          . '&type=' . $request->input('type')
          . '&time=' . $request->input('time');

        $data = [
          'type' => $request->input('type'),
          'id' => $request->input('id'),
          'email' => $request->input('email'),
          'time' => $request->input('time'),
          'link' => $lnk,
          'via' => $request->input('via')
        ];
        return view('share.index', ['data' => $data]);
      } else {
        return view('share.error', ['data' => $data]);

      }

    }
    //
}
