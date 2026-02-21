<?php
session_start();
require_once "../both/connection.php";
require_once "../both/profile.php";
require_once "../both/authorization.php";
$usertype='teacher';
authorization($usertype);
$profile = getprofile();
$teacherid = $profile['user_id'];
$nationalcode = $profile['nationalcode'];

$teachers = $pdo->prepare("SELECT class_start,title,class_end FROM classes join teachers on teachers.id=classes.teacher_id join week_day on week_day.id=class_day where 
 teachers.id=:id");
$teachers->execute(["id" => "$teacherid"]);
$teachers = $teachers->fetchAll(PDO::FETCH_ASSOC);
?>
<html>

<head>
    <title>my classes</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
        }

        table {
            border: black 1px solid;
            width: 700px;
            height: 270px;
        }

        th {
            border-bottom: black 1px solid;
            padding-right: 10px;
            border-right: black 1px solid;
        }

        td {
            border-bottom: black 1px solid;
            padding-right: 10px;
            border-right: black 1px solid;
        }

        table,
        th,
        td {
            text-align: center;
            justify-content: center;
            margin-top: 30px;
            margin-right: 10px;
            margin-left: auto;
            border-collapse: collapse;
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

        <a href="teachermenu.php"><i class='fas fa-bars'></i> منو اصلی</a>
        <a href="teacherclasses.php"><i class='fas fa-school'></i>کلاس های من</a>
        <a href="tmarklist.php"><i class='fas fa-book'></i>نمرات دانش آموزان من</a>

        <a href="#contact"><i class='fas fa-phone'></i>تماس با ما </a>
    </div>
    <div class="print">
        <a href="tclasslist.php">پرینت لیست کلاس ها</a>
    </div>
    <table>
        <tr>
            <th>ساعت شروع کلاس</th>
            <th>ساعت پایان کلاس</th>
            <th>روز کلاس</th>
        </tr>
        <?php if (!empty($teachers)) {
            foreach ($teachers as $teacher) {
                echo "<tr>";
                echo "<td>" . $teacher['class_start'] . "</td>";
                echo "<td>" . $teacher['class_end'] . "</td>";
                echo "<td>" . $teacher['title'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>هیچ کلاسی برای این معلم ثبت نشده است.</td></tr>";
        }
        ?>
        

    </table>
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