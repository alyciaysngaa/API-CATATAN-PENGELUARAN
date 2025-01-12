<?php 
    require '../function/functions.php';
    
    if (isset($_GET['filterSend'])) {
        $tgl = $_GET['filterSend'];
        $username = $_GET['username'];
    }
    global $tgl;
    $pengeluaran = query("SELECT * FROM pengeluaran WHERE tanggal LIKE '%$tgl%' AND username = '$username'");
?>


<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-sm table-hover table-striped table-bordered">
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Keterangan Pengeluaran</th>
                <th>Keperluan Pengeluaran</th>
                <th>Jumlah Pengeluaran</th>
                <th>Aksi</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach ($pengeluaran as $row) : ?>
            <tr class="show" id="<?= $row["id"]; ?>">
                <td><?= $i; ?> </td>
                <td data-target="tanggal"><?= $row["tanggal"]; ?></td>
                <td data-target="keterangan"><?= htmlspecialchars($row["keterangan"]); ?></td>
                <td data-target="keperluan"><?= $row["keperluan"]; ?></td>
                <td data-target="jumlahKeluar"><?= $row['jumlah'] ?></td>
                <td>
                    <a href="#" id="<?= $row["id"] ;?>" class="btn btn-info delete"><i class="fas fa-trash-alt"></i></a>
                    <a href="#" data-role="update" data-id="<?= $row["id"] ;?>" class="btn btn-outline-secondary"
                        id="openBtn"><i class="fas fa-edit"></i></a>
                </td>
            </tr>
            <?php
                $jumlah2[] = $row["jumlah"];
                $jumlahConvert = str_replace('.', '', $jumlah2);
                $totali = array_sum($jumlahConvert);
                $hasilcon = number_format($totali, 0, ',', '.');
            ?>
            <?php $i++ ?>
            <?php endforeach; ?>

            <?php if ( isset($row) != "" ) : ?>
            <tr>
                <td colspan="4">Total Pengeluaran</td>
                <td><?= $hasilcon ?></td>
            </tr>
            <?php elseif ( isset($row) == "" ) : ?>
            <tr>
            </tr>
            <?php endif; ?>

        </table>
    </div>
</div>

<script src="keuangan/js/deletePengeluaran.js"></script>