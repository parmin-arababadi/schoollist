<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$first_name = $_SESSION["first_name"] ?? '';
$last_name = $_SESSION["last_name"] ?? '';
$nationalcode= $_SESSION["nationalcode"] ?? '';
}
?>

<html>
    <head>
        <title>mainmenu</title>
        <link rel="stylesheet" href="CSS/style.css">
       <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'>
        
        <style>
            a{
                text-decoration: none;
                color: white;
                margin-right: 15px;
                direction: rtl;
            }
            i{
                font-size: 15px;
                vertical-align: middle;
                margin-left: 5px;
            }
        </style>
    </head>
    <body>
        <div class="head"><h3>سلام <?php echo $first_name;?> عزیز! خوش امدی</h3> </div>
        <div class="mainheader">

<a href="mainmenu.php"><i class='fas fa-bars'></i> منو اصلی</a>
<a href="teacherclasses.php"><i class='fas fa-school'></i>کلاس های من</a>
<a href="marklist.php"><i class='fas fa-book'></i>نمرات دانش آموزان من</a>
        </div>
    </body>
</html>