<?php
//Määrittely
$artist_id = 12;

// Yhteys
$pdo = new PDO("mysql:host=localhost;dbname=chinook", "root", "");

// Artistin kappaleet
$stmt = $pdo->prepare("
    SELECT tracks.Name
    FROM tracks
    INNER JOIN albums ON tracks.AlbumId = albums.AlbumId
    INNER JOIN artists ON albums.ArtistId = artists.ArtistId
    WHERE artists.ArtistId = ?
");
$stmt->execute([$artist_id]);
$tracks = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Yhteyden sulkeminen
$pdo = null;

// JSON
header('Content-Type: application/json');
print_r(json_encode($tracks));
?>
