<?php
session_start();
require_once "connection.php";
$first_name = $_SESSION["first_name"];
$last_name = $_SESSION["last_name"];
$nationalcode = $_SESSION["national_code"];
$studentclass = $pdo->prepare("SELECT teachers.first_name,teachers.last_name,lesson,week_day.title,class_start,class_end FROM classes join lessons on lessons.id=classes.lesson_id join teachers on teachers.id=classes.teacher_id join week_day on week_day.id=class_day join student_classes on class_id=classes.id join students on students.id=student_id where students.national_code=:national_code
");
$studentclass->execute(["national_code" => "$nationalcode"]);
$studentclasses = $studentclass->fetchAll(PDO::FETCH_ASSOC);

?>
<html>

<head>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
            font-size: 19px;
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
    <header>
    <div class="mainheader">

            <a href="studentmenu.php"><i class='fas fa-bars'></i>پنل شخصی</a>
            <a href="studentclass.php"><i class='fas fa-school'></i>کلاس های من</a>
            <a href="studentmark.php"><i class='fas fa-book'></i>کارنامه من</a>

            <a href="#contact"><i class='fas fa-phone'></i>تماس با ما </a>
        </div>
        </header>
        <main>
    <table>
        <tr>
            <th>ساعت شروع کلاس</th>
            <th>ساعت پایان کلاس</th>
            <th>روز کلاس</th>
            <th>درس</th>
            <th>نام خانوادگی معلم</th>
            <th>نام معلم</th>

        </tr>
        <?php if (!empty($studentclasses)) {
            foreach ($studentclasses as $class) {
                echo "<tr>";
                echo "<td>" . $class['class_start'] . "</td>";
                echo "<td>" . $class['class_end'] . "</td>";
                echo "<td>" . $class['title'] . "</td>";
                echo "<td>" . $class['lesson'] . "</td>";
                echo "<td>" . $class['last_name'] . "</td>";
                echo "<td>" . $class['first_name'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>هیچ کلاسی برای شما ثبت نشده است.</td></tr>";
        }
        ?>
    </table>
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