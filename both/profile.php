<?php
function getprofile()
{
    if (!empty($_SESSION["id"])) {
        $profile = [];
        $profile["user_id"] = $_SESSION["id"];
        $profile["nationalcode"] = $_SESSION["nationalcode"];
        $profile["user_type"] = $_SESSION["user_type"];
        $profile["first_name"] = $_COOKIE["first_name"];
        return $profile;

    }
}

?>