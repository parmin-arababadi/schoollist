<?php
session_start();
require_once "connection.php";
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$nationalcode = $_SESSION["national_code"];
?>
<html>

<head>
    <title>registration</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
        }

        a {
            text-decoration: none;
            color: white;
            margin-right: 15px;
            direction: rtl;
        }

        i {
            font-size: 15px;
            vertical-align: middle;
            margin-left: 5px;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>
    <div class="mainheader">

        <a href="studentmenu.php"><i class='fas fa-bars'></i>پنل شخصی</a>
        <a href="studentclass.php"><i class='fas fa-school'></i>کلاس های من</a>
        <a href="studentmark.php"><i class='fas fa-book'></i>کارنامه من</a>

        <a href="#contact"><i class='fas fa-phone'></i>تماس با ما </a>
    </div>
    <div class="box4">
        <form method="post">
            <p class="title6" style="margin-top: 50px;">نام معلم</p>
            <input type="text" name="tfirst_name" id="tfirst_name" class="form6"
                placeholder="نام معلم مورد نظرتان را وارد کنید">
            <label for="tfirst_name"></label>
            <p class="title6">نام خانوادگی معلم</p>
            <input type="text" name="tlast_name" id="tlast_name" class="form6"
                placeholder="نام خانوادگی معلم مورد نظر را وارد کنید">
            <label for="tlast_name"></label>
            <p class="title6">نام درس</p>
            <input type="text" name="lesson" id="lesson" class="form6" placeholder="نام درس را وارد کنید">
            <label for="lesson"></label>
            <input type="submit" name="submit" id="submit" class="divc" value=" ادامه" style="margin-bottom: 10px;">
            <label for="submit"></label>
        </form>
    </div>
    <div style=" background-color: rgb(2, 2, 164);
    text-align: right;
    direction: rtl;
    width: cover;
    height: /200px;
    margin-top: 30px;
 padding-bottom: auto;
    padding-top: 10px;
    color: white;
    padding-right: 15px;
    padding-bottom: 10px;" id="contact">
        <p> از طریق شماره ی زیر با ما در تماس باشید</p>
        <a href="tel:+989916936013" style="text-decoration: none; color: white; font-size: 18px;">
            <i class='fas fa-phone'></i>
            09916936013
        </a>

        <div style="text-align: right; direction: rtl; justify-content: right; ">
            <h3><i class='far fa-newspaper'></i>اخبار مدرسه</h3>
            <p>فردا 10 شهریور کلاس ها با یک ساعت تاخیر شروع میشود</p>
            <p>فردا کلاس ریاضی ساعت 10 شروع میشود</p>
        </div>
    </div>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$tfirst_name = $_POST['tfirst_name'];
$tlast_name = $_POST['tlast_name'];
$lesson = $_POST['lesson'];

$_SESSION['tfirst_name'] = $tfirst_name;
$_SESSION['tlast_name'] = $tlast_name;
$_SESSION['lesson'] = $lesson;

 header("location:nextstep.php");
    exit;
} else{
echo '<p class="error"> روی گزینه ادامه کلیک کنید </p>';
}
?>