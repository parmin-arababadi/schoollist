<?php
session_start();
require_once "connection.php";
$first_name = $_SESSION["first_name"];
$last_name = $_SESSION["last_name"];
$nationalCode = $_SESSION["nationalcode"];

?>

<html>

<head>
    <title>marklist</title>
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

        body {
            font-family: 'Vazirmatn', sans-serif;
        }
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>

    <div class="note"> با کلیک بر روی ثبت نمره,نمره ی جدید را وارد کنید</div>
    <div class="mainheader">

        <a href="mainmenu.php"><i class='fas fa-bars'></i> منو اصلی</a>
        <a href="teacherclasses.php"><i class='fas fa-school'></i>کلاس های من</a>
        <a href="marklist.php"><i class='fas fa-book'></i>نمرات دانش آموزان من</a>

        <a href="#contact"><i class='fas fa-phone'></i>تماس با ما </a>
    </div>
    <div class="box3">
        <div>
            <h3 class="marktitle">student marks</h3>
        </div>
        <form method="post">
            <input type="text" name="first_name" id="first_name" class="markform" placeholder="نام دانش آموز">
            <label for="first_name"></label>
            <input type="text" name="last_name" id="last_name" class="markform" placeholder="نام خانوادگی دانش آموز">
            <label for="last_name"></label>
            <input type="text" name="mark" id="mark" class="markform" placeholder="نمره دانش آموز">
            <label for="mark"></label>
            <input type="text" name="classnum" id="classnum" class="markform" placeholder=" شماره کلاس دانش آموز">
            <label for="classnum"></label>
            <input type="submit" name="submit" id="submit" class="marksubmit" value="ثبت نمره">
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$studentname = $_POST["first_name"];
$studentlast_name = $_POST["last_name"];
$classnum = $_POST["classnum"];
$mark = $_POST["mark"];
$id = $pdo->prepare("select id from students where first_name=:first_name and last_name=:last_name");
$id->execute([":first_name" => "$studentname", ":last_name" => "$studentlast_name"]);
$student = $id->fetch();
$studentid = $student['id'];
if ($studentid == false) {
    echo '<p class="error">اطلاعات دانش آموز اشتباه است</p>';
}
$newmark = $pdo->prepare("insert into student_mark(student_id,student_class_id,mark)
values (:student_id,:classnum,:mark)");
$correct = $newmark->execute([":student_id" => "$studentid", ":classnum" => "$classnum", ":mark" => "$mark"]);
if ($correct) {
    echo '<p class="correct">ثبت نمره با موفقیت انجام شد</p>';
} else {
    echo '<p class="error">ثبت نمره با خطا مواجه شد</p>';
}
}
?>