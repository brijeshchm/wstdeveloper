<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Contact extends Authenticatable
{
     protected $connection = 'mysql';
   protected $table = 'contactus';
}
