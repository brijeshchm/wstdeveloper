<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class HomePage extends Authenticatable
{
     protected $connection = 'mysql';
   protected $table = 'homepages';
}
