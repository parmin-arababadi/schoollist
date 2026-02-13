<?php
session_start();
require_once "../both/connection.php";
require_once "../both/profile.php";
require_once "tvalidation.php";
require_once "filefunction.php";
$profile = getprofile();
$teacherid = $profile['user_id'] ?? null;
$user_type = $profile['user_type'] ?? null;
validation($teacherid, $user_type);
$classes = $pdo->prepare("select classes.id,class_start,class_end,week_day.title,start_date,finish_date,lesson from classes join lessons on lessons.id=classes.lesson_id join week_day on week_day.id=class_day where classes.teacher_id=:teacherid");
$classes->execute([":teacherid" => "$teacherid"]);
$classes = $classes->fetchAll(pdo::FETCH_ASSOC);
foreach($classes as $class){
    if(!empty($class['id'])){
    $class_id=$class['id'];
    $lesson=$class['lesson'];
    $start_date=$class['start_date'];
    $finish_date=$class['finish_date'];
    $class_day=$class['title'];
    $class_start=$class['class_start'];
    $class_end=$class['class_end'];
        $path="teacher_classlist.xlsx";
        $value="$class_id , $lesson , $start_date , $finish_date , $class_day , $class_start , $class_end.PHP_EOL";
        write_file($path,$value);
        $file=getfile($path);
        echo $file;
    }
}
?>