<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carnet extends Model
{

    protected $connection = "carnetizacion";
    	public $timestamp = FALSE;
    protected $table = "carnets";
}
