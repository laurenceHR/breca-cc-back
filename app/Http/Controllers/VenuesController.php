<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Model\Venues;
use App\Model\SsTenants;

class VenuesController extends Controller{

	public function list() {
		return Venues::orderBy('name')->get()->toJson();
	}

	public function tenants($venue_id) {
		return 
			SsTenants::where('venue_id', $venue_id)				
				->distinct()
				->whereNotNull('area_id')
				->select(['tenant_id','venue_id'])
				->with('tenant')
				->get()
				->take(10)
				->toJson();
	}
}
