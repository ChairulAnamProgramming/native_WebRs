<?php
include_once('../config/database.php');

function selectRm($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function insertRm($data)
{
    global $conn;
    $id_rm =  date("h-i-sa");
    $id_pasien = htmlspecialchars($data['id_pasien']);
    $id_dokter = htmlspecialchars($data['id_dokter']);
    $id_poli = htmlspecialchars($data['id_poli']);
    $keluhan = htmlspecialchars($data['keluhan']);
    $diagnosa = htmlspecialchars($data['diagnosa']);
    $date = htmlspecialchars($data['date']);

    $query = "INSERT INTO tbl_rekammedis VALUES ('$id_rm','$id_pasien','$keluhan','$id_dokter','$diagnosa','$id_poli','$date')";
    mysqli_query($conn, $query);

    $obat = $data['obat'];
    foreach ($obat as $obt) {
        $qry = "INSERT INTO tbl_obat_rekammedis VALUES ('','$id_rm','$obt')";
        mysqli_query($conn, $qry);
    }

    return mysqli_affected_rows($conn);
}

function updateRm($data)
{
    global $conn;
    $id_pasien = $data['id_pasien'];
    $nama_pasien = htmlspecialchars($data['nama_pasien']);
    $jk = htmlspecialchars($data['jk']);
    $alamat = htmlspecialchars($data['alamat']);
    $phone = htmlspecialchars($data['phone']);
    $query = "UPDATE tbl_pasien SET nama_pasien ='$nama_pasien', jk='$jk', alamat='$alamat', no_telp='$phone' WHERE id_pasien = '$id_pasien'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function deleteRm($id)
{
    global $conn;
    foreach ($id as $key) {
        $query = "DELETE FROM tbl_rekammedis WHERE id_rm = '$key' ";
        mysqli_query($conn, $query);
    }
    return mysqli_affected_rows($conn);
}
