<?php
include_once('../config/database.php');

function selectPasien($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function insertPasien($data)
{
    global $conn;
    $nomor_identitas = htmlspecialchars($data['nomor_identitas']);
    $nama_pasien = htmlspecialchars($data['nama_pasien']);
    $jk = htmlspecialchars($data['jk']);
    $alamat = htmlspecialchars($data['alamat']);
    $phone = htmlspecialchars($data['phone']);
    $query = "INSERT INTO tbl_pasien VALUES ('','$nomor_identitas','$nama_pasien','$jk','$alamat','$phone')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function updatePasien($data)
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


function deletePasien($id)
{
    global $conn;
    foreach ($id as $key) {
        $query = "DELETE FROM tbl_pasien WHERE id_pasien = $key ";
        mysqli_query($conn, $query);
    }
    return mysqli_affected_rows($conn);
}
