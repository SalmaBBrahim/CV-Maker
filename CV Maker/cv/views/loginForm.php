<!doctype html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>login</title>
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

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
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
        <form action="login.php" method="post">
        <main class="form-signin w-100 m-auto bg-white shadow rounded">

                <div class="d-flex gap-2 justify-content-center">
                    <img class="mb-4" src="uploads/cv logo.jpg" alt="" height="70">
                   
                      
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingEmail" placeholder="name@gmail.com"  name="email" >
                    <label for="floatingInput"><i class="bi bi-envelope"></i>votre email </label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="  Votre mot de passe" name="password" >
                    <label for="floatingPassword"><i class="bi bi-key"></i>Mot de passe</label>
                </div>

                <button class="btn btn-primary w-100 py-2" type="submit"  name="submit">Se connectez
                    <i class="bi bi-box-arrow-in-right"></i></button>
                <div class="d-flex justify-content-between my-3">

                <p> Non enregistré? <a href="signupForm.php">Créez votre compte</a></p>


                </div>

            </form>

    </div>


    </main>

</body>

</html>