<?php require_once "Navbar.php" ?>
<h1>GAME NEWS</h1>
<?php
require_once "db.php";
class DatabaseFrontend
{
    private $db;
    public function __construct()
    {
        // Maak een instantie van de DatabaseConnect-klasse
        $this->db = new DatabaseConnect("localhost", "root", "", "avalon");
    }

// Maak een instantie van de DatabaseFrontend-klasse en toon de patchnews
    public function displayPatchnotes()
    {
        // Voorbereiden en uitvoeren van de databasequery
        $stmt = $this->db->dbConnect->prepare("SELECT * FROM patchnews");
        $stmt->execute();

        // Weergave van nieuwsitems in een tabel met dropdown
        echo "<div class='wrapper'>";
        echo "<table class='update-table'>";
        echo "<thead><tr class='row header blue'><th>Image</th><th>Item</th><th>Datum</th><th>version</th></tr></thead>";
        echo "<tbody>";
        while ($row = $stmt->fetch()) {
            echo "<tr class='row'>";
            echo "<td class='patchnotes-img'>HIER MOET EEN IMAGE KOMEN</td>";
            echo "<td class='patchnotes-title'><a class='patchnotes-titel' href='patchnotesitem.php?titel=" . $row["titel"] . "'>" . $row["titel"] . "</a></td>";
            echo "<td class='patchnotes-date'>" . $row["date"] . "</td>";
            echo "<td class='patchnotes-version'>" . $row["type"] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    }
}
// Maak een instantie van de DatabaseFrontend-klasse en toon het nieuws
$frontend = new DatabaseFrontend();
$frontend->displayPatchnotes();

?>
<video autoplay muted loop id="BGVideo">
    <source src="Resources/WebBG.mp4" type="video/mp4"
</video>
</body>
</html>

