<?php
session_start();
require_once "connection.php";
require_once "sprofile.php";
require_once "svalidation.php";
$teachers = $pdo->prepare("select id,first_name,last_name from teachers");
$teachers->execute();
$teachers = $teachers->fetchAll(PDO::FETCH_ASSOC);

$lessons = $pdo->prepare("select id,lesson from lessons");
$lessons->execute();
$lessons = $lessons->fetchAll(PDO::FETCH_ASSOC);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teacherid = $_POST['teacherid'];
    $lessonid = $_POST['lessonid'];
    $check = $pdo->prepare("select id from classes where lesson_id=:lessonid and teacher_id=:teacherid");
    $check->execute([":teacherid" => "$teacherid", ":lessonid" => "$lessonid"]);
    $check = $check->fetch();
    if (!empty($check)) {
        $_SESSION['classid'] = $check['id'];
        $_SESSION['teacherid'] = $teacherid;
        $_SESSION['lessonid'] = $lessonid;
        header('location:nextstep.php');
        exit;
    } else {
echo '<p class="error2">معلم مورد نظر شما این درس را تدریس نمیکند</p>';
    }
}
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
    <div class="teacher">
        <table>
            <tr>
                <th>نام خانوادگی </th>
                <th>نام معلم</th>
                <th>ایدی معلم</th>
            </tr>
            <?php
            if (!empty($teachers)) {
                foreach ($teachers as $teacher) {
                    echo '<tr>';
                    echo "<td>" . $teacher['last_name'] . "</td>";
                    echo "<td>" . $teacher['first_name'] . "</td>";
                    echo "<td>" . $teacher['id'] . "</td>";
                    echo '</tr>';
                }
            }
            ?>
        </table>
    </div>

    <div class="lesson">
        <table>
            <tr>
                <th>نام درس</th>
                <th></th>
                <th>شماره درس</th>
            </tr>
            <?php
            if (!empty($lessons)) {
                foreach ($lessons as $lesson) {
                    echo '<tr>';
                    echo '<td>' . $lesson['lesson'] . '<td>';
                    echo '<td>' . $lesson['id'] . '<td>';
                    echo '</tr>';
                }
            }
            ?>

        </table>
        <form method="post">
            <input type="number" name="teacherid" id="teacherid" class="input"
                placeholder="ایدی معلم مورد نظر را وارد کنید">
            <label for="teacherid"></label>
            <input type="number" name="lessonid" id="lessonid" class="input"
                placeholder="شماره کلاس مورد نظر رو وارد کنید">
            <label for="lessonid"></label>
            <input type="submit" name="submit" id="submit" class="continue" value="ادامه">
            <label for="submit"></label>
        </form>
    </div>
    <div style="background-color: rgb(2, 2, 164);
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