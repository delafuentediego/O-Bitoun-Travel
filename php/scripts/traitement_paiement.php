<?php
require '../config.php';
session_start();
if(empty($_SESSION['cart'])){
  header('Location:../../recherche.html');
  exit;
}
$total=array_sum(array_column($_SESSION['cart'],'price'));
$_SESSION['cart']=[];
header('Location:../../index.html?success=paiement');
exit;
