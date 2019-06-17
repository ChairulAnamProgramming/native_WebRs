<?php require_once('../function/obat_function.php');

$search = $_GET['search'];

$obat = select("SELECT * FROM tbl_obat WHERE nama_obat LIKE  '%$search%'");



$i = 1;

echo '<div class="card-body table-responsive p-0 ">
        <table class="table table-hover">
        <tr>
            <th>#</th>
            <th>Nama Obat</th>
            <th>Keterangan</th>
            <th><i class="fa fa-cogs"></i></th>
        </tr>';
foreach ($obat as $obt) {
    echo '
            <tr>
                <td>' . $i . '</td>
                <th>' . $obt["nama_obat"] . '</th>
                <td>' . $obt["ket_obat"] . '</td>
                <td>
                    <a href="update.php?id=' . $obt["id_obat"] . '" class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i></a>
                    <a href="delete.php?id=' . $obt["id_obat"] . '" class="btn btn-danger btn-sm"> <i class="fa fa-remove"></i></a></td>
            </tr>
            ';
    $i++;
}
echo '
        </table>
        </div>';
