<?php
require 'php/config.php';
session_start();
header('Content-Type:application/json');
$action=$_GET['action']??$_POST['action']??'';
if($action==='add'){
  $data=json_decode(file_get_contents('php://input'),true);
  $id=intval($data['tripId']??0);
  $stmt=$pdo->prepare("SELECT title,price FROM voyages WHERE id=?");
  $stmt->execute([$id]);
  $v=$stmt->fetch(PDO::FETCH_ASSOC);
  if($v){
    $_SESSION['cart'][]=['voyage_id'=>$id,'title'=>$v['title'],'price'=>$v['price']];
    echo json_encode(['success'=>true]);
  } else {
    echo json_encode(['success'=>false]);
  }
  exit;
}
echo json_encode(['success'=>false,'error'=>'unknown']);
