<?php
if (!isset($user_type, $studentid) || $user_type != 'student') {
    header("location:studentlogin.php");
    exit;
}
?>