<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
   protected $guarded = array('id'); //

   public static $rules =array(
       'yourname' => 'required' ,
       'check' => 'required' ,
       'hobby' => 'required' ,
       'intr' => 'required' ,
     );


   public function histories()
   {
     return $this->hasMany('App\ProfileHistory');
   }
}