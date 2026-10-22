CREATE TABLE rt (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nomor_rt VARCHAR(2) NOT NULL,
    rw VARCHAR(3) DEFAULT '009'
);

-- Masukkan data RT 01 s.d. 15
INSERT INTO rt (nomor_rt, rw) VALUES 
('01', '009'), ('02', '009'), ('03', '009'), ('04', '009'), ('05', '009'),
('06', '009'), ('07', '009'), ('08', '009'), ('09', '009'), ('10', '009'),
('11', '009'), ('12', '009'), ('13', '009'), ('14', '009'), ('15', '009');

-- Tabel Kartu Keluarga
CREATE TABLE kartu_keluarga (
    nomor_kk VARCHAR(16) PRIMARY KEY,
    kepala_keluarga VARCHAR(100) NOT NULL,
    rt_id INT,
    alamat TEXT,
    FOREIGN KEY (rt_id) REFERENCES rt(id) ON DELETE CASCADE
);

-- Tabel Warga
CREATE TABLE warga (
    nik VARCHAR(16) PRIMARY KEY,
    nomor_kk VARCHAR(16),
    nama_lengkap VARCHAR(100) NOT NULL,
    jenis_kelamin ENUM('L', 'P') NOT NULL,
    status_dalam_keluarga VARCHAR(30),
    FOREIGN KEY (nomor_kk) REFERENCES kartu_keluarga(nomor_kk) ON DELETE CASCADE
);