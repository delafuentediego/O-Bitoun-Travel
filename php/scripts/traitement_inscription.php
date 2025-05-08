<?php
require '../config.php';
$nom=trim($_POST['nom']??'');
$prenom=trim($_POST['prenom']??'');
$email=trim($_POST['email']??'');
$pw=$_POST['password']??'';
$cpw=$_POST['confirm-password']??'';
if(!$nom||!$prenom||!$email||!$pw||!$cpw) {
  header('Location:../../inscription.html?error=missing');exit;
}
if($pw!==$cpw) {
  header('Location:../../inscription.html?error=nomatch');exit;
}
$stmt=$pdo->prepare("SELECT id FROM users WHERE email=?");
$stmt->execute([$email]);
if($stmt->fetch()) {
  header('Location:../../inscription.html?error=exists');exit;
}
$hash=password_hash($pw,PASSWORD_DEFAULT);
$stmt=$pdo->prepare("INSERT INTO users(nom,prenom,email,password) VALUES(?,?,?,?)");
$stmt->execute([$nom,$prenom,$email,$hash]);
header('Location:../../connexion.html?success=registered');exit;
