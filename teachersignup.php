<?php
session_start();
?>
<html>

<head>
    <title>teacherlist</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-image: url(teacher.jpg);
            background-position: right;
            background-repeat: no-repeat;
            background-size: 450px;
            background-color: azure;
        }
    </style>
</head>

<body>
    <div class="teacherbox">
        <p class="teachertitle">نام</p>
        <form action="" method="post">
            <input type="text" id="first_name" name="first_name" class="teacherform" placeholder="نام خود را وارد کنید">
            <label for="first_name"></label>
            <p class="teachertitle">نام خانوادگی</p>
            <input type="text" id="last_name" name="last_name" class="teacherform"
                placeholder="نام خانوادگی خود را وارد کنید">
            <label for="first_name"></label>
            <p class="teachertitle">کد ملی</p>
            <input type="text" id="nationalCode" name="nationalCode" class="teacherform"
                placeholder="کد ملی خود را وارد کنید">
            <label for="nationalCode"></label>
            <p class="teachertitle"> شماره موبایل</p>
            <input type="text" id="phone_number" name="phone_number" class="teacherform" placeholder="09********* ">
            <label for="phone_number"></label>
            <p class="teachertitle"> تاریخ تولد </p>
            <input type="date" id="birth_date" name="birth_date" class="teacherform"
                placeholder="تاریخ تولد خود را وارد کنید">
            <label for="birth_date"></label>
            <p class="teachertitle"> نام پدر</p>
            <input type="text" id="father_name" name="father_name" class="teacherform"
                placeholder="نام پدر را وارد کنید">
            <label for="phone_number"></label>
            <p class="teachertitle">تحصیلات</p>
            <input type="text" id="education" name="education" class="teacherform" placeholder="تحصیلات خود را بنویسید">
            <label for="education"></label>
            <p class="teachertitle">رمز عبور</p>
            <input type="text" id="password" name="password" class="teacherform"
                placeholder="رمز عبور خود را وارد کنید">
            <label for="password"></label>
            <input type="hidden" name="user_type" value="teacher">
            <input type="submit" id="submit" name="submit" class="teachersubmit" value="ثبت نام">
            <label for="submit"></label>
        </form>
    </div>
</body>

</html>
<?php
require_once "connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (strlen($_POST["password"]) < 8) {
        echo '<p style="color:rgb(225, 89, 89); font-size: 18px; background-color: black; width: 250px; margin-left: 980px;">خطا:رمز عبور باید حداقل 8 کارکتر باشد</p>';
    } else {
        if (strlen($_POST["nationalCode"]) != 10) {
            echo '<p style="color:rgb(225, 89, 89); font-size: 18px; background-color: black; width: 190px; margin-left: 980px; padding-left:60px;">خطا: کدملی اشتباه است  </p>';
        } else {
            $firstName = $_POST["first_name"];
            $lastName = $_POST["last_name"];
            $fatherName = $_POST["father_name"];
            $birthDate = $_POST["birth_date"];
            $education = $_POST["education"];
            $phoneNumber = $_POST["phone_number"];
            $national_code = $_POST["nationalCode"];
            $user_type = $_POST["user_type"];
            $password = $_POST["password"];
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


            $newstudent = $pdo->prepare("insert into teachers(first_name,last_name,national_code,father_name,birth_date,
education,phone_number,membership_date,password) 
VALUES(:first_name,:last_name,:national_code,:father_name,:birth_date,:education,:phone_number,curdate(),:password)");
            $newstudent->execute([
                ":first_name" => "$firstName",
                ":last_name" => "$lastName",
                ":national_code" => "$nationalCode",
                ":father_name" => "$fatherName",
                ":phone_number" => "$phoneNumber",
                ":education" => "$education",
                ":birth_date" => "$birthDate",
                ":password" => "$hashedPassword"
            ]);
            $id = $pdo->prepare("select id from teachers where national_code=:national_code");
            $id->execute([":national_code" => "$national_code"]);
            $id = $id->fetch();
            $teacherid = $id['id'];
            setcookie(
                "first_name",
                "$firstName",
                time() + 3600,
                "/"
            );
            $_SESSION["teacherid"] = $teacherid;
            $_SESSION["phone_number"] = $phoneNumber;
            $_SESSION["nationalCode"] = $nationalCode;
            $_SESSION["user_type"] = $user_type;
            $_SESSION["password"] = $hashedPassword;

            header("Location: teachermenu.php");
            exit();
        }
    }
}
?>