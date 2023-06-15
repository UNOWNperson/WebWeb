<?php
require_once 'Navbar.php';
require_once 'db copy.php';

$patchnotes = $db->displayData();
$news = $db->displayData();

foreach ($patchnotes as $info1) {
?>
<tr>
<td><?php echo $info1['titel'] ?></td>
<td><?php echo $info1['content'] ?></td>
<td><?php echo $info1['date'] ?></td>
<td><?php echo $info1['version'] ?></td>
</tr>
<?php } 


?>
