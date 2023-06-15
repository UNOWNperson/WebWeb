<?php require_once "Navbar.php" ?>
<h1>GAME NEWS</h1>
<a href="display.php" class="create-button">Edit</a>
<a href="upForm.php"  class="create-button">Create</a>
<?php
require_once "db.php";
require_once "formchecker.php";
require_once "PatchNewsClass.php";
global $db;

        // Voorbereiden en uitvoeren van de databasequery
        $stmt = $db->dbConnect->prepare("SELECT * FROM patchnews");
        $stmt->execute();
        
        // Weergave van nieuwsitems in een tabel met dropdown
        echo "<div class='wrapper'>";
        echo "<table class='update-table'>";
        echo "<thead><tr class='row header blue'><th>Image</th><th>Item</th><th>Datum</th><th>version</th><th>Delete?</th></tr></thead>";
        echo "<tbody>";
        foreach($stmt->fetchAll() as $entry){
            $information=new PatchNewsClass(
            $entry['titel'], 
            $entry['content'],
            $entry['entrytype'],
            $entry['datetime'],
            $entry['id']

            );
            $information->PatchNewsDisplay($db);            
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        
// Maak een instantie van de DatabaseFrontend-klasse en toon het nieuws             <img src="Resources/Plus2.png" id="plus">


?>
<video autoplay muted loop id="BGVideo">
    <source src="Resources/WebBG.mp4" type="video/mp4"
</video>
</body>
</html>

