<?php
$db = new SQLite3('test.db');
$id = $_GET['id'];
$result = $db->query("SELECT * FROM produk WHERE id = $id");
while($row = $result->fetchArray()){
  echo $row['nama']."<br>";
}
?>

// this on purpose
