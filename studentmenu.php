<?php
session_start();
require_once "connection.php";

    $first_name = $_SESSION["first_name"];
    $last_name = $_SESSION["last_name"];
    $password = $_SESSION["password"];

if (!isset($_SESSION['first_name'], $_SESSION['password'], $_SESSION['last_name'])) {
    header("location:studentlogin.php");
    exit;
}
?>
<html>

<head>
    <title>menu</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;700&display=swap" rel="stylesheet">

    <style>
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
            font-size: 19px;
        }
    </style>
</head>

<body>
    <header>
        <div class="head">
            <h3>سلام <br><?php echo $first_name; ?> <br>عزیز! خوش آمدی</h3>
        </div>
        <div class="mainheader">

            <a href="studentmenu.php"><i class='fas fa-bars'></i>پنل شخصی</a>
            <a href="#classes"><i class='fas fa-school'></i>کلاس های من</a>
            <a href="#marks"><i class='fas fa-book'></i>کارنامه من</a>

            <a href="#contact"><i class='fas fa-phone'></i>تماس با ما </a>
        </div>
    </header>
    <main>
        <div class="image">

            <a href="https://medu.gov.ir/">
                <img style="margin-left: 10px; width: 200px;
    height: 200px;
    border-radius: 20px; margin-right:0px; margin-top: 20px;  " src="government2.jpg">
                <div style="margin-top: 1px; color:black;">خدمات الکترونیک دولت </div>
            </a>
            <a href="registration.php">
                <img style=" width: 150px;
    height: 150px;
    border-radius: 20px; margin-right:15px; margin-top: 50px; margin-left: 0px;" src="newclass.png">
                <div style="margin-top: 10px; color:black;"> ثبت نام</div>
            </a>
            <a href="profile.php">
                <img style="    width: 150px;
    height: 150px;
    border-radius: 20px;  margin-top: 50px;" src="studenticon.jpg">
                <div style="margin-top: 10px; color:black;"> پروفایل من</div>
            </a>

        </div>
        <div style="text-align: center; direction: rtl;">
            <div id="classes">
                <a href="studentclass.php">
                    <img style=" width: 430px;
            height: 250px;
            border: 1.5px rgba(192, 192, 244, 1) solid;
            margin-top: 20px;
            border-radius: 5px;
        " src="class.jpg">
                    <div style="color: black; margin-top: 10px">دیدن کلاس های من</div>
                </a>
            </div>
            <div id="marks">
                <a href="studentmark.php">
                    <img style="            width: 430px;
            height: 250px;
            border: 1.5px rgba(192, 192, 244, 1) solid;
            margin-top: 20px;
            border-radius: 5px;
        " src="School-Marks.jpg">
                    <div style="color: black; margin-top: 10px">کارنامه من</div>
                </a>
            </div>
        </div>
    </main>
    <footer>
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
    </footer>
</body>

</html>