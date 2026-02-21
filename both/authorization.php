<?php
function authorization( string $usertype) {
    if (empty($_SESSION['user_type']) || $_SESSION['user_type']!=$usertype ) {
        header('location:../both/index.php');
        exit;
    }
}
?>