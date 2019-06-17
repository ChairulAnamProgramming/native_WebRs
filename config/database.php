<?php
$host = "localhost";
$user = "root";
$pass = "root";
$db = "native_rumah_sakit";

$conn = mysqli_connect("$host", "$user", "$pass", "$db");

if (mysqli_connect_error($conn)) {
    echo "Database tidak terbaca";
}
