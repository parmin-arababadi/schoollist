<?php
session_start();
require_once "../both/connection.php";
require_once "../both/pncvalidation.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pncv = pncodevalidation();
    echo $pncv;
    if ($pncv == 1) {
        $nationalcode = $_POST["nationalcode"];
        $password = $_POST["password"];
        $user_type = $_POST["user_type"];
        $teacher = $pdo->prepare("select password,last_name,first_name,id from teachers where national_code=:nationalcode");
        $teacher->execute([":nationalcode" => "$nationalcode"]);
        $result = $teacher->fetch();

        if (!empty($result)) {
            $hashedPassword = $result['password'];
            $last_name = $result['last_name'];
            $first_name = $result['first_name'];
            $teacherid = $result['id'];
            $x = password_verify($password, $hashedPassword);
            if ($x) {
                setcookie(
                    "first_name",
                    $first_name,
                    time() + 3600,
                    "/"
                );
                $_SESSION["id"] = $teacherid;
                $_SESSION["nationalcode"] = $nationalcode;
                $_SESSION["user_type"] = $user_type;
                header("location:teachermenu.php");
                exit;
            } else {
                echo '<p class="error">رمز عبور اشتباه است</p>';
            }
        } else {
            echo '<p class="error">کد ملی یا نام خود را  اشتباه وارد کردید</p>';
        }
    }
}

?>
<html>

<head>
    <title>login</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        a {
            text-decoration: none;
            color: rgb(185, 66, 66);
        }
    </style>
</head>

<body>
    <div class="box2">
        <form method="post">
            <p class="title5"> کد ملی</p>
            <input type="text" id="nationalcode" name="nationalcode" class="form5"
                placeholder="کد ملی خود را وارد کنید">
            <label for="nationalcode"></label>
            <p class="title5"> رمز عبور </p>
            <input type="password" id="password" name="password" class="form5" placeholder=" رمز عبور خود را وارد کنید">
            <label for="password"></label>

            <div class="forgetpassword">

                <input type="radio" id="rememberme" name="rememberme" class="rememberme"
                    style="transform: scale(1); margin-bottom: 0.5;">
                <label for="rememberme" class="rememberme">مرا به یاد داشته باش</label>

                <a class="forgetpassword2" href="teachersignup.php">ثبت نام نکردید؟</a>

            </div>
            <input type="hidden" name="user_type" value="teacher">
            <input type="submit" id="submit" name="submit" class="teacherlogin" value="ورود">
            <label for="submit"></label>
        </form>
    </div>
</body>

</html>