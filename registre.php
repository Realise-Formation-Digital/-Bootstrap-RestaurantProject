<?php require 'functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link type="text/css" rel="stylesheet" href="/css/index.css">
    <title>Home Page CopyPasta</title>
</head>

<!-- Validadtion   -->

<?php

    $errors = array();
 
if(isset($_POST["submit"])) { // Le formulaire a été envoyer
    // Vérification du nom 
    if (empty($_POST["pseudo"]) || !preg_match ('/[a-zA-Z09_]+/', $_POST["pseudo"])) { 
        $errors['pseudo'] = "Votre nom est invalide ";
    }

    // Vérification email 
    if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Votre adresse email est invalide")</script>';
        $errors['email'] = "Votre adresse email est invalide";
    }

    // Vérification password
    if (empty($_POST["password"]) || $_POST["password"] != $_POST["password_confirm"]){
        $errors['password'] = "Vous devez rentrer un mot de passe valide";
    } else {

        $_password_crypt = password_hash ($_POST["password"], PASSWORD_BCRYPT);
        $_POST["password"] = $_password_crypt;
        $_POST["password_confirm"] = $_password_crypt;
       
    }
    debug($errors);
    print_r($_POST);

    if (empty($errors)) {
    
        print_r($_POST);
          $fp = fopen('users.csv', 'a');
      
          fputcsv($fp, [$_POST["pseudo"] , $_POST["email"], $_POST["password"]]);
          
          fclose($fp);
          echo '<script>alert("Votre compte a bien été créé")</script>';
       }
}
?>

<Body>

<!-- banderole vidéo -->
<header>
    <div class="overlay"></div>
        <img src="./public/>
    <div class="container h-100">
        <div class="d-flex h-100 text-center align-items-center">
            <div class="w-100 text-white">
                <h1 class=" display-4">CopyPasta</h1>
                <p class="lead mb-0">Quando Marco fa la pasta.</p>
            </div>
        </div>
    </div>
</header>


<!-- LOGO + NAVBAR -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark" id="main-nav">
    <div class="container">
        <div class="navbar-logo">
            <img src="public/images/home/LOGO CopyPasta/logo_transparent.png" style="height: 200px">
        </div>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mr-1">
                    <a href="index.php" class="nav-link">Accueil</a>
                </li>
                <li class="nav-item mr-1">
                    <a href="apropos.html" class="nav-link">A Propos</a>
                </li>
                <li class="nav-item mr-1">
                    <a href="carteRestaurant.html" class="nav-link">Carte des Plats</a>
                </li>
                <li class="nav-item mr-1">
                    <a href="info.html" class="nav-link">Infos Pratiques</a>
                    <!--<a href="contact.php" class="nav-link">Contact</a>-->
                </li>
                <li class="nav-item mr-1">
                    <a href="contact.php" class="nav-link">Contact</a>
                </li>
            </ul>
        </div>
    </div>
     
    <!-- Modal Login Button-->
    <!-- <div class="container">  -->
        <ul class="navbar-nav ml-auto"> 
                 <li class="nav-item mr-1">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        Login
                      </button>
                </li>
                <li class="nav-item mr-1">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
                        S'inscrire
                      </button>
                </li>
        </ul>
  <!--   </div> -->
</nav>
 
<div class="container">  
<div class="modal" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">
  
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">S'inscrire</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
  
         <!-- Modal Body -->
         <!--  -->
            <div class="modal-body">
                <!--  <form action="/index.html"  method="post" onsubmit="checkValidity();">  -->
               
                <form class="needs-validation" action="" method="POST" >
                
                <div class="form-group">
                      <label for="nom">Pseudo</span></label>
                      <input type="text" name="pseudo" class="form-control" placeholder="">

                      <div class="invalid-feedback">
                         Entrez un email valide.
                      </div>
                    </div>
                
                    <div>
                      <label for="email">Email</span></label>
                      <input type="text" name="email" class="form-control" placeholder="">

                      <div class="invalid-feedback">
                         Entrez un email valide.
                      </div>
                    </div>

                    <div>
                      <label for="Mot de passe">Password:</label>
                      <input type="password" name="password" class="form-control" placeholder="" minlength="8">
                    </div>
                    
                    <div class=>
                      <label for="Confirmez votre mot de passe">Password:</label>
                      <input type="password" name="password_confirm" class="form-control" placeholder="" minlength="8">
                    </div>
                    <button type="submit" name="submit" class="btn btn-default">Valider</button>
                    <!-- <div class="form-group"> -->
                        <!-- <button type="submit" name="submit" class="btn btn-default">Soumettre</button>  -->
                       
                    <!-- </div> -->
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal Body -->
        <div class="modal-body">
          <!--  <form action="/index.php"  method="post" onsubmit="checkValidity();">  -->
            <form class="needs-validation" action="/index.php" method="POST" >
                <div class="form-group">
                    <label for="email">Email</span></label>
                    <input type="email" class="form-control" id="email autocomplete="username name="email" 
                        placeholder=" votreNom@votreDomain.com" required autofocus>

                    <div class="invalid-feedback">
                        Entrez un email valide.
                    </div>

                </div>
                <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" id="password" autocomplete="password" placeholder="votre password" minlength="8" required >
                </div>
                <button type="submit" class="btn btn-default">Soumettre</button>
              </form>
            </div>
      </div>
    </div>
</div>


<!-- LOGO + NAVBAR 2 -->


<!-- Section seconde bannière image -->


<section id="ban2" class="py-2">
    <div class="container">

        <div id="carouselContent" class="carousel slide" data-ride="carousel" data-interval="4000">

            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active text-center p-4">
                    <p class="font-italic">"Bienvenue sur notre site CopyPasta."
                    </p>
                </div>
                <div class="carousel-item text-center p-4">
                    <p class="font-italic">"Notre restaurant est à nouveau ouvert depuis 20 novembre 2020."
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- Fin HEADER----------------------------------------------------------------------------------- -->


<!----------- Footer ------------>
<div class="">
    <section style="height:80px;"></section>
    <div class="row" style="text-align:center;">
        <h2></h2>
    </div>

    <footer class="footer-bs">
        <div class="row">
            <div class="col-md-3 footer-brand animated fadeInLeft">
                <h2 class="footfont">CopyPasta</h2>
                <p>Suspendisse hendrerit tellus laoreet luctus pharetra. Aliquam porttitor vitae orci nec ultricies.
                    Curabitur vehicula, libero eget faucibus faucibus, purus erat eleifend enim, porta pellentesque ex
                    mi ut sem.</p>
                <p>© 2014 Banda Digital Agency, All rights reserved</p>
            </div>
            <div class="col-md-4 footer-nav animated fadeInUp">
                <h4>Menu —</h4>
                <div class="col-md-6">
                    <ul class="pages">
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#">A Propos</a></li>
                        <li><a href="#">La Carte des Plats</a></li>
                        <li><a href="#">Infos Pratiques</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contacts</a></li>
                        <li><a href="#">Terms & Condition</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 footer-social animated fadeInDown">
                <h4>Follow Us</h4>
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">RSS</a></li>
                </ul>
            </div>

            <div class="col-md-3 footer-ns animated fadeInRight">
                <h4>Newsletter</h4>
                <p>Pour recevoir toutes les informations concernant le restaurant CopyPasta</p>
                <p>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Inscrivez-vous...">
                    <span class="input-group-btn">
                          <button class="btn btn-default" type="button"><span
                                  class="glyphicon glyphicon-envelope"></span></button>
                        </span>
                </div><!-- /input-group -->
                </p>
            </div>
        </div>

        <a class="gotopbtn" href="#"> <i class="fas fa-arrow-up"></i> </a>
    </footer>
    <section style="text-align:center; margin:10px auto;"><p>Designed by Banda Digital Agency <a
            href="http://enfoplus.net">Dario/Axel/Norah/Brusk/Abreha</a></p></section>

</div>


<!-- Scripts Bootstrap/Jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
<!-- Scripts Javascript -->       
<script src="js/app.js"></script>

</Body>
</html>