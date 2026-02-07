<?php

function validation(
    $teacherid,
    $user_type
) {
    if (!isset($user_type, $teacherid) || $user_type != 'teacher') {
        header('location:teacherlogin.php');
        exit;
    }
}
?>