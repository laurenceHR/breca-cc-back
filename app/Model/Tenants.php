<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tenants extends Model {
	protected $table = 'tb_tenants';
	
	public $timestamps = false;
	public $incrementing = false;
}
