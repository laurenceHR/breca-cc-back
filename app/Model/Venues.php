<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Venues extends Model {
	protected $table = 'tb_venues';
	
	public $timestamps = false;
	public $incrementing = false;
}
