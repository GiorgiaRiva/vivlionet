<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$host = "localhost";
$user = "root";
$pass = "";     
$dbname = "vivlionet_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if($conn->connect_error){
    die(json_encode(["error" => "Connessione al DB fallita: ".$conn->connect_error]));
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

