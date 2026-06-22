<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Abouts extends Authenticatable
{
     protected $connection = 'mysql';
   protected $table = 'aboutsus';
}
