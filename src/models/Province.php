<?php

namespace Laravolt\Indonesia\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function regencies()
    {
        return $this->hasMany('Laravolt\Indonesia\Models\Regency', 'province_id');
    }
	
	public function getLogoPathAttribute()
    {
    	$folder = 'indonesia-logo/';
    	$id = $this->getAttributeValue('id');
     	$arr_glob = glob(public_path().'/'. $folder. $id.'.*');
     	if(count($arr_glob) == 1){
     		$logo_name = basename($arr_glob[0]);
     		$logo_path = url($folder.$logo_name);
     		return $logo_path;
     	}
     	return null;
    }
}
