<?php
require_once "AccountClass.php";
require_once "PatchNewsClass.php";
require_once "db.php";

global $db;
//We checken of een bepaalde variabele is set
//Deze gecheckte variabelen is een type=hidden bij iedere form
if(isset($_POST["register"]))
{
    $Account = new Account($_POST["registerUsername"], $_POST["registerPassword"], $_POST["registerEmail"]);
    $Account->Register($db); //Make the email "optional" in the construct
}

if(isset($_POST["login"]))
{
    $Account = new Account(null, $_POST["loginPassword"], $_POST["loginEmail"]);
    $Account->Login($db);
}

if(isset($_POST["update"]))
{
    $Account = new Account($_POST["changeUsername"], $_POST["changePasswordCurrent"], $_POST["changeEmail"]);
    if(isset($_POST["changePasswordNew"]))
    {
        $Account->Update($db, $_POST["changePasswordNew"]);
    }
    else
    {
        $Account->Update($db, null);
    }

    if(isset($_FILES["changePicture"]))
    {
        $Account->UploadPicture($db, $_FILES["changePicture"]);
    }
}

if(isset($_POST["delete"]))
{
    $Account = new Account($_SESSION["username"], $_POST["deletePasswordCurrent"], $_SESSION["email"]);
    $Account->Delete($db);
}

if(isset($_POST["deletepn"]))
{
    $patchnews = new PatchNewsClass("", "", 0, "", $_POST["id"]);
    $patchnews -> PatchNewsDelete($db);
}

if(isset($_POST["createpn"]))
{
    
    //($titleIN, $contentIN, $typeIN, $dateTimeIN, $idIN)
    $patchnews = new PatchNewsClass($_POST["titel"], $_POST["content"], $_POST["type"], $_POST["date"], NULL);
    $patchnews -> PatchNewsCreate($db);
}


if(isset($_POST["updatepn"]))
{
    
    //($titleIN, $contentIN, $typeIN, $dateTimeIN, $idIN)
    $patchnews = new PatchNewsClass($_POST["newtitel"], $_POST["newcontent"], $_POST["newtype"], $_POST["newdate"], $_POST["id"]);
    $patchnews -> PatchNewsUpdate($db);
}