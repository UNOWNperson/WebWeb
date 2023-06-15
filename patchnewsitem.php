<?php require_once "Navbar.php" ?>
<div class="wrapper">
    <div class="lezenvakje">
    <?php
        require_once "db.php";
        $stmt = $db->dbConnect->prepare("SELECT * FROM patchnews WHERE id = :id");
        $stmt->execute([
            "id" => $_GET["id"]
        ]);

        $data = $stmt->fetch(); // Fetch a single row

        if ($data) {
            echo "<h2 class='news-item-title blue'>" . $data["titel"] . "</h2>";
            echo "<p class='news-item-content'>" . $data["content"] . "</p>";
            echo "<p class='news-item-type'>type: " . $data["entrytype"] . "</p>";
            echo "<p class='news-item-meta'>Datum: " . $data["datetime"] . "</p>";
        } else {
            echo "No data found for the given ID";
        }
        ?>
    </div>
</div>
<video autoplay muted loop id="BGVideo">
    <source src="Resources/WebBG.mp4" type="video/mp4"
</video>
</body>
</html>