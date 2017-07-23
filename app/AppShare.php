<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppShare extends Model
{
    public function ByUser(){
      return $this->belongsTo('App\User');
    }
    public function ToUser(){
      return $this->belongsTo('App\User');
    }
}
