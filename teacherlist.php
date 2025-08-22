<html>
    <head>
        <title>teacherlist</title>
        <link rel="stylesheet" href="css/style.css">
        <style>
            body{
                background-image: url(teacher.jpg);
                background-position: right;
                background-repeat: no-repeat;
                background-size: 450px;
                background-color: azure;
                 }
        </style>
    </head>
    <body>
        <div class="teacherbox">
            <p class="teachertitle">نام</p>
            <form method="post">
<input type="text" id="first_name" name="first_name" class="teacherform" placeholder="نام خود را وارد کنید">
<label for="first_name"></label>
<p class="teachertitle">نام خانوادگی</p>
<input type="text" id="last_name" name="last_name" class="teacherform" placeholder="نام خانوادگی خود را وارد کنید">
<label for="first_name"></label>
<p class="teachertitle">کد ملی</p>
<input type="text" id="nationalCode" name="nationalCode" class="teacherform" placeholder="کد ملی خود را وارد کنید">
<label for="nationalCode"></label>
<p class="teachertitle"> شماره موبایل</p>
<input type="text" id="phone_number" name="phone_number" class="teacherform" placeholder="09********* ">
<label for="phone_number"></label>
<p class="teachertitle"> تاریخ تولد </p>
<input type="date" id="birth_date" name="birth_date" class="teacherform" placeholder="تاریخ تولد خود را وارد کنید">
<label for="birth_date"></label>
<p class="teachertitle"> نام پدر</p>
<input type="text" id="father_name" name="father_name" class="teacherform" placeholder="نام پدر را وارد کنید">
<label for="phone_number"></label>
<p class="teachertitle">تحصیلات</p>
<input type="text" id="education" name="education" class="teacherform" placeholder="تحصیلات خود را بنویسید">
<label for="education"></label>
<input type="submit" id="submit" name="submit" class="teachersubmit" value="ثبت نام">
<label for="submit"></label>
            </form>
        </div>
    </body>
</html>
<?php
require_once "connection.php";
$firstName=$_POST["first_name"];
$lastName=$_POST["last_name"];
$fatherName=$_POST["father_name"];
$birthDate=$_POST["birth_date"];
$education=$_POST["education"];
$phoneNumber=$_POST["phone_number"];
$nationalCode=$_POST["nationalCode"];

$newstudent=$pdo->prepare ("insert into teachers(first_name,last_name,national_code,father_name,birth_date,
education,phone_number,membership_date) 
value(:first_name,:last_name,:national_code,:father_name,:birth_date,:education,:phone_number,curdate())");
$newstudent->execute(["first_name"=>"$firstName","last_name"=>"$lastName","national_code"=>"$nationalCode",
"father_name"=>"$fatherName","phone_number"=>"$phoneNumber","education"=>"$education","birth_date"=>"$birthDate"]);

?>