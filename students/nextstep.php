<?php
session_start();
require_once '../both/connection.php';
require_once "../both/profile.php";
require_once "../both/authorization.php";
$usertype='student';
authorization($usertype);
$profile = getprofile();
$studentid = $profile["user_id"];
$user_type = $profile["user_type"];
$class_id = $_SESSION['classid'];
$teacherid = $_SESSION['teacherid'];
$lessonid = $_SESSION['lessonid'];
$c = $pdo->prepare('select teachers.first_name,lesson,title,classes.id,class_start,class_end from classes join teachers on teachers.id=classes.teacher_id join lessons on lessons.id=classes.lesson_id join week_day on week_day.id=classes.class_day where teachers.id=:teacherid and lesson_id=:lessonid');
$c->execute([":teacherid" => "$teacherid", ":lessonid" => "$lessonid"]);
$classes = $c->fetchAll(PDO::FETCH_ASSOC);

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
                <th>ساعت پایان</th>
                <th>ساعت شروع </th>
                <th>روز کلاس</th>
                <th>نام درس</th>
                <th>نام معلم</th>
                <th>شماره کلاس</th>
            </tr>
            <?php
            if (!empty($classes)) {
                foreach ($classes as $class) {
                    echo '<tr>';
                    echo "<td>" . $class['class_end'] . "</td>";
                    echo "<td>" . $class['class_start'] . "</td>";
                    echo "<td>" . $class['title'] . "</td>";
                    echo "<td>" . $class['lesson'] . "</td>";
                    echo "<td>" . $class['first_name'] . "</td>";
                    echo "<td>" . $class['id'] . "</td>";
                }
            } else {
                echo '<p class="error"> هیچ کلاسی برای این معلم پیدا نشد</p>';
            }

            ?>
        </table>
        <form method="post" style="direction: rtl; margin-top:20px;">
            <input type="number" name="classid" id="classid" class="form4"
                placeholder="شماره کلاس مورد نظر خود را وارد کنید">
            <label for="classid"></label>
            <input type="submit" name="submit" id="submit" class="divc" value="ثبت">
            <label for="submit"></label>
        </form>
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
    </footer>
</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $classid = $_POST['classid'];
    $oldclass = $pdo->prepare("select * from student_classes where class_id=:classid and student_id=:studentid ");
    $oldclass->execute([":classid" => "$classid", ":studentid" => "$studentid"]);
    $oldclass = $oldclass->fetch();
    $timecheck = $pdo->prepare("select class_start,class_day,class_end from classes where classes.id=:classid");
    $timecheck->execute(["classid" => "$classid"]);
    $timecheck = $timecheck->fetch();
    $classstart = $timecheck['class_start'];
    $classend = $timecheck['class_end'];
    $classday = $timecheck['class_day'];
    $oldtime = $pdo->prepare("select class_start,class_end,class_day from classes join student_classes on classes.id=student_classes.id where student_id=:studentid and class_start>=:classstart and class_day=:classday");
    $oldtime->execute([":studentid" => "$studentid", ":classstart" => "$classstart", "classday" => "$classday"]);
    $oldtime = $oldtime->fetchAll();
    foreach ($oldtime as $old) {
        $oldstart = $old['class_start'];
        $oldend = $old['class_end'];
        $oldday = $old['class_day'];
    }


    if (!empty($oldstart || $oldend || $oldday)) {
        echo '<p class="error2"> ساعت کلاس شما با کلاس های دیگرتان تداخل دارند</p>';
    } else {
        if (empty($oldclass)) {
            foreach ($classes as $class) {
                if ($class['id'] == $classid) {
                    $newclass = $pdo->prepare('insert into student_classes (student_id,class_id) values(:student,:class)');
                    $newclass->execute([":student" => "$studentid", ":class" => "$classid"]);
                    header("location:studentmenu.php");
                    exit;
                } else {
                    echo '<p class="error" style="height: 50px;"> از شماره کلاس های نمایش داده شده انتخاب کنید </p>';
                }
            }
        } else {
            echo '<p class="error2"> خطا:این کلاس یکبار برای شما ثبت شده</p>';
        }
    }
}
?>