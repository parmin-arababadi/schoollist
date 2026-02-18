<?php
session_start();
?>
<html>

<head>
    <title>student login</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            background-image: url("../images/school2.jpg");
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
                <input type="password" id="password" name="password" class="schoolform"
                    placeholder="رمز عبور را وارد کنید">
                <label for="password"></label>
                <p class="title4">نام پدر</p>
                <input type="text" id="fathername" name="fathername" class="schoolform"
                    placeholder="نام پدر را وارد کنید">
                <label for="fathername"></label>
                <p class="title4">کد ملی</p>
                <input type="number" id="nationalcode" name="nationalcode" class="schoolform"
                    placeholder="کد ملی خود را وارد کنید">
                <label for="nationalcode"></label>
                <p class="title4">تاریخ تولد</p>
                <input type="date" id="birth_date" name="birth_date" class="schoolform"
                    placeholder="تاریخ تولد خود را وارد کنید">
                <label for="birth_date"></label>
                <input type="hidden" name="user_type" value="student">
                <input type="submit" id="submit" name="submit" class="submit2" value="ثبت نام">
                <label for="submit"></label>
            </form>
        </div>
    </body>
</header>

</html>
<?php
require_once "../both/connection.php";
require_once "../both/pncvalidation.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fvalidation = htmlspecialchars($_POST["first_name"]);
    $lvalidation = htmlspecialchars($_POST["last_name"]);
    $ftvalidation = htmlspecialchars($_POST["fathername"]);
    if ($fvalidation && $lvalidation && $ftvalidation) {
            $pncv = pncodevalidation();
            echo $pncv;
            if ($pncv == 1) {
                $first_name = $_POST["first_name"];
                $last_name = $_POST["last_name"];
                $password = $_POST["password"];
                $fathername = $_POST["fathername"];
                $nationalcode = $_POST["nationalcode"];
                $birth_date = $_POST["birth_date"];
                $user_type = $_POST["user_type"];

                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                if (empty($first_name)) {
                    echo '<p style="color:rgb(225, 89, 89); font-size: 18px;">خطا:نام کاربری را وارد کنید</p>';

                }
                $newstudent = $pdo->prepare('insert into students(first_name,last_name,password,father_name,national_code,birth_date)
value(:first_name,:last_name,:password,:fathername,:nationalCode,:birth_date)');
                $newstudent->execute([
                    "first_name" => "$first_name",
                    "password" => "$hashedPassword",
                    "fathername" => "$fathername",
                    "nationalCode" => "$nationalcode",
                    "birth_date" => "$birth_date",
                    "last_name" => "$last_name"
                ]);

                $studentid = $pdo->prepare("select id from students where national_code=:nationalcode");
                $studentid->execute([":nationalcode" => "$nationalcode"]);
                $studentid = $studentid->fetch();
                $s_id = $studentid['id'];
                $_SESSION["id"] = $s_id;
                $_SESSION["user_type"] = $user_type;
                setcookie(
                    "first_name",
                    "$first_name",
                    time() + 3600,
                    "/"
                );
                setcookie(
                    "last_name",
                    "$last_name",
                    time() + 3600,
                    "/"
                );
                setcookie(
                    "father_name",
                    "$fathername",
                    time() + 3600,
                    "/"
                );
                $_SESSION["birth_date"] = $birthDate;
                $_SESSION["phone_number"] = $phoneNumber;
                $_SESSION["nationalcode"] = $nationalcode;
                $_SESSION["user_type"] = $user_type;
                $_SESSION["password"] = $hashedPassword;
                header("Location:studentmenu.php");
                exit();
            }
        } else {
            echo '<p class="error2">فیلد ها معتبر نیستند </p>';
        }
    }

?>