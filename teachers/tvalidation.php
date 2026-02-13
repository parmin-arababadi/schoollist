<?php
function validation(
    $teacherid=null,
    $user_type=null
) {
    if ($user_type==null ||$teacherid==null || $user_type != 'teacher') {
        header('location:../both/index.php');
        exit;
    }
}
?>