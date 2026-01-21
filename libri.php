<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

// Configurazione database
$host = "localhost";
$user = "root"; // di default XAMPP
$pass = "";     // di default XAMPP
$dbname = "vivlionet_db";

// Connessione
$conn = new mysqli($host, $user, $pass, $dbname);

// Controllo connessione
if($conn->connect_error){
    die(json_encode(["error" => "Connessione al DB fallita: ".$conn->connect_error]));
}

// Query per prendere tutti i libri
$sql = "SELECT * FROM libri";
$result = $conn->query($sql);

$libri = [];

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $libri[] = $row;
    }
}

echo json_encode($libri);

$conn->close();

