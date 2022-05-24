<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class photomodel extends Model
{
public $table='gallery';
public $primaryKey='id';
public $incrementing=true;
public $keyType='int';
public  $timestamps=false;
}
