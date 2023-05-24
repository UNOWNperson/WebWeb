<?php
require_once 'Navbar.php';
//In dit bestand wordt de database connectie aangelegt.
//Deze wordt natuurlijk, in een ander bestand aangemaakt
class DatabaseConnect
{
    public $dbConnect; //Met deze variable kan code buiten de connectie gebruiken
    public string $IP;
    public string $username;
    public string $password;
    public string $DBName;

    public function __construct($IP, $username, $password, $DBName)
    {
        $this->IP = $IP;
        $this->username = $username;
        $this->password = $password;
        $this->DBName = $DBName;
        $this->dbConnect = new PDO("mysql:host=" . $this->IP . ";dbname=" . $this->DBName, $this->username, $this->password);
    } //Maak de actual connection link
}
$db = new DatabaseConnect("localhost", "root", "", "avalon");

$stmt = $db->dbConnect->prepare("SELECT * FROM patchnotes");
$news = $db->dbConnect->prepare("SELECT * FROM news");

$stmt->execute();
$news->execute();


$resultq = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($resultq as $data){
 //echo "-------------------------------";
 //echo "<br>";
 echo " titel: ". $data["titel"];
 echo "<br>";
 echo " content: ". $data["content"];
 echo "<br>";
 echo " date: ". $data["date"];
 echo "<br>";
 echo " version: ". $data["version"];
 echo "<br>";
 echo "-------------UPDATE-----------------------------------------------------------------------------------------------------------------------------------------------------------------";
 echo "<br>";
}

$resultn = $news->fetchAll(PDO::FETCH_ASSOC);

foreach($resultn as $daten){
 echo " titel: ". $daten["titel"];
 echo "<br>";
 echo " content: ". $daten["content"];
 echo "<br>";
 echo " date: ". $daten["date"];
 echo "<br>";
 echo "--------------NEWS------------------------------------------------------------------------------------------------------------------------------------------------------------------";
 echo "<br>";
}
  /*  while($row = $stmt->fetch()) {
echo "titel: " . $row["titel"]. "<br>". " - content: " . $row["content"]. "<br>". " - date: " . $row["date"]. "<br>". " - version: " . $row["version"]. "<br>";
    } */
?>
