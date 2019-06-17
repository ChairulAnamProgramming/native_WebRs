<?php
include_once('../config/database.php');

function selectDr($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function insertDr($data)
{
    global $conn;
    $nama_dokter = htmlspecialchars($data['nama_dokter']);
    $spesialis = htmlspecialchars($data['spesialis']);
    $alamat = htmlspecialchars($data['alamat']);
    $phone = htmlspecialchars($data['phone']);
    $query = "INSERT INTO tbl_dokter VALUES ('','$nama_dokter','$spesialis','$alamat','$phone')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function updateDr($data)
{
    global $conn;
    $id_dokter = htmlspecialchars($data['id_dokter']);
    $nama_dokter = htmlspecialchars($data['nama_dokter']);
    $spesialis = htmlspecialchars($data['spesialis']);
    $alamat = htmlspecialchars($data['alamat']);
    $phone = htmlspecialchars($data['phone']);
    $query = "UPDATE tbl_dokter SET nama_dokter ='$nama_dokter', spesialis='$spesialis', alamat='$alamat', no_telp='$phone' WHERE id_dokter = '$id_dokter'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function deleteDr($id)
{
    global $conn;
    foreach ($id as $key) {
        $query = "DELETE FROM tbl_dokter WHERE id_dokter = $key ";
        mysqli_query($conn, $query);
    }
    return mysqli_affected_rows($conn);
}
