<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
	    	public $timestamp = FALSE;
    protected $connection = "carnetizacion";

    protected $table="pagos";

            public function bancos()
    {
        return $this->hasOne('App\Bancos', 'codban', 'banco');
    }
}
