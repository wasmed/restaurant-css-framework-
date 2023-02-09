<?php


$host = 'localhost';
$dbname = 'restaurant';
$username = 'root';
$password = 'root';

if(isset($_POST['insert'])){

  try {
  // se connecter à mysql
  $pdo = new PDO("mysql:host=$host;dbname=$dbname","$username","$password");
   //mysqli_character_set_name($pdo,"utf8");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $exc) {
    echo $exc->getMessage();
    exit();
  }

  // récupérer les valeurs 
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message=$_POST['message'];

  // Requête mysql pour insérer des données
  $sql = "INSERT INTO contact (`name`, `email`,`message`) VALUES (:name,:email,:message)";
  $res = $pdo->prepare($sql);
  $exec = $res->execute(array(":name"=>$name,":email"=>$email,":message"=>$message));

  // vérifier si la requête d'insertion a réussi
  if($exec){
    echo 'Données insérées';

  }else{
    echo "Échec de l'opération d'insertion";
  }
}
