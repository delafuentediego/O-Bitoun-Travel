<?php
require 'php/config.php';
session_start();
if(!isset($_SESSION['user'])){
  header('Location:connexion.html');exit;
}
if($_SERVER['REQUEST_METHOD']==='POST'){
  $id=$_SESSION['user']['id'];
  $nom=trim($_POST['username']??'');
  if($nom){
    $stmt=$pdo->prepare("UPDATE users SET nom=? WHERE id=?");
    $stmt->execute([$nom,$id]);
    $_SESSION['user']['nom']=$nom;
  }
  header('Location:profil.html?success=updated');exit;
}
header('Location:profil.html');
exit;
