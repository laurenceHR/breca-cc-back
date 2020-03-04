<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Model\Tenants;
use App\Model\Counts;

class TenantsController extends Controller{

	public function counts($tenant_id) {
		$Tenant = Tenants::find($tenant_id);
		if($Tenant){
			return 
				Counts::with(['area' => function($q) use ($tenant_id) {
						$q->where('tenant_id','=',$tenant_id);
					}])					
					->get()					
					->toJson();
		}
		return [];
	}
}
