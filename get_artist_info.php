<?php
//Määrittely
$artist_id = 12;

// Avaa tietokantayhteys
$pdo = new PDO("mysql:host=localhost;dbname=chinook", "root", "");

// Haetaan artistin kaikki kappaleet tietokannasta
$stmt = $pdo->prepare("
    SELECT tracks.Name
    FROM tracks
    INNER JOIN albums ON tracks.AlbumId = albums.AlbumId
    INNER JOIN artists ON albums.ArtistId = artists.ArtistId
    WHERE artists.ArtistId = ?
");
$stmt->execute([$artist_id]);
$tracks = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Sulje tietokantayhteys
$pdo = null;

// Palauta kappaleet JSON-muodossa
header('Content-Type: application/json');
print_r(json_encode($tracks));
?>
