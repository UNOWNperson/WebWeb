<?php
require_once "db.php";
global $db;

class PatchNewsClass
{
    private int $id;
    public string $title;
    public string $content;
    public string $type;
    public $dateTime;
    public $patchNewsImage;

    public function __construct($titleIN, $contentIN, $typeIN, $dateTimeIN, $idIN)
    {
        $this->title = $titleIN;
        $this->content = $contentIN;
        $this->type = $typeIN;
        $this->dateTime = $dateTimeIN;
        if($idIN == NULL)
        {
            $this->id = 0;
        }
        else
        {
            $this->id = $idIN;
        }
    }

    public function PatchNewsCreate($db)
    {
        // Insert data into the database
        $stmt = $db->dbConnect->prepare('INSERT INTO patchnews (titel, content, datetime, entrytype) VALUES 
                                       (:title, :content, :datetime, :type)');
        $stmt->execute([
            "title" => $this->title,
            "content" => $this->content,
            "datetime" => $this->dateTime,
            "type" => $this->type
        ]);
    }

    public function PatchNewsUpdate($db)
    {
        $stmt = $db->dbConnect->prepare('UPDATE patchnews SET titel=:newTitel, content=:newContent, datetime=:newDate, entrytype=:newType WHERE id=:id');
        $stmt->execute([
            "newTitel" => $this->title,
            "newContent" => $this->content,
            "newDate" => $this->dateTime,
            "newType" => $this->type,
            "id" => $this->id
        ]);
    }

    public function PatchNewsDelete($db)
    {
        $stmt = $db->dbConnect->prepare('DELETE FROM patchnews WHERE id =:id');
        $stmt->execute([
            "id" => $this->id
        ]);
    }

    public function PatchNewsDisplay($db)
    {
        echo "<tr class='row'<a class='patchnotes-titel' href='patchnewsitem.php?id=" . $this->id . "'></a>";
        
        
        if($this->type=='Update'){
        echo "<td class='patchnotes-img'> <img class='patchnote-img' src='Resources/world3.png' alt='Uploaded Image'></td>";   
    }
    else{
        echo "<td class='patchnotes-img'> <img class='patchnote-img' src='Resources/world2.png' alt='Uploaded Image'></td>";
    }
        echo "<td class='patchnotes-title'><a class='patchnotes-titel' href='patchnewsitem.php?id=" . $this->id . "'>" . $this->title . "</a></td>";
        echo "<td class='patchnotes-date'>" . $this->dateTime . "</td>";
        echo "<td class='patchnotes-version'>" .$this->type . "</td>";
        echo "<td class='delete'>
        <form method='post' action='patchnews.php'>
        <input type='hidden' name='id' value='" . $this->id . "'>
        <input type ='hidden' name='deletepn'>
        <input type='submit' value='Delete'>
        </form>
        <hr>
        </td>";
        echo "</tr>";
        
    }
}