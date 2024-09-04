<?php

// Ganti 'your-password' dengan password yang ingin Anda hash
$password = 'siswa';

// Meng-hash password menggunakan Bcrypt
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Menampilkan hash yang dihasilkan
echo "Hashed Password: " . $hashedPassword;
