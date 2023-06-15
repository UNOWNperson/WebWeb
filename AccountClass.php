<?php


class Account{
    public string $username;
    private string $email;
    private string $password;

    public function __construct($usernameIN, $passwordIN, $emailIN = null){
        if($usernameIN != null)
        {
            $this->username = $usernameIN;
        }
        $this->password = $passwordIN;
        $this->email = $emailIN;
    }

    public function Login($db){
        $stmt = $db->dbConnect->prepare("SELECT * FROM account WHERE email = :email");
        $stmt->execute([
            "email" => $this->email
        ]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $entry) //this should only return one entry since the email is unique
        {
            $hash = $entry["password"];
            if(password_verify("$this->password", "$hash"))
            {
                $_SESSION["login"] = "true";
                $_SESSION["username"] = $entry["username"];
                $_SESSION["email"] = $entry["email"];
                $_SESSION["id"] = $entry["id"];
                if($entry["picture"] != null)
                {
                    $_SESSION["picture"] = $entry["picture"];
                }
                else
                {
                    unset($_SESSION["picture"]);
                }
                header("Location: ".$_SERVER['HTTP_REFERER']);
            }
            else
            {
                //do something when wrong password
            }
        }
    }

    public function Register($db){
        $emailCheck = $this->CheckForDuplicate($db, "email");
        if(!$emailCheck)
        {
            $pw_hash = password_hash($this->password, PASSWORD_DEFAULT);
            $stmt = $db->dbConnect->prepare("INSERT INTO account (username, password, email) VALUES (:username, :password, :email)");
            $stmt->execute([
                "username" => $this->username,
                "email" => $this->email,
                "password" => $pw_hash
            ]);
        }
        else
        {
            $_SESSION['error_message'] = "em";
            header("Location: Play.php?error=duplicate_email");
            exit;
        }
    }

    public function Update($db, $newPW)
    {
        $passChecker = $this->CheckForDuplicate($db, "password");
        if($this->email != $_SESSION["email"])
        {
            $emailChecker = $this->CheckForDuplicate($db, "email");
        }
        else
        {
            $emailChecker = false;
        }

        if($passChecker && !$emailChecker)
        {
            $stmt = $db->dbConnect->prepare("
                UPDATE account SET 
                username=:username, 
                password=:password, 
                email=:email
                WHERE id =:id
            ");

            if($newPW != null)
            {
                $pw_hash = password_hash($newPW, PASSWORD_DEFAULT);
                $stmt->execute([
                    "username" => $this->username,
                    "password" => $pw_hash,
                    "email" => $this->email,
                    "id" => $_SESSION["id"]
                ]);
            }
            else
            {
                $pw_hash = password_hash($this->password, PASSWORD_DEFAULT);
                $stmt->execute([
                    "username" => $this->username,
                    "password" => $pw_hash,
                    "email" => $this->email,
                    "id" => $_SESSION["id"]
                ]);
            }
            $_SESSION["username"] = $this->username;
            $_SESSION["email"] = $this->email;
        }
        else
        {
            if(!$passChecker)//password mismatch
            {
                $_SESSION['error_message'] = "pw";
                header("Location: userSettings.php?error=invalid_password");
                exit;
            }
            else if($emailChecker) //duplicate email
            {
                $_SESSION['error_message'] = "em";
                header("Location: userSettings.php?error=duplicate_email");
                exit;
            }
            else
            {
                $_SESSION['error_message'] = "other";
                header("Location: userSettings.php?error=other");
                exit;
            }
        }
    }

    public function Delete($db)
    {
        $getInformation = $db->dbConnect->prepare("SELECT * FROM account WHERE email=:email");
        $getInformation->execute([
            "email" => $this->email
        ]);

        $dbInfo = $getInformation->fetch(PDO::FETCH_ASSOC);

        if(password_verify($this->password, $dbInfo["password"]))
        {
            $deleteStmt = $db->dbConnect->prepare("DELETE FROM account WHERE email=:email");
            $deleteStmt->execute(["email" => $this->email]);
            session_unset();
        }
        else
        {
            $_SESSION['error_message'] = "pw";
            header("Location: userSettings.php?error=invalid_password");
        }
    }

    function UploadPicture($db, $img)
    {
        // Check if there was no upload error
        if ($img["error"] === UPLOAD_ERR_OK) {
            $fileName = $img["name"];
            $tempPath = $img["tmp_name"];

            // Move the temporary file to a desired location
            $destination = "Resources/UserImages/" . $fileName;


            $stmt = $db->dbConnect->prepare("SELECT * FROM account WHERE id = :id");
            $stmt->execute([
                "id" => $_SESSION["id"]
            ]); //find person

            $existingEntry = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($existingEntry) {
                // Delete the old picture file (optional, if needed)
                $oldPicPath = $existingEntry["picture"];
                if (file_exists($oldPicPath)) {
                    unlink($oldPicPath);
                }

                // Move the uploaded file to the destination
                if (move_uploaded_file($tempPath, $destination)) {
                    // Update the database entry with the new picture path
                    $updateStmt = $db->dbConnect->prepare("UPDATE account SET picture = :picture WHERE id = :id");
                    $updateStmt->execute([
                        "picture" => $destination,
                        "id" => $_SESSION["id"]
                    ]);

                    //when everything's done, we refresh the session variable
                    $sessionStmt = $db->dbConnect->prepare("SELECT picture FROM account WHERE id = :id");
                    $sessionStmt->execute([
                        "id" => $_SESSION["id"]
                    ]);
                    $_SESSION["picture"] = $sessionStmt->fetchColumn();
                }
            }
        }
    }

    function CheckForDuplicate($db, $checktype)
    {
        if($checktype == "email")
        {
            $stmt = $db->dbConnect->prepare("SELECT * FROM account WHERE email = :email");
            $stmt->execute([
                "email" => $this->email
            ]);

            $result = $stmt->fetch();

            if ($result) {
                // Duplicate email found
                return true;
            }

            // No duplicate email found
            return false;
        }
        else if($checktype == "password")
        {
            $pwChecker = $db->dbConnect->prepare("SELECT password FROM account WHERE id = :id");
            $pwChecker->execute([
                "id" => $_SESSION["id"]
            ]);
            $existingPw = $pwChecker->fetchColumn();
            return password_verify($this->password, $existingPw);
        }
    }
}