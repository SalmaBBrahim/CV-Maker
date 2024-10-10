<?php 
include '../controller/CVController.php';
$cvC = new CVController();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Template</title>
    <link rel="stylesheet" href="template1.css">

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

        .navbar{
            width: 85%;
            margin: auto;
            padding: 35px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
             }

        a{
            text-decoration: none;
        }

        li{
           list-style-type: none;
        }

        .logo{
            font-size: 32px;
            font-weight: 700;
        }

        .navbar ul li{
            display: inline-block;
            margin: 0 20px;
            position: relative;
        }

        .navbar ul li a{
            text-transform: uppercase;

        }

        .navbar ul li::after{
            content: '';
            height: 3px;
            width: 0;
            position: absolute;
            background: #009688;
            left: 0;
            bottom:-10px;
            transition: 0.5s;
            }
            .navbar ul li:hover::after{
            width: 100%;
        }
            
     </style>
</head>

<body>

  
    <header >
 
        <div class="navbar">
            <div class="logo"></div>
            <ul>
                <li><a href="home.html">Page d'acceuil</a></li>
                <li><a href="cv.php">Création de CV</a></li>
                <li><a href="CV_list.php">Liste de CV</a></li>
                <li><a href="logout.php">Déconnexion</a></li>
            </ul>
        </div>
    </header>
            <?php
            if (isset($_POST['cvid']))
                $cv = $cvC->showCV($_POST['cvid']);
            if (isset($_GET['cvId']))
                $cv = $cvC->showCV($_GET['cvId']);
             ?>


    <section class="main-section">
    <div class="left-part">
    <div class="photo-container">
    <img src="uploads/<?PHP echo $cv['img']; ?> " alt="Image" >
    </div>
    <div class="contact-container">
    <h2 class="title">Contact Me</h2>

    <div class="contact-list">
        <div class="icon-container">
            <i class="bi bi-envelope-fill"></i>
        </div>
        <div class="contact-text">
            <p> <?php echo $cv['email']; ?></p>
        </div>
    </div>
    <div class="contact-list">
        <div class="icon-container">
            <i class="bi bi-phone"></i>
        </div>
        <div class="contact-text">
            <p><?php echo $cv['numtel']; ?></p>
        </div>
    </div>

    </div>

    <div class="education-container">
    <h2 class="title">Education</h2>
    <div class="course">
        <h2 class="education-title">Diploma</h2>
        <h5 class="college-name"><?php echo $cv['dip']; ?>
        <h2 class="education-title">University</h2>
        <h5 class="college-name"> <?php echo $cv['inst']; ?>
        <h2 class="education-title">Location</h2>
        <h5 class="college-name"> <?php echo $cv['lieud']; ?></h5>

        <p class="education-date"> <?php echo $cv['ddd']; ?>
        -
            <?php echo $cv['dfd']; ?></p>
    </div>


    </div>

    <div class="skills-container">
    <h2 class="title">Skills</h2>
    <div class="skill">
        <div class="left-skill">
            <p><?php echo $cv['comp']; ?></p>
        </div>
        
    </div>

    </div>
    </div>
    <div class="right-part">
    <div class="banner">
    <h1 class="firstname"> <?php echo $cv['fname'];?></h1>
    <h1 class="lastname"><?php echo $cv['lname'];?></h1>
    <p class="position"><?php echo $cv['prof']; ?></p>
    </div>
    <div class="work-container ">
    <h2 class="title text-left">About me</h2>
    <div class="work">
        
    <p><?php echo $cv['obj']; ?></p>
    </div>


    </div>

    <div class="work-container ">
    <h2 class="title text-left">work experience</h2>
    <div class="work">
        <div class="job-date">
            <p class="job"><?php echo $cv['poste']; ?></p>
            <p class="date"> <?php echo $cv['dde']; ?> - <?php echo $cv['dfe']; ?></p>
        </div>
        <h2 class="company-name"> <?php echo $cv['entreprise']; ?></h2>
        <h2 class="company-name"> <?php echo $cv['lieu']; ?></h2>

    </div>


    </div>


    </div>    


        
    </section>
    </div>

    </body>

    </html>

