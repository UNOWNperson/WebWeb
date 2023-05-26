<?php require_once "Navbar.php" ?>
<div class="wrapper">
    <div class="lezenvakje">
        <?php
        require_once "db.php";

        // Maak een instantie van de DatabaseConnect-klasse
        $db = new DatabaseConnect("localhost", "root", "", "avalon");
        // Haal het patchnotes op basis van de titel

        $patchnewsItemTitel = $_GET["titel"];
        $stmt = $db->dbConnect->prepare("SELECT * FROM patchnews WHERE titel = :titel");
        $stmt->bindParam(":titel", $patchnewsItemTitel);
        $stmt->execute();

        // Controleer of het nieuwsitem bestaat en toon de inhoud
        if ($row = $stmt->fetch()) {
            echo "<h2 class='news-item-title blue'>" . $row["titel"] . "</h2>";
            echo "<p class='news-item-content'>" . $row["content"] . "</p>";
            echo "<p class='news-item-version'>Version: " . $row["version"] . "</p>";
            echo "<p class='news-item-meta'>Datum: " . $row["date"] . "</p>";
        } else {
            echo "An error occurred.";
        }
        ?>
    </div>
</div>
<video autoplay muted loop id="BGVideo">
    <source src="Resources/WebBG.mp4" type="video/mp4"
</video>
</body>
</html>