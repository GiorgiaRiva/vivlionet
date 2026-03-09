<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$host = 'columbina.vps.webdock.cloud';  // ← Indirizzo del VPS
$user = 'username_db';                    // ← Username database
$password = 'password_db';                // ← Password database
$database = 'vivlionet';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

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

