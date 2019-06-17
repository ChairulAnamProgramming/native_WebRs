<?php
include_once('../config/database.php');

function selectUser($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function updateUser($data)
{
    global $conn;
    $id_user = htmlspecialchars($data['id_user']);
    $username = htmlspecialchars($data['username']);
    $nama = htmlspecialchars($data['nama']);
    $alamat = htmlspecialchars($data['alamat']);
    $img_old = htmlspecialchars($data['image_old']);


    if ($_FILES['img']['error'] === 4) {
        $gambar = $img_old;
    } else {
        $gambar = upload();
        $url = "../assets/img/profile/" . $img_old;
        if ($img_old != "default.jpg") {
            unlink($url);
        }
    }

    $query = "UPDATE tbl_user SET

		nama = '$nama',
		username = '$username',
		alamat = '$alamat',
		img = '$gambar',
        role = '1'
	WHERE id_user = $id_user ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    $nama = $_FILES['img']['name'];
    $size = $_FILES['img']['size'];
    $error = $_FILES['img']['error'];
    $tmp = $_FILES['img']['tmp_name'];
    if ($error === 4) {
        echo "<script>

                    alert('pilih gambar terlebih dahulu!');
                </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $nama);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>

							alert('yang anda upload bukan gambar!');
						</script>";
        return false;
    }


    if ($size > 1000000) {
        echo "<script>
    
                                alert('ukuran yang anda upload terlalu besar!');
                            </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmp, '../assets/img/profile/' . $namaFileBaru);


    return $namaFileBaru;
}
