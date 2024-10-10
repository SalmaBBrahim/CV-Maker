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
    <link rel="stylesheet" href="style.css">

   
<body>




<div class="container mt-3 mb-10" style="margin-top:-100px;">
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
            font-size: 10px;

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
       </header>
        <div class="row">
            <?php
            // Assuming $cvList is your array of CVs
            foreach ($list as $cv) {
            ?>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single_cv text-center">
                        <div class="cv_thumb">
                            <img src="uploads/<?php echo $cv['img']; ?>" alt="<?php echo $cv['fname'] . ' ' . $cv['lname']; ?>" style="width:150px; height:150px; border-radius: 20px;">
                        </div>
                        <h3><?php echo $cv['fname'] . ' ' . $cv['lname']; ?></h3>
                        <p><?php echo $cv['prof']; ?></p>
                        <form method="POST" action="cv_details.php">
                            <input type="submit" class="next-btn" class="line_btn" name="view" value="Voir">
                            <input type="hidden" value="<?php echo $cv['id']; ?>" name="cvid">
                        </form>
                        <form method="POST" action="cv_delete.php">
                            <input class="next-btn" type="submit" class="line_btn" name="view" value="Supprimer" style="margin-top:10px;">
                            <input type="hidden" value="<?php echo $cv['id']; ?>" name="cvid">
                        </form>
                        <form method="POST" action="cv_edit.php">
                            <input class="next-btn" type="submit" class="line_btn" name="view" value="Modifier" style="margin-top:10px;">
                            <input type="hidden" value="<?php echo $cv['id']; ?>" name="cvid">
                        </form>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>
