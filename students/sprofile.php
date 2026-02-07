<?php
function getprofile()
{
    if (!empty($_SESSION["id"])) {
        $profile = [];
        $profile["user_type"] = $_SESSION["user_type"];
        $profile["first_name"] = $_COOKIE["first_name"];
        $profile["last_name"] = $_COOKIE["last_name"];
        $profile["studentid"] = $_SESSION["id"];
        $profile["nationalcode"] = $_SESSION["nationalcode"];
        return $profile;
    } else {
        return false;
    }
}
?>