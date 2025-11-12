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
            <p class="title5">رمز عبور </p>
            <input type="text" id="password" name="password" class="form5" placeholder="رمز عبور خود را وارد کنید">
            <label for="password"></label>

            <div class="forgetpassword">

                <input type="radio" id="rememberme" name="rememberme" class="rememberme"
                    style="transform: scale(1); margin-bottom: 0.5;">
                <label for="rememberme" class="rememberme">مرا به یاد داشته باش</label>

                <a class="forgetpassword2" href="studentsignup.php">ثبت نام نکردید؟</a>

            </div>
            <input type="submit" id="submit" name="submit" class="teacherlogin" value="ورود">
            <label for="submit"></label>
        </form>
    </div>
</body>

</html>
<?php
require_once("connection.php");
if (isset($_POST["submit"])){
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$password = $_POST["password"];


$_SESSION["first_name"] = $_POST["first_name"];
$_SESSION["last_name"] = $_POST["last_name"];
$_SESSION["password"] = $_POST["password"];

$student = $pdo->prepare("select password from students where first_name=:first_name and last_name=:last_name");
$student->execute(["first_name" => "$first_name", "last_name" => "$last_name"]);
$result = $student->fetch();



if (!empty($result)) {
    $hashedPassword=$result['password'];
    $x = password_verify($password, $hashedPassword);
if ($x){
    header("location:studentmenu.php");
    exit;
}else{
    echo '<p class="error">رمز عبور اشتباه است</p>';
}
}else{
    echo '<p class="error"> کاربری با این نام وجود ندارد </p>';
}
}
?>