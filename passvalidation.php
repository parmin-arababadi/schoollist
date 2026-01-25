<?php
    if (strlen($_POST["password"]) < 8) {
        echo '<p style="color:rgb(225, 89, 89); font-size: 18px; background-color: black; width: 250px; margin-left: 980px;">خطا:رمز عبور باید حداقل 8 کارکتر باشد</p>';
    }
?>