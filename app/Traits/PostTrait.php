<?php

namespace App\Traits;



Trait PostTrait{

    function PostTrait($images,$folder){
        $file_extension =$images->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $images->move($folder,$file_name);
        return $file_name;
    }

}
