<!DOCTYPE HTML>
<html lang="en">

<?php 

session_start();
include("config.php");
include("functions.php"); // data sanitising

// Connect to the database..

$dbconnect=mysqli_connect(DB_HOST,DB_USERNAME, DB_PASSWORD, DB_NAME);

if (mysqli_connect_errno())

{
    echo "Connection failed:".mysqli_connect_error();
        exit;
}

?>
    
    
<head>
    <meta charset="UTF-8">
    <meta name="description" content="ganes, apps">
    <meta name="author" content="Ed Sherian">
    <meta name="keywords" content="games, apps, ratings">
   
    <!-- custom stylesheet -->
    <link rel="stylesheet" href="css/data_style.css">  
    <link rel="stylesheet" href="css/font-awesome.min.css"> 
    
    <!-- for multiple fonts change | to %7c * no spaces * -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato%7cUbuntu"> 
          
        <title>Game Database</title>
</head>
<body>
        <p class="message">Aue! Your browser does not support grid layout. Upgrade your browser.</p>
        <div class ="wrapper">
            <div class ="box logo">
                <a href="index.php"><img src="images/logo.png" width="261" height="150" alt="Dice"></a>

        </div> <!-- / logo -->
        <div class ="box banner">
            <h1>Games Database</h1>

        </div> <!-- / banner -->
            
        <div class ="box main">
            <h2>Welcome</h2>
            <p> Put link to the original dataset here</p>
            
        </div> <!-- / main -->
        <div class ="box side">
            <h2>Search Area</h2>

            <p> The search functionality goes here</p>
            
           
        </div> <!-- / side bar -->
        <div class ="box footer">
            <p> Ed Sherian 2023</p>
        </div> <!-- / footer -->

        </div> <!-- / wrapper -->
</body>
</html>