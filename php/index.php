<?php
    function getfileImage($img){
        $img_ext = pathinfo($img, PATHINFO_EXTENSION);
        $filename = time() . '.' . $img_ext;
        return $filename;
    }
    function move_file($img,$filename,$path = "../../upload/")
    {
        if( move_uploaded_file($img["tmp_name"],$path.'/'.$filename)){
            return true;
        }
        else{
            return false;
        }
    }
    function delete_file($imgName,$path = "../../upload/")
    {
        if(file_exists($path.$imgName))
        {
            if(unlink($path.$imgName)){
                return true;
            }else{
                return false;
            }
        }
    }