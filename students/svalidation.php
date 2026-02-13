<?php
function validation($studentid=null, $user_type=null)
{
    if ($user_type==null ||$studentid==null || $user_type != 'student') {
        header("location:../both/index.php");
        exit;
    }
}
?>