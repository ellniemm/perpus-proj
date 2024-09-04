<?php

// Ganti 'your-password' dengan password yang ingin Anda hash
$password = 'admin';

// Meng-hash password menggunakan Bcrypt
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Menampilkan hash yang dihasilkan
echo "Hashed Password: " . $hashedPassword;
