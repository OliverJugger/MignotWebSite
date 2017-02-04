<?php
require '_inc.php';
$errors = [];
$civilite= ['Aucune', 'Monsieur', 'Madame', 'Mademoiselle'];
$enceinte= ["n'est PAS enceinte" , "est ENCEINTE"] ;
$validator = new Validator($_POST);
$validator->check('civilite', 'required'); /*required verifie que le champ n'est pas vide */
$validator->check('name', 'required');
$validator->check('prenom', 'required');
$validator->check('adresse', 'required');
$validator->check('codepostal', 'required');
$validator->check('ville', 'required');
$validator->check('email', 'required');
$validator->check('email', 'email'); /*email verifie que c'est un email */
$validator->check('tel', 'required');
/*$validator->check('tel' , 'int'); int : entier, verifier que c'est bien un nombre entier*/
$validator->check('secu', 'required');
/*$validator->check('secu' , 'int');*/
$validator->check('age', 'required');
/*$validator->check('age' , 'int');*/
$validator->check('poids', 'required');
$validator->check('enceinte', 'required');
$validator->check('civilite', 'in', array_keys($civilite));
$validator->check('enceinte', 'in', array_keys($enceinte));
$errors = $validator->errors();

if(!empty($errors)){
    $_SESSION['errors'] = $errors;
    $_SESSION['inputs'] = $_POST;
    header('Location: index.php');
} else {
  	$_SESSION['success'] = 1;

  	if(empty($_POST['allergies'])){
  		$_SESSION['allergies']= "rien de spécifié";
  	}
  	else{
  		$_SESSION['allergies']= $_POST['allergies'];
  	}
  	if(empty($_POST['autres'])){
  		$_SESSION['autres']= "rien de spécifié";
  	}
  	else{
  		$_SESSION['autres']= $_POST['autres'];
  	}
  	if(empty($_POST['message'])){
  		$_SESSION['message']= "message vide";
  	}
  	else{
  		$_SESSION['message']= $_POST['message'];
  	}

  	$_SESSION['message_html'] ="<html style = 'background-color:#374954; color=white;'><head></head><body>
  	<header>
	<h1 style='text-decoration:underline;'>Bonjour</h1>
	<h2>Voici l'ordonnance de <strong>". $civilite[$_POST['civilite']] . ' ' . $_POST['name'] . ' ' . $_POST['prenom'] ."</strong>.</h2> </header>"
	."<p> Adresse : " . $_POST['adresse'] ."</p>" 
	."<p> Code Postal : " .$_POST['codepostal'] . ", " . $_POST['ville']  ."</p>"
	."<p> Numéro de sécurité sociale : ". $_POST['secu'] ."</p>"
	."<p> <span style='font-decoration:underline'> Informations de santé sur la personne :</span><br/> " .$_POST['age'] ." ans, <br/>" . $_POST['poids'] . " kg,<br/>" 
	."Cette personne <strong>" .$enceinte[$_POST['enceinte']] ."</strong>.<br/>"
	."Cette personne a également indiqué qu'elle etait allegique (à/au) : <strong style='color : red'>" .$_SESSION['allergies'] . '</strong>.<br/>'
	."Autre traitement en cours : <strong>" .$_SESSION['autres'] ."</strong></p>"
	."<p>Petit message/information en plus : " . $_SESSION['message'] ."</p>" 
	."<h3> Pour contacter la personne : </h3>"
	."<p> Email : " . $_POST['email'] ."</p>" 
	."<p> Numéro de téléphone : " .$_POST['tel'] ."</p>"
	."</body></html>";

    $_SESSION['message_txt'] = 'Voici un mail de ' . $_POST['civilite'] . ' ' . $_POST['name'] . ' ' . $_POST['prenom'] . ' habite au ' . $_POST['adresse'] . ' ' . $_POST['codepostal'] . ' à ' . $_POST['ville'] . ' ' . $_POST['email'] . ' ' . $_POST['secu'] . ' ' . $_POST['age'] . 'ans ' . $_POST['poids'] . 'kg ' . $_SESSION['allergies'] . ' ' . $_SESSION['autres'] . ' ' . $_POST['enceinte'] . ' ' . $_SESSION['message'] . ' ' . $_POST['tel'] . ' ';
 	
 	$_SESSION['sujet'] = $civilite[$_POST['civilite']].' '.$_POST['name'];
    header('Location: index.php');
    /* mail($emails[$_POST['service']], 'Formulaire de contact de ' . $_POST['name'], $_POST['message'], $headers);*/
}