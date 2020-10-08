<?php

    function get_username($refkey) {
        // dd($refkey);
        $data = DB::Table('contents')->select('value')->where('reference_key',$refkey)->pluck('value')->first();  
        // $d = $data->value;
        return $data;
    }

?>