<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coursemodel extends Model
{
public $table='courses';
public $primaryKey='id';
public $incrementing=true;
public $keyType='int';
public  $timestamps=false;

}
