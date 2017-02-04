<?php
require 'db.class.php';
$DB = new DB();
$alphabet = array();
$date = date("d-m-Y");
$heure = date("H:i"); 
$depart = new DateTime('2016-04-25 00:00:00');


		if(isset($_GET["date"]))
		{
			$date=$_GET["date"];
			$aujourdhui = new DateTime($date. '00:00:00');
		}
	else
		{	
			$aujourdhui = new DateTime();
		}

	
/* Pour l'affichage de la semaine demandée, par défaut la semaine d'aujourdhui */

$diff = $depart->diff($aujourdhui);  /*difference entre Lundi 25 avril et aujourdhui*/

$nb_jours = $diff->format('%a'); /*a : nombre total en jours*/

$nb_semaines=variant_int($nb_jours/7); /*nombre de semaines (partie entiere)*/

$semaine= clone $depart; /*clone copie le même type d'objet*/

$lundi=$nb_semaines*7; 

$semaine = $semaine->add(new DateInterval('P'.$lundi .'D'));


/*Pour l'affichage de la semaine courante et des 3 semaines a venir dans le <nav>*/

$aujourdhui_nav= new DateTime();

$diff2 = $depart->diff($aujourdhui_nav);  /*difference entre Lundi 25 avril et aujourdhui*/

$nb_jours_nav = $diff2->format('%a'); /*a : nombre total en jours*/

$nb_semaines_nav=variant_int($nb_jours_nav/7); /*nombre de semaines (partie entiere)*/

$semaine_nav= clone $depart; /*clone copie le même type d'objet*/

$lundi2=$nb_semaines_nav*7; 

$semaine_nav = $semaine_nav->add(new DateInterval('P'.$lundi2 .'D'));
