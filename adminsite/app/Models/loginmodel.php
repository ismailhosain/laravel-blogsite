<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loginmodel extends Model
{
public $table='login';
public $primaryKey='id';
public $incrementing=true;
public $keyType='int';
public  $timestamps=false;
}
