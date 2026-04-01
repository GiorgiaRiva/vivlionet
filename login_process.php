<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

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

if(isset($data['email'], $data['password'])){
    $email = $conn->real_escape_string($data['email']);
    $password_chiara = $data['password'];

    $sql = "SELECT * FROM utente WHERE email = '$email'";
    $result = $conn->query($sql);

    if($result && $result->num_rows > 0){
        $user_row = $result->fetch_assoc();
        if(password_verify($password_chiara, $user_row['password'])){
            echo json_encode(["success" => true, "nome" => $user_row['nome']]);
        } else {
            echo json_encode(["success" => false, "message" => "Password errata"]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Utente non trovato"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Dati login mancanti"]);
}
$conn->close();
?>