<!doctype html>
<html lang="en">
<?php 
include '../controller/CVController.php';
$cvC = new CVController();

?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


    <style>
        body {
            height: 100vh;
            background: linear-gradient(to right, #00008B, #00BFFF);


        }

        .form-signin {
            max-width: 330px;
            padding: 1rem;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="text"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>



</head>

<body class="d-flex align-items-center">
    <div class="w-100">
        <main class="form-signin w-100 m-auto bg-white shadow rounded">
        <form action="signup.php" method="post">
                <div class="d-flex gap-2 justify-content-center">
                <img class="mb-4" src="uploads/cv logo.jpg" alt="" height="70">
                   
                </div>


                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" name="nom">
                    <label for=""><i class="bi bi-person"></i>Nom</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingEmail" name="email" >
                    <label for="floatingInput"><i class="bi bi-envelope"></i>Votre email</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" name="password">
                    <label for="floatingPassword"><i class="bi bi-key"></i>mot de passe</label>
                </div>

                <button class="btn btn-primary w-100 py-2" type="submit"><i class="bi bi-person-plus-fill"></i> S'inscrire
                </button>
                <div class="d-flex justify-content-between my-3">
                <p> enregistré? <a href="loginForm.php"> Se connecter</a></p>
             

            </form>
        </main>

    </div>




</body>

</html>