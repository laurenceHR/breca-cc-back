<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SsTenants extends Model {
	protected $table = 'tb_ss_tenants';
	
	public $timestamps = false;
	public $incrementing = false;

	public function tenant() {
        return $this->hasOne('App\Model\Tenants', 'id', 'tenant_id');
    }
}
