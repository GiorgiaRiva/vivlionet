<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$libri = [
  [
    "id" => 1,
    "titolo" => "Le parole della pioggia",
    "genere" => "Romanzo",
    "immagine" => "https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcT-4Lq-lamtVBzAp5D9TJQEBHDs5F309nZICWiOgskbJpUz0BuIkd78VT9Y2nN-sZdIq_puFVVeectIDhx-zb6QfFZWZ3jnJQ2J5l1YzbrQpiP7TVsjdrN-VA"
  ],
  [
    "id" => 2,
    "titolo" => "Il mio segreto",
    "genere" => "Narrativa",
    "immagine" => "https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRQXn47XCGDA8KIbikgkyzbnilXZXN4Pqxubup2GiwsJUjcsBjz"
  ],
  [
    "id" => 3,
    "titolo" => "Il cerchio dei giorni",
    "genere" => "Romanzo",
    "immagine" => "https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQvrJwl2R3hCAjwumts05EDpAQyNVVdWjM4oPIfMeu-sq4RCmk7"
  ]
];

echo json_encode($libri);
