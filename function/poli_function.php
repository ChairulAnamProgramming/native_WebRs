<?php
include_once('../config/database.php');

function selectPoli($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function insertPoli($data)
{
    global $conn;
    $total = htmlspecialchars($data['total']);
    for ($i = 1; $i <= $total; $i++) {
        $nama_poli = htmlspecialchars($data['nama_poli-' . $i]);
        $gedung = htmlspecialchars($data['gedung-' . $i]);
        $query = "INSERT INTO tbl_poliklinik VALUES ('','$nama_poli','$gedung')";
        mysqli_query($conn, $query);
    }
    return mysqli_affected_rows($conn);
}

function updatePoli($data)
{
    global $conn;
    for ($i = 0; $i < count($_POST['id_poli']); $i++) {
        $id_poli = htmlspecialchars($data['id_poli'][$i]);
        $nama_poli = htmlspecialchars($data['nama_poli'][$i]);
        $gedung = htmlspecialchars($data['gedung'][$i]);
        $query = "UPDATE tbl_poliklinik SET nama_poli ='$nama_poli', gedung='$gedung' WHERE id_poli = '$id_poli'";
        mysqli_query($conn, $query);
    }
    return mysqli_affected_rows($conn);
}


function deletePoli($id)
{
    global $conn;
    foreach ($id as $key) {
        $query = "DELETE FROM tbl_poliklinik WHERE id_poli = $key ";
        mysqli_query($conn, $query);
    }
    return mysqli_affected_rows($conn);
}
