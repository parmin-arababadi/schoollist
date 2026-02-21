<?php
session_start();
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
            <input type="number" id="nationalcode" name="nationalcode" class="form5"
                placeholder="کد ملی خود را وارد کنید">
            <label for="nationalcode"></label>
            <p class="title5">رمز عبور </p>
            <input type="password" id="password" name="password" class="form5" placeholder="رمز عبور خود را وارد کنید">
            <label for="password"></label>
            <input type="hidden" name="user_type" value="student">
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
require_once "../both/connection.php";
require_once "../both/pncvalidation.php";
require_once "setsession.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $pvalidation = htmlspecialchars($_POST["password"]);
    if ($pvalidation) {
        $pncv = pncodevalidation();
        echo $pncv;
        if ($pncv == 1) {
            $nationalcode = $_POST["nationalcode"];
            $password = $_POST["password"];
            $user_type = $_POST["user_type"];
            $student = $pdo->prepare("select * from students where national_code=:nationalcode");
            $student->execute(["nationalcode" => "$nationalcode"]);
            $result = $student->fetch();

            if (!empty($result)) {
                $hashedPassword = $result['password'];
                $last_name = $result['last_name'];
                $s_id = $result['id'];
                $first_name = $result['first_name'];
                $x = password_verify($password, $hashedPassword);
                if ($x) {
                    setsession($first_name,$s_id,$user_type,$nationalcode);
                    header("location:studentmenu.php");
                    exit;
                } else {
                    echo '<p class="error">رمز عبور اشتباه است</p>';
                }
            } else {
                echo '<p class="error"> کد ملی اشتباه است یا ثبتنام نیستید </p>';
            }
        }
    }
}
?>