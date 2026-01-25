<?php
if (!isset($user_type, $teacherid) || $user_type != 'teacher') {
    header("location:teacherlogin.php");
    exit;
}
?>