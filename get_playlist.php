<?php

// Tarkista, että playlist_id on määritetty
$playlist_id = $_GET["playlist_id"];

// Yhdistä tietokantaan
$pdo = new PDO('mysql:host=localhost;dbname=chinook', 'root', '');

// Valmistele ja suorita kysely
$stmt = $pdo->prepare('SELECT tracks.name, tracks.composer FROM tracks WHERE tracks.name = :playlist_id');
$stmt->bindParam(":playlist_id", $playlist_id);
$stmt->execute();

// Tulosta kappaleiden tiedot
$allRows = $stmt->fetchAll();

foreach($allRows as $row) {
  echo $row["TrackId"];
}
?>
