<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$host = "localhost";
$user = "admin";
$pass = "bVXvX7mubnmT"; 
$dbname = "vivlionet";

$conn = new mysqli($host, $user, $pass, $dbname);

// Controllo connessione
if($conn->connect_error){
    die(json_encode(["error" => "Connessione al DB fallita: ".$conn->connect_error]));
}

$sql = "SELECT libro.*, CONCAT(autore.nome, ' ', autore.cognome) AS autore 
        FROM libro 
        LEFT JOIN autore ON libro.id_autore = autore.id_autore";

$result = $conn->query($sql);

$libri = []; 

if($result && $result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $libri[] = $row; 
    }
}

// Invio dei dati in formato JSON
echo json_encode($libri);

$conn->close();
?>