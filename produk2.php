<?php
$db = new SQLite3('test.db');
$stmt = $db->prepare("SELECT * FROM produk WHERE id = :id");
$stmt->bindValue(':id', $_GET['id'], SQLITE3_INTEGER);
$result = $stmt->execute();
while($row = $result->fetchArray()){
  echo $row['nama']."<br>";
}
?>
