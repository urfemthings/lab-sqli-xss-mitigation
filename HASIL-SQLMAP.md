# Hasil SQLMap

## 1. produk.php VULNERABLE

## 2. produk2.php AMAN (FIXED)
-> INI BUKTI FIX NYA BERHASIL, pake prepare + bindValue

## Kesimpulan
Vulnerable code:
$db->query("SELECT * FROM produk WHERE id = ".$_GET['id']);

Secure code:
$stmt = $db->prepare("SELECT * FROM produk WHERE id = :id");
$stmt->bindValue(':id', $_GET['id'], SQLITE3_INTEGER);
