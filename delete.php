<?php
// Database connection settings (same as in the previous example)
require_once "db.php";
global $db;
// Retrieve the ID of the record to be deleted
$id = $_POST['id'];

// Delete the record from the database

$stmt = $db->dbConnect->prepare('DELETE FROM patchnews WHERE id=:id');
$stmt -> execute([
  'id'=>$id
]);

// Redirect user to the page displaying data after deletion
header('Location: patchnews.php');
exit();
?>
