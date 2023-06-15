<?php require_once "Navbar.php" ?>
<h1>Changes</h1>
<?php
require_once "db.php";
global $db;

//pak eerst de post om te zien welk id we moeten hebben, dan select
$stmt = $db->dbConnect->prepare('SELECT * FROM patchnews '); //WHERE id =:id
$stmt -> execute();//([
 // "id" => $_POST["id"]
//]);
$data = $stmt->fetchAll();

// Display data and delete button for each record
foreach ($data as $row) {
  echo '<p>titel: ' . $row['titel'] . '</p>';
  echo '<p>content: ' . $row['content'] . '</p>';
  echo '<p>date: ' . $row['datetime'] . '</p>';
  echo '<p>type: ' . $row['entrytype'] . '</p>';
  echo '<p>imag:'  . $row['imag'] . '</p>';
  echo '<form method="post" action="patchnews.php" >';

  echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
  echo '<label for="newtitel">newTitel:</label>';
  echo '<input type="text" id="newtitel" name="newtitel" required>';
   
  echo '<label for="newmessage">newContent:</label>';
  echo '<input type="text" id="newcontent" name="newcontent" required>';
   
  echo '<label for="newdate">newDate:</label>';
  echo '<input type="date" id="newdate" name="newdate" required>';

  echo '<label for="newtype">newType:</label>';
  echo '<input id="newtype" type="radio" name="newtype" value="Update">Update';
  echo '<input id="newtype" type="radio" name="newtype" value="News">News</label>';

     
  //echo '<label for="newimag">newImage:</label>';
  //echo '<input type="file" id="newimag" name="newimag" required>';

  echo '<input type="hidden" name="updatepn">';

  echo '<input type="submit" value="Update">';
  echo '</form>';
  echo '<hr>';
}
?>
