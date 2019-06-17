<?php require_once('../function/obat_function.php');

$search = $_GET['search'];

$perhalaman = 6;
$jumlahData = count(select("SELECT * FROM tbl_poliklinik"));
$jumlahHalaman = ceil($jumlahData / $perhalaman);
$aktif = (isset($_GET['page'])) ?  $_GET['page'] : 1;

$awal = ($perhalaman * $aktif) - $perhalaman;

$obat = select("SELECT * FROM tbl_poliklinik WHERE nama_poli LIKE  '%$search%' LIMIT $awal,$perhalaman");



$i = 1;

echo '<div class="card-body table-responsive p-0 ">
        <table class="table table-hover">
        <tr>
            <th>#</th>
            <th>Nama Poli</th>
            <th>Gedung</th>
            <th><center><input type="checkbox"></center></th>
        </tr>';
foreach ($obat as $obt) {
    echo '
            <tr>
                <td>' . $i . '</td>
                <th>' . $obt["nama_poli"] . '</th>
                <td>' . $obt["gedung"] . '</td>
                <td align="center"><input type="checkbox" ></td>
            </tr>
            ';
    $i++;
}
echo '
        </table>
        </div>';
