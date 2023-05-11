<?php
//määrittely
$PlaylistId = 8;
$pdo = new PDO('mysql:host=localhost;dbname=chinook', 'root', '');
// Poisto  soittolista
$statement = $pdo->prepare("DELETE FROM playlist_track WHERE PlaylistId = ?");
$statement->execute([$PlaylistId]);
//Poisto playlist_track
$statement = $pdo->prepare("DELETE FROM playlists WHERE PlaylistId = ?");
$statement->execute([$PlaylistId]);

//Yhteyden sulkeminen
$pdo = null;
?>