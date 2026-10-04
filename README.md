# Lab SQLi & XSS Mitigation

## Link GitHub
https://github.com/urfemthings/lab-sqli-xss-mitigation

## Struktur File
- produk.php (VULNERABLE)
- produk2.php (SECURE - FIXED)
- cari.php / cari2.php (XSS demo)
- dll

## 1. HASIL SQLMAP

### produk.php = VULNERABLE
boolean-based blind, error-based, time-based blind, UNION query
Parameter: id (GET) is injectable
Bisa dump isi Kopi, Susu, dll


### produk2.php = AMAN (MITIGASI BERHASIL)

Fix pake:
$db->prepare("SELECT * FROM produk WHERE id = :id")
->bindValue(':id', $_GET['id'], SQLITE3_INTEGER)

### Bukti
File: sqlmap-vuln.txt = BOLONG
File: sqlmap-aman.txt = not injectable

## 2. HASIL NIKTO & DIRB
File: nikto-result.txt
File: dirb-result.txt
- Ditemukan /produk.php?id=, /admin/, dll
- Server Apache/PHP info exposed (sudah di-hardening)

## 3. MITIGASI XSS
- cari.php vulnerable: echo $_GET['q'] langsung
- cari2.php aman: htmlspecialchars($_GET['q'], ENT_QUOTES)

## Kesimpulan
Mitigasi SQLi pake Prepared Statement BERHASIL dibuktikan dengan SQLMap not injectable.
Mitigasi XSS pake htmlspecialchars BERHASIL.
