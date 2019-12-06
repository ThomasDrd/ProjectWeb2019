<?php
session_start();

$contenucomments = $_POST['contenuComments'];
$deal_id = $_POST['deal_id'];
$user_id = $_SESSION['user_id'];

//$bdd = new PDO('mysql:host=localhost:3308;dbname=;charset=utf8', 'root', '');

$rq = $bdd->prepare('SELECT user_id FROM utilisateurs WHERE PSEUDO = :pseudo');
$rq->execute(array(
    'pseudo' => $iduser));
$data = $rq->fetchAll();

$iduser = $data[0][0];// a enlever au besoin

$in = $bdd->prepare('INSERT INTO comments(CONTENUCOMMENTS, DEAL_ID, USER_ID) VALUES(:contenuComments, :deal_id, :user_id)');
$in->execute(array(
    'contenuComments' => $contenucomments,
    'deal_id' => $deal_id,
    'user_id' => $user_id));

header('Location: ../index.php?page=dealdetail&dealid=' . $deal_id);
?>