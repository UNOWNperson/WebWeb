<?php

require_once "Navbar.php";

   ?>

<body>

<div class="wrapper">

    <div class="lezenvakje">

        <?php

        require_once "db.php";

        require_once "update_ratio.php";

        global $db;



        // Haal het nieuwsitem op basis van de titel

        if (isset($_GET["id"])) {

            $stmt = $db->dbConnect->prepare("SELECT * FROM patchnews WHERE id = :id");

            $stmt->execute([
                "id"=>$_GET["id"]
            ]);



            // Controleer of het nieuwsitem bestaat en toon de inhoud

            $row = $stmt->fetch();

                echo "<div class='info-div'>";

                echo "<p class='forum-item'>Datum: " . $row["datetime"] . "</p>";

                //echo "<p class='forum-item'>Naam: " . $row["username"] . "</p>";

                // Haal bijgewerkte ratio op

                

                echo "</div>";

                echo "</div>";

                echo "<h2 class='news-item-title red'>" . $row["titel"] . "</h2>";

                echo "<p class='news-item-content'>" . $row["content"] . "</p>";

            } else {

                echo "Nieuwsitem niet gevonden.";

            }




        ?>

    </div>

</div>

<video autoplay muted loop id="BGVideo">

    <source src="Resources/WebBG.mp4" type="video/mp4">

</video>

</body>

</html>