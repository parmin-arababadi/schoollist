<html>

<head>
    <title>school</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-image: url("school2.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        ::placeholder {
            margin-left: 10px;
            margin-top: auto;
            margin-bottom: auto;
        }
    </style>
</head>
<header>

    <body>
        <div class="schoolbox">
            <p class="title4">نام کاربری</p>
            <form method="POST">
                <input type="text" id="username " name="username" class="schoolform"
                    placeholder="نام کاربری را وارد کنید">
                <label for="username"></label>
                <p class="title4">رمز عبور</p>
                <input type="text" id="password" name="password" class="schoolform" placeholder="رمز عبور را وارد کنید">
                <label for="password"></label>
                <p class="title4">نام پدر</p>
                <input type="text" id="fathername" name="fathername" class="schoolform"
                    placeholder="نام پدر را وارد کنید">
                <label for="fathername"></label>
                <p class="title4">کد ملی</p>
                <input type="text" id="nationalCode" name="nationalCode" class="schoolform"
                    placeholder="کد ملی خود را وارد کنید">
                <label for="nationalCode"></label>
                <p class="title4">سطح کاربری</p>
                <label for="level" class="level"> <input type="radio" id="student" name="level" class="level"
                        value="دانش آموز">دانش آموز</label>

                <label for="level" class="level"><input type="radio" id="parents" name="level" class="level"
                        value="والدین">والدین</label>
                <input type="submit" id="submit" name="submit"class="submit2" value="ورود">
                <label for="submit"></label>
             </form>
        </div>
    </body>
</header>

</html>
<?php
require_once "connection.php";
$username=$_POST["username"];
$password=$_POST["password"];
$fathername=$_POST["fathername"];
$nationalCode=$_POST["nationalCode"];

echo $username.'<br>'.$password.'<br>'.$fathername.'<br>'.$nationalCode.'<br>'.$level.'<br>';
if(empty($username)){echo '<p style="color:rgb(225, 89, 89); font-size: 13px;">خطا:نام کاربری را وارد کنید</p>';}
$newstudent=$pdo->prepare('insert into students(first_name,password,father_name,national_code,level)
value(:username,:password,:fathername,:nationalCode,:level)');
$newstudent->execute(["username"=>"$username","password"=>"$password","fathername"=>"$fathername",
"nationalCode"=>"$nationalCode","level"=>"$level"]);
?>