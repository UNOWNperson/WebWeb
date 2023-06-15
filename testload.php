<?php
require_once "db.php";
$db = new databaseConnect("localhost", "root", "", "avalon");
//pic();

// function pic($id, $imag){
// if (isset($imag)) {
//     $file = $imag;

//     // Check if there was no upload error
//     if ($file["error"] === UPLOAD_ERR_OK) {
//         $fileName = $file["name"];
//         $tempPath = $file["tmp_name"];

//         // Move the temporary file to a desired location
//         $destination = "Resources/" . $fileName;

//         // Retrieve the existing entry from the database
//         //$id = $_POST["id"];
//         $stmt = $db->dbConnect->prepare("SELECT * FROM patchnews WHERE id = :id");
//         $stmt->execute([
//             "id" => $id
//         ]);
//         $existingEntry = $stmt->fetch(PDO::FETCH_ASSOC);

//         if ($existingEntry) {
//             // Delete the old picture file (optional, if needed)
//             $oldPicPath = $existingEntry["imag"];
//             if (file_exists($oldPicPath)) {
//                 unlink($oldPicPath);
//             }

//             // Move the uploaded file to the destination
//             if (move_uploaded_file($tempPath, $destination)) {
//                 // Update the database entry with the new picture path
//                 $updateStmt = $db->dbConnect->prepare("UPDATE patchnews SET imag = :imag WHERE id = :id");
//                 $updateStmt->execute([
//                     "imag" => $destination,
//                     "id" => $id
//                 ]);

//                 echo "File uploaded successfully and database entry updated.";
//             } else {
//                 echo "Error moving the uploaded file.";
//             }
//         } else {
//             echo "Entry not found in the database.";
//         }
//     } else {
//         echo "File upload failed with error code: " . $file["error"];
//     }
    
//  }
// }

header('Location: patchnews.php');