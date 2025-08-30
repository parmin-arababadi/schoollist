
<?php
require_once("connection.php");
$firstName = $_POST["first_name"];
$lastName = $_POST["last_name"];
$nationalCode = $_POST["nationalcode"];
$rememberme = $_POST["rememberme"];
$teachers = $pdo->prepare("SELECT class_start,title,class_end FROM classes join teachers on teachers.id=classes.teacher_id join week_day on week_day.id=class_day where teachers.first_name=:firstname and teachers.last_name=:lastname
 and teachers.national_code=:nationalcode");
$teachers->execute(["firstname"=>"$firstName", "lastname"=> "$lastName", "nationalcode"=>"$nationalCode"]);
$teachers=$teachers->fetchAll(PDO::FETCH_ASSOC);
// print_r($n);
// foreach ($teachers as $teacher) {echo $teacher.'<br>';}

?>
<html>
<head>
    <style>
        table{
            border: black 1px solid;
            width: 700px;
height: 270px;
        }
        th{
            border-bottom:black 1px solid;
            padding-right:10px;
            border-right: black 1px solid;
        }
        td{
           border-bottom:black 1px solid;
            padding-right:10px;
            border-right: black 1px solid;
        }
        table, th, td{
            text-align: center;
            justify-content: center;
            margin-top: 30px;
            margin-right: 10px;
            margin-left: auto;
            
        }
    </style>
</head>
    <body>
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
    </body>
</html>
