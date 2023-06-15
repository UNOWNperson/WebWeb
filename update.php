<?php
require_once "testload.php";
require_once "db.php";
global $db;
// Retrieve data from the database

// Retrieve the ID and new message from the form submission
$id = $_POST['id'];
$newTitel = $_POST['new_titel'];
$newContent = $_POST['new_content'];
$newDate = $_POST['new_date'];
$newType = $_POST['new_type'];
$newImag = $_POST['new_imag'];
//$_FILES
// Update the record in the database
$stmt=$db->dbConnect->prepare('UPDATE patchnews SET titel=:newTitel, content=:newContent, date=:newDate, type=:newType WHERE id=:id');
$stmt->execute([ //$newTitel, $newContent, $newDate, $newType, $ne $id 
  "newTitel" => $newTitel,
  "newContent" => $newContent,
  "newDate" => $newDate,
  "newType" => $newType,
  "id" => $id 
]) ;

pic($id, $newImag);

function pic($id, $imag){
    if (isset($imag)) {
        $file = $imag;
    
        // Check if there was no upload error
        if ($file["error"] === UPLOAD_ERR_OK) {
            $fileName = $file["name"];
            $tempPath = $file["tmp_name"];
    
            // Move the temporary file to a desired location
            $destination = "Resources/" . $fileName;
    
            // Retrieve the existing entry from the database
            //$id = $_POST["id"];
            $stmt = $db->dbConnect->prepare("SELECT * FROM patchnews WHERE id = :id");
            $stmt->execute([
                "id" => $id
            ]);
            $existingEntry = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($existingEntry) {
                // Delete the old picture file (optional, if needed)
                $oldPicPath = $existingEntry["imag"];
                if (file_exists($oldPicPath)) {
                    unlink($oldPicPath);
                }
    
                // Move the uploaded file to the destination
                if (move_uploaded_file($tempPath, $destination)) {
                    // Update the database entry with the new picture path
                    $updateStmt = $db->dbConnect->prepare("UPDATE patchnews SET imag = :imag WHERE id = :id");
                    $updateStmt->execute([
                        "imag" => $destination,
                        "id" => $id
                    ]);
    
                    echo "File uploaded successfully and database entry updated.";
                } else {
                    echo "Error moving the uploaded file.";
                }
            } else {
                echo "Entry not found in the database.";
            }
        } else {
            echo "File upload failed with error code: " . $file["error"];
        }
        
     }
    }
    

header('Location: display.php'); //$newTitel, $newContent, $newDate, $newType, $newImag, $id
//Redirect user