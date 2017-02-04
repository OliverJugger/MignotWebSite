<?php
    include '_inc.php';
    include 'mail.php';
?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../css/ordonnance.css" />
    <style>
        body {
            padding-top: 50px;
        }
        .starter-template {
            padding-top: 40px;
        }
    </style>
</head>
<body>

    <nav>

      <div id="header">
        <p id="headerText">Votre Pharmacie de Lorgues situé dans le Var (83510) </p>
          <img id="facebook" src="../img/Facebook.png" width="32px" height="32px">
          <img id="twitter" src="../img/Twitter.png" width="32px" height="32px">
          <img id="mail" src="../img/mail2.png" width="32px" height="32px">
      </div>

      <img id="logo" src="../img/logoPharmacie.jpg" />
      <img id="logoCroix" src="../img/logoCroix200px.png" />

      <ul id="main">
        <li> <a class="Acceuil" href="../MignotWebSite.html">Acceuil</a></li>
        <li><a id="equipe" href="../equipe.html">équipe</a></li>
        <li><a href="../Planning/planning.php">Planning</a></li>
        <li>Marques</li>
        <li>Services
          <ul class="drop">
            <div>
              <li><a href="index.php">Ordonnance en ligne</a></li>
                <li><a href="../services/livraison.html">Livraison à domicile</a></li>
                <li><a href="../services/garde.html">Service de garde</a></li>
            </div>
          </ul>
        </li>
        <li> <a href="../ContactUs/ContactUs.php">Contact</a></li>
        <li></li>
        <li></li>
        <div id="marker"></div>
      </ul>
    </nav>

<div class="container">

        <?php 
            
        if(array_key_exists('errors', $_SESSION)): ?>
            <div class="alert-danger">
                <?= 'Erreur :</br>' , implode('<li>', $_SESSION['errors']); ?> <!-- ecris de maniere dégeulasse -->
            </div>
        <?php endif; ?>
        <?php if(array_key_exists('success', $_SESSION)): ?>
            <div class="alert-success">
                <?php mail('pharmacie-stferreol@outlook.fr',$sujet,$message,$header); ?>
                Votre email a bien été envoyé
            </div>
        <?php endif; ?>


         <form action="post_contact.php" method="POST">
            <?php $form = new Form(isset($_SESSION['inputs']) ? $_SESSION['inputs'] : []); ?>
            <div class="headerrow">
            <h2> Ordonnance en Ligne </h2>
            </div>
            <div class="row">
                
                <h3> Vos Coordonnées </h3>
                
                <div>
                    <?= $form->select('civilite', 'Civilité', ['Sélectionnez...' , 'Monsieur' , 'Madame' , 'Mademoiselle']); ?>
                </div>
                <div>
                    <?= $form->text('name', 'Nom'); ?>
                </div>
                <div>
                    <?= $form->text('prenom', 'Prenom'); ?>
                </div>
                <div>
                    <?= $form->text('adresse', 'Adresse'); ?>
                </div>
                <div>
                    <?= $form->text('codepostal', 'Code Postal'); ?>
                </div>

                <div>
                    <?= $form->text('ville', 'Ville'); ?>
                </div>
                <div >
                    <?= $form->email('email', 'Email'); ?>
                </div>
                <div>
                    <?= $form->text('tel', 'Numéro de téléphone'); ?>
                </div>
                <div>
                   <h3> Informations relatives au client </h3>
                </div>
                <div >
                    <?= $form->text('secu', 'Numéro de Sécurité Sociale'); ?>
                </div>
                <div >
                    <?= $form->text('age', 'Age'); ?>
                </div>
                <div >
                    <?= $form->text('poids', 'Poids (en kg)'); ?>
                </div>
                            </div>
            <div class="row">
                 <div>
                    <?= $form->textarea('allergies', 'Allergies'); ?>
                </div>
                <div>
                    <?= $form->textarea('autres', 'Autre(s) traitement(s) en cours'); ?>
                </div>
                <div >
                 <?= $form->select('enceinte', 'Je suis enceinte',['Non' , 'Oui']); ?>
                </div>
                 <div>
                   <h3> Votre Message </h3>
                </div>
                    <div>
                    <?= $form->textarea('message', 'Message'); ?>
                     <?= $form->submit('Envoyer'); ?>
                </div>
            </div> 
        </form> 

</div>

<footer>

<div id="footer-info">
  <div id="footerZone">
        <p id="p1"> Où nous trouver ?</p>
        <p id="p2">Pharmacie Saint Férréol<br>1 Avenue de Toulon<br>83510 Lorgues<br><br>Téléphone: 04 94 73 72 97<br>Fax: 04 94 84 36 48<br>Email: pharmacie-stferreol@outlook.fr</p>
        <div id="block2">
          <ul>
            <li>Ordonnance en ligne</li>
            <li>Livraison à domicile</li>
            <li>Service de garde</li>
          </ul>
        </div>
    <div id="Gmap">
    <div id="map">
      <script>
      function initMap() {
        var myLatLng = {lat: 43.493127, lng: 6.358338};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
      }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8PLo06eCIatA-K4ute1zwzZ96QncKiGk&signed_in=true&callback=initMap"></script>
  </div>
</div>
</div>
</div>
<div id="footer-links">
  <div id="links">
    <ul>
      <li><a href"../mentions_legales.html">Mentions légales</a>Mentions légales</li>
    </ul>
    <ul>
      <li>©2016-2016 Pharmacie St Ferréol</li>
    </ul>
    <ul>
      <li>Nous contacter</li>
    </ul>
  <div>
</div>

</footer>

<? if (array_key_exists('mail', $_SESSION)){
    echo $_SESSION['mail']} ;?>

</body>
</html><?php
unset($_SESSION['inputs']);
unset($_SESSION['success']);
unset($_SESSION['errors']);
unset($_SESSION['message_txt']);
unset($_SESSION['message_html']);
?>