<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$host = "localhost";
$user = "admin";
$pass = "bVXvX7mubnmT"; // Di solito in XAMPP la password di root è vuota. Se hai messo "pippo", lasciala pure.
$dbname = "vivlionet";

$conn = new mysqli($host, $user, $pass, $dbname);

// Controllo connessione
if($conn->connect_error){
    die(json_encode(["error" => "Connessione al DB fallita: ".$conn->connect_error]));
}

$sql = "SELECT * FROM libro";
$result = $conn->query($sql);

$libri = []; // Inizializziamo un array vuoto

if($result && $result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $libri[] = $row; // Aggiunge ogni riga del database all'array
    }
}

// Invio dei dati in formato JSON
echo json_encode($libri);

$conn->close();
?>