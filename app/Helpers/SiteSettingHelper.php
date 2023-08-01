<?php

use App\Models\SiteSetting;

function getSiteSetting($key){
    $ps = SiteSetting::where('key', $key)->first();
    if($ps){
        return $ps->value;
    }else{
        return '';
    }
    
}