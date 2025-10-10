<?php
session_start();
require_once "connection.php";
$first_name = $_SESSION["first_name"];
$last_name = $_SESSION["last_name"];
$sprofile = $pdo->prepare('select first_name,last_name,father_name,national_code,birth_date from students where first_name=:first_name and last_name=:last_name');
$sprofile->execute([":first_name" => "$first_name", ":last_name" => "$last_name"]);
$studentsprofile = $sprofile->fetchAll(pdo::FETCH_ASSOC);

?>
<html>

<head>
    <title>profile</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
            font-size: 19px;
        }

        table {
            width: 350px;
            border-collapse: collapse;
            margin: 30px auto;
            font-family: 'Vazirmatn', sans-serif;
            font-size: 18px;
            direction: rtl;
        }

        th,
        td {
            text-align: right;
            padding: 10px;
            border: 1px solid #999;
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

            <?php if (!empty($studentsprofile)) {
                foreach ($studentsprofile as $studentprofile) {
                    echo "<tr>";
                    echo "<th> نام</th>";
                    echo "<td>" . $studentprofile['first_name'] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th> نام خانوادگی</th>";
                    echo "<td>" . $studentprofile['last_name'] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th> نام پدر</th>";
                    echo "<td>" . $studentprofile['father_name'] . "</td>";
                    echo "</tr>";
                    echo "<th>کد ملی</th>";
                    echo "<td>" . $studentprofile['national_code'] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th> تاریخ تولد</th>";
                    echo "<td>" . $studentprofile['birth_date'] . "</td>";
                    echo "</tr>";
                    echo "<tr>";


                }
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