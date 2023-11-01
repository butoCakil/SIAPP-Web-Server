<?php
include('app/get_user.php');
$tanggal = date('Y-m-d');
$tanggal_dmY = date('d-m-Y');
$tahun = date('Y');

$title = 'Presensi Event/Pembiasaan';
$navlink = 'Wali';
$navlink_sub = 'semuakelas';

include "views/header.php";
?>

<section class="content">
    <div class="container-fluid">
        <div class="card elevation-3 bg-primary bg-gradient-primary border-0" style="z-index: 1;">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>&nbsp;
                    Rekap Presensi Pembiasaan & Kegiatan
                </h3>
                <div class="card-tools">
                    <i class="fas fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Menampilkan Catatan Presensi Semua siswa dan dapat memilih perkelas serta perjurusan"></i>
                    &nbsp;
                </div>
            </div>
        </div>

        <div class="col-12" style="margin-top: -20px;">
            <div class="card elevation-3">
                <div class="card-body mb-5">
                    <!-- Pilih Event -->
                    <div class="w-50 mb-2">
                        <select name="pilihEvent" id="pilihEVent" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option value="">Pembiasaan Pagi</option>
                            <option value="">Sholat Berjamaan</option>
                            <option value="">Event Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <h4>Rekap Presensi Kegiatan</h4>
                    </div>

                    <!-- dataTables -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>No.</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Keterangan</th>
                                <th>Waktu</th>
                                <th>Info</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>

<?php
include "views/footer.php";
