<?php
require '../config.php';
$email=trim($_POST['email']??'');
$pw=$_POST['password']??'';
if(!$email||!$pw) {
  header('Location:../../connexion.html?error=missing');exit;
}
$stmt=$pdo->prepare("SELECT * FROM users WHERE email=?");
$stmt->execute([$email]);
$user=$stmt->fetch(PDO::FETCH_ASSOC);
if(!$user||!password_verify($pw,$user['password'])) {
  header('Location:../../connexion.html?error=invalid');exit;
}
$_SESSION['user']=[
  'id'=>$user['id'],'nom'=>$user['nom'],
  'prenom'=>$user['prenom'],'email'=>$user['email']
];
header('Location:../../index.html');exit;
