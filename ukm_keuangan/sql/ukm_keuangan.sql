
CREATE DATABASE IF NOT EXISTS ukm_keuangan;
USE ukm_keuangan;

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','pemilik') DEFAULT 'pemilik'
);

CREATE TABLE transaksi (
    transaksi_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    jenis ENUM('pemasukan', 'pengeluaran'),
    tanggal DATE,
    deskripsi TEXT,
    jumlah DECIMAL(12,2),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE tagihan (
    tagihan_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    nama_pelanggan VARCHAR(100),
    deskripsi TEXT,
    jumlah DECIMAL(12,2),
    status ENUM('belum', 'lunas'),
    tanggal_jatuh_tempo DATE,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE piutang (
    piutang_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    nama_supplier VARCHAR(100),
    deskripsi TEXT,
    jumlah DECIMAL(12,2),
    status ENUM('belum', 'lunas'),
    tanggal_jatuh_tempo DATE,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);
