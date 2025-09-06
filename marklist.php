<?Php
session_start();
require_once('connection.php');
$firstName = $_SESSION["first_name"];
$lastName = $_SESSION["last_name"];
$nationalCode = $_SESSION["nationalcode"];

$result = '';

?>

<html>

<head>
    <title>marks</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <div><?= $result ?></div>
    <div class="box3">
        <h3 class="marktitle">student marks</h3>

        <form method="post">
            <input type="text" name="first_name" id="first_name" class="markform" placeholder="نام دانش آموز">
            <label for="first_name"></label>
            <input type="text" name="last_name" id="last_name" class="markform" placeholder="نام خانوادگی دانش آموز">
            <label for="last_name"></label>
            <input type="text" name="mark" id="mark" class="markform" placeholder="نمره دانش آموز">
            <label for="mark"></label>
            <input type="text" name="class" id="class" class="markform" placeholder="شماره کلاس دانش آموز">
            <label for="mark"></label>
            <input type="submit" name="submit" id="submit" class="marksubmit" value="ارسال">
            <label for="submit"></label>

        </form>
    </div>
</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $classid = $_POST['class'];
    $mark = $_POST['mark'];
    $students = $pdo->prepare('select * from students where first_name=:first_name and last_name=:last_name');
    $students->execute(['first_name' => $first_name, 'last_name' => $last_name]);
    $student = $students->fetch();
    if ($student) {
        $id = $student['id'];

$newmark = $pdo->prepare("INSERT INTO student_mark (student_id, student_class_id, mark)
VALUES (:student_id, :class, :mark)");
$correct=$newmark->execute(["student_id"=>$id,"class"=>$classid,"mark"=>$mark]);
        if ($correct) {
            $result = '<p class="correct">نمره با موفقیت ثبت شد</p>';
        } else {

            $result = '<p class="error">ثبت نمره با خطا مواجه شد</p>';
        }
    }
}else{
    echo '<p class="error">لطفا همه ی فیلد هارا پر کنید</p>';
}
?>