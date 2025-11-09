<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_SESSION["first_name"] ?? '';
    $last_name = $_SESSION["last_name"] ?? '';
    $nationalcode = $_SESSION["nationalcode"] ?? '';
if (!isset($_SESSION['first_name'], $_SESSION['password'], $_SESSION['last_name'])) {
    header("location:studentlogin.php");
    exit;
}
?>

<html>

<head>
    <title>mainmenu</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'>
<link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;700&display=swap" rel="stylesheet">

    <style>
       body{
        font-family: 'Vazirmatn' ,sans-serif;
       }
       img {
            width: 430px;
            height: 250px;
            border: 1.5px rgba(192, 192, 244, 1) solid;
            margin-top: 20px;
            border-radius: 5px;
        }

        html {
            scroll-behavior: smooth;
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
    </style>
</head>

<body>
    <div class="head">
        <h3>سلام <br><?php echo $_SESSION["first_name"]; ?> <br>عزیز! خوش امدید</h3>
    </div>
    <div class="mainheader">

        <a href="mainmenu.php"><i class='fas fa-bars'></i> منو اصلی</a>
        <a href="#classes"><i class='fas fa-school'></i>کلاس های من</a>
        <a href="#marks"><i class='fas fa-book'></i>نمرات دانش آموزان من</a>

        <a href="#contact"><i class='fas fa-phone'></i>تماس با ما </a>
    </div>
    <div style="text-align: center; direction: rtl;">
        <div id="classes">
            <a href="teacherclasses.php">
                <img src="class.jpg">
                <div style="color: black; margin-top: 10px">دیدن اطلاعات کلاس های من</div>
            </a>
        </div>
        <div id="marks">
            <a href="marklist.php">
                <img src="School-Marks.jpg">
                <div style="color: black; margin-top: 10px">لیست نمرات دانش آموزان من</div>
            </a>
        </div>
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
