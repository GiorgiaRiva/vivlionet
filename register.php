<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

$host = "localhost";
$user = "admin"; 
$pass = "bVXvX7mubnmT"; 
$dbname = "vivlionet";

$conn = new mysqli($host, $user, $pass, $dbname);

if($conn->connect_error){
    die(json_encode(["success" => false, "message" => "Connessione fallita"]));
}

$input = file_get_contents("php://input");
$data = json_decode($input, true);

if(isset($data['email'], $data['password'], $data['nome'])){
    $nome = $conn->real_escape_string($data['nome']);
    $email = $conn->real_escape_string($data['email']);
    $password_hash = password_hash($data['password'], PASSWORD_BCRYPT);

   $sql = "INSERT INTO utente (nome, email, password) 
        VALUES ('$nome', '$email', '$password_hash')";

    if($conn->query($sql)){
        echo json_encode(["success" => true, "message" => "Registrazione completata!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Errore SQL: " . $conn->error]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Dati mancanti"]);
}
$conn->close();
?>