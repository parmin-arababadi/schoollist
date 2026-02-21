<?php 
function setsession($firstName,$teacherid,$nationalcode,$user_type){
                setcookie(
                "first_name",
                "$firstName",
                time() + 3600,
                "/"
            );
            $_SESSION["teacherid"] = $teacherid;
            $_SESSION["nationalcode"] = $nationalcode;
            $_SESSION["user_type"] = $user_type;
}
?>