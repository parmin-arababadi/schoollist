<?php
function pncvalidation(string $password , string $nationalcode)
{
    if (strlen($password) < 8) {
        return '<p style="color:rgb(225, 89, 89); font-size: 18px; background-color: black; width: 250px; margin-left: 980px;">خطا:رمز عبور باید حداقل 8 کارکتر باشد</p>';
    }
    if (strlen($nationalcode) != 10) {
        return '<p style="color:rgb(225, 89, 89); font-size: 18px; background-color: black; width: 190px; margin-left: 980px; padding-left:60px;">خطا: کدملی اشتباه است  </p>';
    } else {
        return 1;
    }
}
?>