<?php
    include('session.php');
        if(!isset($_SESSION['login_user']))
        {
            header("location: id.php"); 
        }
?>
<head>
    <meta charset="utf-8"><!--kódování-->
    <meta name="theme-color" content="#db5945"> <!--Změna barvy tabu v android google chrome-->
    <meta name="viewport" content="width=device-width, initial-scale=1"><!--přizpůsobení velikosti pro mobil-->
    <meta name="description" content="Popis"/><!--popis-->
    <title>JUDr</title><!--název--> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"><!--bootstrap-->
    <link rel="icon" sizes="192x192" href="icon.png"><!--ikona-->
    <link rel="stylesheet" href="dynatable/jquery.dynatable.css"><!--dynatable styl-->
    <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css"><!--font awesome-->
    <link rel="stylesheet" href="style.css" type="text/css"><!--styl-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script><!--jQuery-->
    <script type="text/javascript" src="dynatable/jquery.dynatable.js"></script><!--Dynatable JS-->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>