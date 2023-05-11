<?php
$pdo = new PDO("mysql:host=localhost;dbname=chinook", "root", "");


$body = file_get_contents("artist.json");
$artist = json_decode($body, true);

$sql = "INSERT INTO artists(Name) Values('$artist[Name]')";

$pdo->exec($sql);
?>