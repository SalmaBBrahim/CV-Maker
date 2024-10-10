<?php 
include '../controller/CVController.php';
$cvC = new CVController();
$list= $cvC->listCVs();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>CV List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style1.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            padding: 10px;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: space-around;
            background-color: #444;
            padding: 10px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>




<div class="container mt-3 mb-10" style="margin-top:-100px;">
        <header >
        <h1>CV Management System</h1>
        <nav>
        <a href="cv.php">Create CV</a>
        <a href="cv_list.php">List CV</a>
        <a href="logout.php">Logout</a>
        </nav>  
        </header>
       <?php 
     
       session_start();
       session_destroy();
       header("Location: loginForm.php");
       ?>
       
      
</body>

</html>
