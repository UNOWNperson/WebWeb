<?php require_once "Navbar.php" ?>
<h1>Create</h1>
<!DOCTYPE html>
<html>
<head>
  <title>What</title>
</head>
<body>
  <form method="post" action="patchnews.php">
    <label for="titel">titel:</label>
    <input type="text" id="titel" name="titel" required><br><br>

    <label for="content">content:</label>
    <textarea id="content" name="content" required></textarea><br><br>

    <label for="date">date:</label>
    <input type="date" id="date" name="date" required><br><br>

    <label for="type">type:
    <input id="type" type="radio" name="type" value="update">Update
    <input id="type" type="radio" name="type" value="news">News</label>

    <input type="hidden" name="createpn">
    <br><br>

    <input type="submit" value="Submit">
  </form>
</body>
</html>