# SCOPE - Lab SQLi XSS

Target: localhost:8000/MywebTest
URL Test: 
- /produk.php?id=1 (SQLi)
- /cari.php?q=test (XSS)
- /admin/ (Dirb/Nikto)

Tools: SQLMap, Nikto, Dirb

Rules: Hanya test di lab lokal, tidak merusak sistem.

Bukti Mitigasi:
- produk.php = injectable (BO)
- produk2.php = not injectable (FIXED pake prepared statement)
