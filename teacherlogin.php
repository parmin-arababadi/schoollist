<?php
session_start();
?>
<html>

<head>
    <title>login</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        a {
            text-decoration: none;
            color: rgb(185, 66, 66);
        }
    </style>
</head>

<body>
    <div class="box2">
        <p class="title5">نام</p>
        <form method="post">
            <input type="text" id="first_name" name="first_name" class="form4" placeholder="نام خود را وارد کنید">
            <label for="first_name"></label>
            <p class="title5">نام خانوادگی</p>
            <input type="text" id="last_name" name="last_name" class="form5"
                placeholder="نام خانوادگی خود را وارد کنید">
            <label for="last_name"></label>
            <p class="title5">کد ملی </p>
            <input type="text" id="nationalcode" name="nationalcode" class="form5"
                placeholder="کد ملی خود را وارد کنید">
            <label for="nationalcode"></label>

            <div class="forgetpassword">

                <input type="radio" id="rememberme" name="rememberme" class="rememberme"
                    style="transform: scale(1); margin-bottom: 0.5;">
                <label for="rememberme" class="rememberme">مرا به یاد داشته باش</label>

                <a class="forgetpassword2" href="C:\xampp\htdocs\school\teacherlist.html">ثبت نام نکردید؟</a>

            </div>
            <input type="submit" id="submit" name="submit" class="teacherlogin" value="ورود">
            <label for="submit"></label>
        </form>
    </div>
</body>

</html>
<?php
require_once("connection.php");
$_POST["first_name"];
$_POST["last_name"];
$_POST["nationalcode"];


$_SESSION["first_name"] = $_POST["first_name"];
$_SESSION["last_name"] = $_POST["last_name"];
$_SESSION["nationalcode"] = $_POST["nationalcode"];

$teacher = $pdo->prepare('select * from teachers where first_name=:first_name AND last_name=:last_name AND national_code=:national_code');
$teacher->execute(["first_name" => $_POST["first_name"],"last_name" => $_POST["last_name"],"national_code" => $_POST["nationalcode"]]);
$x = $teacher->fetchAll();
if ($x) {
    header("location:mainmenu.php");
    exit; 
} else{ echo'<p style="color:red;">کاربری با این نام وجود ندارد</p>';}
?>