<?php
require_once 'Navbar.php';
require_once 'db.php';


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
