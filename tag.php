<?php
if (@$_GET['nokartu']) {
    $nokartu = $_GET['nokartu'];
    // Hapus karakter selain huruf dan angka
    $nokartu = preg_replace("/[^a-zA-Z0-9]/", "", $nokartu);

    // Periksa jika ada karakter yang dihapus
    if ($_GET['nokartu'] !== $nokartu) {
        echo "Input mengandung karakter yang tidak valid.";
        die;
    } else {
        include "config/konesi.php";

        // Hapus semua data dari tabel 'tmprfid'
        $sql_del = mysqli_query($konek, "DELETE FROM tmprfid");

        if ($sql_del) {
            // Inisialisasi koneksi database
            $konek = mysqli_connect("localhost", "root", "", "siap");

            if (!$konek) {
                die("Koneksi database gagal: " . mysqli_connect_error());
            }

            $nokartu_clean = mysqli_real_escape_string($konek, $nokartu);

            // Prepare the INSERT statement to insert data into the 'tmprfid' table
            $query_insert_tmprfid = "INSERT INTO tmprfid (nokartu, nokartu_admin) VALUES (?, ?)";
            $stmt_insert_tmprfid = mysqli_stmt_init($konek);
            mysqli_stmt_prepare($stmt_insert_tmprfid, $query_insert_tmprfid);
            mysqli_stmt_bind_param($stmt_insert_tmprfid, "ss", $nokartu_clean, $nokartu_clean);
            $sql_tag = mysqli_stmt_execute($stmt_insert_tmprfid);

            // Tutup prepared statement
            mysqli_stmt_close($stmt_insert_tmprfid);

            // Tutup koneksi database
            mysqli_close($konek);

            if ($sql_tag) {
                // echo "Berhasil Masukkan kartu ke tag.php<br>";
            } else {
                echo "Gagal Masukkan kartu ke tag";
            }
        }

        mysqli_close($konek);

    }
} else {
    echo "Permintaan tidak lengkap";
}
