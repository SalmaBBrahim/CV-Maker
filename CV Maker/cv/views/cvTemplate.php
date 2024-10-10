<?php 
include '../controller/CVController.php';
$cvC = new CVController();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="template1.css">

    
    <head>
  <?php echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">'; ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
  <style>
      .next-btn{
        border-radius: 20px;
        margin-right: 0px;
        margin-bottom: 0px;
        padding: 5px 10px;
        background-color:rgb(4, 77, 234);
        color: white;
        border: none;
        height: 36px;
        width: 105px;
        border-radius: 20px;
        
        }
        .next-btn:hover,{
        opacity: 0.8;
        background-color: rgb(13, 128, 235);
        color: white;

        }
  </style>
  </head>

    <title>CV</title>
</head>

<body>
    <?php
    if (isset($_POST['cvid']))
        $cv = $cvC->showCV($_POST['cvid']);
    if (isset($_GET['cvId']))
        $cv = $cvC->showCV($_GET['cvId']);
?>

    <section class="main-section" id="pdf">
        <div class="left-part">
            <div class="photo-container">
             <img src="uploads/<?PHP echo $cv['img']; ?> " alt="Image" >
            </div>
            <div class="contact-container">
                <h2 class="title">Contactez moi</h2>
                
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
                <h2 class="title">Éducation</h2>
                <div class="course">
                    <h2 class="education-title">Diplôme</h2>
                    <h5 class="college-name"><?php echo $cv['dip']; ?>
                    <h2 class="education-title">Université</h2>
                    <h5 class="college-name"> <?php echo $cv['inst']; ?>
                    <h2 class="education-title">Lieu</h2>
                    <h5 class="college-name"> <?php echo $cv['lieud']; ?></h5>

                    <p class="education-date"> <?php echo $cv['ddd']; ?>
                    -
                     <?php echo $cv['dfd']; ?></p>
                </div>

                
            </div>

            <div class="skills-container">
                <h2 class="title">Expériences</h2>
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
                <h2 class="title text-left">Sur moi</h2>
                <div class="work">
                   
                <p><?php echo $cv['obj']; ?></p>
                </div>

               
            </div>

            <div class="work-container ">
                <h2 class="title text-left">Expérience professionnelle</h2>
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

    <button id="pdf-button" class="next-btn">Télécharger en PDF</button>
    <script src="pdf.js"></script>

   



</body>

</html>