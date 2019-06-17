<?php
include_once('../config/database.php');

function select($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function insert($data)
{
    global $conn;
    $nama_obat = htmlspecialchars($data['nama_obat']);
    $keterangan = htmlspecialchars($data['ket_obat']);

    $query = "INSERT INTO tbl_obat VALUES ('','$nama_obat','$keterangan')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;
    $id_obat = htmlspecialchars($data['id_obat']);
    $nama_obat = htmlspecialchars($data['nama_obat']);
    $keterangan = htmlspecialchars($data['ket_obat']);

    $query = "UPDATE tbl_obat SET nama_obat ='$nama_obat', ket_obat='$keterangan' WHERE id_obat = '$id_obat'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function delete($id)
{
    global $conn;
    $query = "DELETE FROM tbl_obat WHERE id_obat = $id ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
