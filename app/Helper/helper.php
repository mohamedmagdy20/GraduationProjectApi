<?php

if (!function_exists('setActivityCauser')) {
    function setActivityCauser($resource)
    {
        try {
            $resource->causer_id = auth()->user()->id;
            $resource->causer_type = "App\Models\Admin";
        } catch (\Exception $th) {
            //throw $th;
        }
    }
}
