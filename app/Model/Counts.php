<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Counts extends Model {
	protected $table = 'tb_counts';

	protected $appends = ['date_year','date_month','date_day','timestamp']; 
	
	public $timestamps = false;
	public $incrementing = false;

	public function area() {
        return $this->hasOne('App\Model\Areas', 'id', 'area_id');
    }

    public function getTimestampAttribute() {
    	return strtotime($this->date);
    }

    public function getDateYearAttribute() {
    	return date('Y', strtotime($this->date));
    }

    public function getDateMonthAttribute() {
    	return date('m', strtotime($this->date));
    }

    public function getDateDayAttribute() {
    	return date('d', strtotime($this->date));
    }
}
