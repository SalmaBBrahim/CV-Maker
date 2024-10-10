<?php
include '../controller/CVController.php';

$error = "";

// create CV
$cv = null;

// create an instance of the controller
$cvC = new CVController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Multi-Step Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="style.css">
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
   </style>
 
</head>
<body>





<div class="container mt-3 mb-10 row" >
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
        $cv = $cvC->showCV($_POST['cvid']);
?>
  <form id="multiStepForm" action="editcv.php" method="post">

     <div class="form-outline mb-4" hidden>
          <input type="text" id="cvid" name="cvid" class="form-control"  value="<?php echo $cv['id']; ?>" readonly />
          <label class="form-label" for="cvid" id="id">ID</label>
    </div>
    <div class="step" id="step1" style="display: block;">
      <h2>Dites-nous en plus sur vous..</h2>
      <label><strong>Coordonnées:</strong></label><br>
      <div class="mt-3 mb-3 col-8" >
        <label class="form-label ">Sélectionnez une Photo de Profil: </label>
        <input class="form-control " name="profile_image" type="file" required>
      </div>
      <div class="mb-3 mt-3 col-6">
        <label >Nom:</label>
        <input type="text" class="form-control" placeholder="Entrez votre Nom" name="nom" value=<?php echo $cv['fname']; ?>>
      </div>
      <div class=" mb-3 mt-3 col-5">
        <label >Prénom:</label>
        <input type="text" class="form-control" placeholder="Entrez votre Prénom" name="prenom" value=<?php echo $cv['lname']; ?>>
      </div>
      <div class="mb-3 mt-3 col-8">
        <label >Profession:</label>
        <input type="text" class="form-control col-5" placeholder="Quelle est votre Profession?" name="profession" value=<?php echo $cv['prof']; ?>>
      </div>
      <div class="mb-3 mt-3 col-8">
        <label >E-mail:</label>
        <input type="email" class="form-control" placeholder="Tapez votre e-mail" name="email" value=<?php echo $cv['email']; ?>>
      </div>
      <div class="mb-3 mt-3 col-5">
        <label >Numéro de Téléphone</label>
        <input class="form-control" placeholder="Tapez votre numéro de téléphone" name="numtel" value=<?php echo $cv['numtel'];?>>
      </div>
      <button class="next-btn" type="button" onclick="validateStep(2, 1)">Suivant</button>
    </div>

    <div class="step" id="step2" style="display: none;">
      <h3>Excellent ! Maintenant, passons à votre expérience professionnelle..</h3>
      <div class=" mb-3 mt-3 col-6">
        <label >Titre/Poste</label>
        <input type="text" class="form-control" name="poste" value=<?php echo $cv['poste']; ?>>
      </div>
      <div class="mb-3 mt-3 col-8">
        <label >Entreprise</label>
        <input type="text" class="form-control"  name="entreprise" value=<?php echo $cv['entreprise']; ?>>
      </div>
      <div class="mb-3 mt-3 col-5">
        <label >Lieu (Ville,Pays)</label>
        <input type="text" class="form-control" name="lieue" value=<?php echo $cv['lieu']; ?>>
      </div>
      <div class="d-flex  mb-3">
        <div>
          <label class="form-label  mt-3">Date de Début</label>
          <input type="date" name="deb" class="form-control" value=<?php echo $cv['dde']; ?>>
        </div>
        <div>
          <label class="form-label mt-3 ">Date de Fin</label>
          <input type="date" name="fin" class="form-control" value=<?php echo $cv['dfe']; ?>>
        </div>
      </div>
	  <div style="display: flex; justify-content: space-between; margin-top: 20px;">
      <button class="next-btn" type="button" onclick="navigateStep(1, 2)">Précédent</button>
      <button class="next-btn" type="button" onclick="validateStep(3, 2)">Suivant</button>
	  </div>
    </div>

    <div class="step" id="step3" style="display: none;">
      <h3>Maintenant, travaillons sur les objectifs de votre CV!</h3>
      <div class=" mb-3 mt-3">
        <label ><strong>Objectif:</strong></label>
        <textarea  class="form-control" name="objectif" rows="6" id="objective"><?php echo $cv['obj']; ?></textarea>
        <p id="objectiveError"  style="color: red; font-size: 12px;"></p>
      </div>
	  <div style="display: flex; justify-content: space-between; margin-top: 20px;">
      <button class="next-btn" type="button" onclick="navigateStep(2, 3)">Précédent</button>
      <button class="next-btn" type="button" onclick="validateStep(4, 3)">Suivant</button>
	  </div>
    </div>

    <!-- Step 4 -->
    <div class="step" id="step4" style="display: none;">
      <h3>Nous avons presque couvert toutes les bases!</h3>
      <h5> Ajoutez maintenant une liste de compétences</h5>
      <div class="mb-3 mt-3">
        <label ><strong>Compétences:</strong></label>
        <textarea name="competences" class="form-control"  rows="6" id="competence"><?php echo $cv['comp']; ?></textarea>
        <p id="competenceError"  style="color: red; font-size: 12px;"></p>
      </div>
	  <div style="display: flex; justify-content: space-between; margin-top: 20px;">
      <button class="next-btn" type="button" onclick="navigateStep(3, 4)">Précédent</button>
      <button class="next-btn" type="button" onclick="validateStep(5, 4)">Suivant</button>
	  </div>
    </div>

    <div class="step" id="step5" style="display: none;">
      <h2>Super ! Maintenant, quels sont vos diplômes ?</h2>
      <div class="mb-3 mt-3 col-6">
        <label >Diplôme(s): </label>
        <input type="text" class="form-control" name="diplome" id="diplome" value=<?php echo $cv['dip']; ?>>
      </div>
      <p id="diplomeError" style="color: red; font-size: 12px;"></p>
      <div class=" mb-3 mt-3 col-5">
        <label >Nom de l'établissement / institution:</label>
        <input type="text" class="form-control"name="institution" id="etab" value=<?php echo $cv['inst']; ?>>
      </div>
      <p id="etabError" style="color: red; font-size: 12px;"></p>
      <div class="mb-3 mt-3  col-7">
        <label >Lieu:</label>
        <input type="text" class="form-control"  name="lieud" id="loc" value=<?php echo $cv['lieud']; ?>>
      </div>
      <p id="locError" style="color: red; font-size: 12px;"></p>
      <div class="d-flex mb-3 ">
        <div>
          <label class="form-label  mt-3">Date de Début:</label>
          <input type="date" name="from1" class="form-control" id="d1" value=<?php echo $cv['ddd']; ?>>
        </div>
        <div>
          <label class="form-label mt-3 ">Date d'obtention du diplôme:</label>
          <input type="date" name="to1" class="form-control" id="d2" value=<?php echo $cv['dfd']; ?>>
        </div>
      </div>
      <p id="dateError" style="color: red; font-size: 12px; "></p>
	  <div style="display: flex; justify-content: space-between; margin-top: 20px;">
      <button class="next-btn" type="button" onclick="navigateStep(4, 5)">Précédent</button>
		<button class="next-btn" type="submit" >Terminer</button>

		</div>


    </div>
  </form>
</div>
<script>
  let currentStep = 1;

  function navigateStep(to, from) {
    document.getElementById(`step${from}`).style.display = 'none';
    currentStep = to;
    document.getElementById(`step${currentStep}`).style.display = 'block';
  }

  function validateStep(nextStep, currentStep) {
    // Add your validation logic here
    let isValid = true;

    // Validate Step 1
    if (currentStep === 1) {
      const profileImage = document.getElementsByName('profile_image')[0].value;
      const nom = document.getElementsByName('nom')[0].value;
      const prenom = document.getElementsByName('prenom')[0].value;
      const profession = document.getElementsByName('profession')[0].value;
      const email = document.getElementsByName('email')[0].value;
      const numtel = document.getElementsByName('numtel')[0].value;

      if (!profileImage || !nom || !prenom || !profession || !email || !numtel) {
        isValid = false;
        alert('Please fill in all required fields in Step 1');
      }
    }

    // Validate Step 2
    else if (currentStep === 2) {
      const poste = document.getElementsByName('poste')[0].value;
      const entreprise = document.getElementsByName('entreprise')[0].value;
      const lieu = document.getElementsByName('lieue')[0].value;
      const deb = document.getElementsByName('deb')[0].value;
      const fin = document.getElementsByName('fin')[0].value;

      if (!poste || !entreprise || !lieu || !deb || !fin) {
        isValid = false;
        alert('Please fill in all required fields in Step 2');
      }
    }

    // Validate Step 3
    else if (currentStep === 3) {
      var objective = document.getElementById("objective").value.trim();
      var objectiveError = document.getElementById("objectiveError");
      

      // Validate objective
      if (objective === '') {
        objectiveError.textContent = "Veuillez saisir votre Objectif*";
        isValid = false;
      } else {
        objectiveError.textContent = '';
      }

      // Prevent form submission if validation fails
      if (!isValid) {
        event.preventDefault();
      }
    }

    // Validate Step 4
		else if (currentStep === 4) {
      var competence = document.getElementById("competence").value.trim();
      var competenceError = document.getElementById("competenceError");

      // Validate competence
      if (competence === '') {
        competenceError.textContent = "Veuillez saisir au moins une compétence*";
        isValid = false;
      } else {
        competenceError.textContent = '';
      }

      // Prevent form submission if validation fails
      if (!isValid) {
        event.preventDefault();
      }
    }

    // Validate Step 5
    else if (currentStep === 5) {
      var diplome = document.getElementById("diplome");
      var etab = document.getElementById("etab");
      var loc = document.getElementById("loc");
      var d1 = document.getElementById("d1");
      var d2 = document.getElementById("d2");

      var diplomeError = document.getElementById("diplomeError");
      var etabError = document.getElementById("etabError");
      var locError = document.getElementById("locError");
      var dateError = document.getElementById("dateError");

      // Validate diplome
      if (!diplome.value) {
        diplomeError.textContent = "Veuillez saisir votre diplome*";
        isValid = false;
      } else {
        diplomeError.textContent = '';
      }

      // Validate etab
      if (!etab.value) {
        etabError.textContent = "Le nom de l'établissement est obligatoire*";
        isValid = false;
      } else {
        etabError.textContent = '';
      }

      // Validate loc
      if (!loc.value) {
        locError.textContent = "Veuillez saisir le lieu de l'établissement svp*";
        isValid = false;
      } else {
        locError.textContent = '';
      }

      // Validate date
      if (!d1.value || !d2.value) {
        dateError.textContent = "Vérifiez les dates svp*";
        isValid = false;
      } else {
        dateError.textContent = '';
      }

      // Prevent form submission if validation fails
      if (!isValid) {
        event.preventDefault();
      }
    }
  

    // If validation passed, navigate to the next step
    if (isValid) {
      if (nextStep !== 5) {
        document.getElementsByClassName('next-btn')[nextStep - 1].style.display = 'block';
      }
      navigateStep(nextStep, currentStep);
    }
}
</script>


</body>
</html>
