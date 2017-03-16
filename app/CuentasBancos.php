<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuentasBancos extends Model
{
    protected $connection = "sugau";
	public $timestamp = FALSE;
    protected $table="scb_ctabanco";
}
