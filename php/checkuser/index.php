<?php
function admin($location)
{
    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
        if ($_SESSION['role'] !== '1') {
            return header('location:'.$location);
        }
    }else{
        return header('location:'.$location);
    }
}
function location_back(){
    return  header('location:'. $_SERVER['HTTP_REFERER']);
}
?>