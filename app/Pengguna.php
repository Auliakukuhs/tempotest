<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
   protected $table = 'pengguna';
   protected $primaryKey = 'login';
   public $incrementing = false;

   protected $fillable = [
    'login', 'pswd', 'email', 'deskripsi'    
   ];

   public $timestamps = false;

}
