<?php session_start();?>
<?php include 'functions.php';?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>Church Member Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/main.css">
</head>

<?php
if(isset($_POST['destroySession'])){unset($_SESSION['granted']); echo"<script>window.open('index.php','_self');</script>";}
?>

<?php $theNav=$_GET['nav']; if($theNav=="show"){echo 
    '<div id="navContainer">
        <ul id="nav">
            <li><a href="churchForm.php?nav=show">Home</a></li>
            <li><a href="displayMembers.php?nav=show">List</a></li>
            <li><a href="createTables.php?nav=show">Reset</a></li>
            <li> <form action="index.php" method="post"><input type="submit" name="destroySession" value="Log Out"></form></li>
        </ul>
    </div>';}
?>

<body>
    <div id="mainContainer">