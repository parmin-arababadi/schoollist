<?php
function validation($studentid, $user_type)
{
    if (!isset($user_type, $studentid) || $user_type != 'student') {
        header("location:studentlogin.php");
        exit;
    }
}
?>