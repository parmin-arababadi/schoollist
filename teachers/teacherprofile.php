<?php
function getprofile()
{
    if (!empty($_SESSION["id"])) {
        $profile = [];
        $profile["first_name"] = $_COOKIE["first_name"];
        $profile["teacherid"] = $_SESSION["id"];
        $profile["user_type"] = $_SESSION["user_type"];
        $profile["nationalcode"] = $_SESSION["nationalcode"];
        return $profile;
    } else {
        return false;
    }
}
?>