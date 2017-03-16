<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bancos extends Model
{
    protected $connection = "sugau";
	public $timestamp = FALSE;
    protected $table="scb_banco";

        public function cuentas()
    {
        return $this->hasOne('App\CuentasBancos', 'codban', 'codban');
    }
}
