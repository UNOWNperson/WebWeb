

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Stylesheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&display=swap" rel="stylesheet">
    <script src="ParticleJS/app.js"></script>
    <script src="ParticleJS/particles.js"></script>
</head>
<body>
<div class="navbar">
    <div id="navbarButtons">
        <a href="front.php">Forums</a>
        <a href="Play.php">Avalon</a>
        <a href="patchnotes.php">Updates</a>
    </div>
    <a href="Settings.php" id="settingsIcon"><img src="Resources/user.png" id="userIcon"></a>
</div>
<div class="wrapper">
    <div class="lezenvakje">
<?php
require_once "db.php";
//require_once "Navbar.php";

// Maak een instantie van de DatabaseConnect-klasse
$db = new DatabaseConnect("localhost", "root", "", "avalon");

// Haal het nieuwsitem op basis van de titel
$newsItemTitel = $_GET["titel"];
$stmt = $db->dbConnect->prepare("SELECT * FROM patchnews WHERE titel = :titel");
$stmt->bindParam(":titel", $newsItemTitel);
$stmt->execute();

// Controleer of het nieuwsitem bestaat en toon de inhoud
if ($row = $stmt->fetch()) {
    echo "<h2 class='news-item-title red'>" . $row["titel"] . "</h2>";
    echo "<p class='news-item-content'>" . $row["content"] . "</p>";
    echo "<p class='news-item-meta'>Naam: " . $row["username"] . "</p>";
    echo "<p class='news-item-meta'>Datum: " . $row["date"] . "</p>";
} else {
    echo "Nieuwsitem niet gevonden.";
}
?>
    </div>
    </div>
<video autoplay muted loop id="BGVideo">
    <source src="Resources/WebBG.mp4" type="video/mp4"
</video>
</body>
</html>