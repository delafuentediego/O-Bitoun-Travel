<?php
require '../config.php';
session_start();
$vid=intval($_POST['voyage_id']??0);
$heb=$_POST['hebergement']??'std';
$nbh=intval($_POST['nb_hebergement']??1);
$trans=$_POST['transport']??'bus';
$nbt=intval($_POST['nb_transport']??1);
$prixtrans=floatval($_POST['prix_transport']??0);
$rest=$_POST['restauration']??'aucune';
$nbr=intval($_POST['nb_restauration']??1);
$stmt=$pdo->prepare("SELECT price FROM voyages WHERE id=?");
$stmt->execute([$vid]);
$base=floatval($stmt->fetchColumn()?:0);
$total=$base;
if($heb==='confort') $total+=20*$nbh;
if($heb==='luxe')    $total+=50*$nbh;
$total+=$prixtrans*$nbt;
if($rest==='demi')    $total+=15*$nbr;
if($rest==='complete')$total+=30*$nbr;
$_SESSION['cart'][]=[
  'voyage_id'=>$vid,
  'hebergement'=>$heb,
  'transport'=>$trans,
  'restauration'=>$rest,
  'price'=>$total
];
header('Location:../../paiement.html');
exit;
