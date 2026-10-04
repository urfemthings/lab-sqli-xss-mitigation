# Lab SQLi & XSS Mitigation - Tanya
Link: https://github.com/urfemthings/lab-sqli-xss-mitigation

## SCOPE PENTEST
Target: http://localhost:8000/MywebTest (Lab Lokal)
Test: /produk.php?id=1 (SQLi), /cari.php?q= (XSS)
Tools: SQLMap, Nikto, Dirb
Rules: Hanya localhost, dilarang DDoS/rusak DB

## 1. HASIL SQLMAP

### produk.php VULNERABLE
Type: boolean-based blind, error-based, UNION query
Parameter id (GET) injectable - Bisa dump Kopi, Susu

### produk2.php AMAN (FIXED)
GET parameter 'id' does not seem to be injectable
all tested parameters do not appear to be injectable

Fix pake:
$db->prepare("SELECT * FROM produk WHERE id = :id")
->bindValue(':id', $_GET['id'], SQLITE3_INTEGER)

### Bukti File
- sqlmap-vuln.txt = BOLONG
- sqlmap-aman.txt = not injectable (BUKTI FIX BERHASIL)

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
