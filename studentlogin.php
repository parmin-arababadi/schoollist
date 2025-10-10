<?php
session_start();
?>
<html>

<head>
    <title>student login</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-image: url("school2.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            font-size: 19px;
        }

        ::placeholder {
            margin-left: 10px;
            margin-top: auto;
            margin-bottom: auto;
        }
    </style>
</head>
<header>

    <body>
        <div class="schoolbox" style="height: 550px;">
            <p class="title4">نام</p>
            <form method="POST">
                <input type="text" id="first_name " name="first_name" class="schoolform"
                    placeholder="نام خود را وارد کنید">
                <label for="first_name"></label>
                <p class="title4">نام خانوادگی</p>
                <input type="text" id="last_name" name="last_name" class="schoolform"
                    placeholder="نام خانوادگی خود را وارد کنید">
                <label for="last_name"></label>
                <p class="title4">رمز عبور</p>
                <input type="text" id="password" name="password" class="schoolform" placeholder="رمز عبور را وارد کنید">
                <label for="password"></label>
                <p class="title4">نام پدر</p>
                <input type="text" id="fathername" name="fathername" class="schoolform"
                    placeholder="نام پدر را وارد کنید">
                <label for="fathername"></label>
                <p class="title4">کد ملی</p>
                <input type="text" id="nationalCode" name="nationalCode" class="schoolform"
                    placeholder="کد ملی خود را وارد کنید">
                <label for="nationalCode"></label>
                <p class="title4">تاریخ تولد</p>
                <input type="date" id="birth_date" name="birth_date" class="schoolform"
                    placeholder="تاریخ تولد خود را وارد کنید">
                <label for="birth_date"></label>
                <input type="submit" id="submit" name="submit" class="submit2" value="ثبت نام">
                <label for="submit"></label>
            </form>
        </div>
    </body>
</header>

</html>
<?php
require_once "connection.php";
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$password = $_POST["password"];
$fathername = $_POST["fathername"];
$nationalCode = $_POST["nationalCode"];
$birth_date = $_POST["birth_date"];
$hashedPassword= password_hash($password,PASSWORD_DEFAULT);
echo $first_name . '<br>' . $password . '<br>' . $fathername . '<br>' . $nationalCode . '<br>'. $birth_date;
if (empty($first_name)) {
    echo '<p style="color:rgb(225, 89, 89); font-size: 13px;">خطا:نام کاربری را وارد کنید</p>';
}
$newstudent = $pdo->prepare('insert into students(first_name,last_name,password,father_name,national_code,birth_date)
value(:first_name,:last_name,:password,:fathername,:nationalCode,:birth_date)');
$newstudent->execute([
    "first_name" => "$first_name",
    "password" => "$hashedPassword",
    "fathername" => "$fathername",
    "nationalCode" => "$nationalCode",
    "birth_date" => "$birth_date",
    "last_name" => "$last_name"
]);

header("location:studentmenu.php");
exit;

?>