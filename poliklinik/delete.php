<?php
require_once('../function/poli_function.php');
if (!isset($_POST['check'])) {
	echo '<script> alert("Belum ada yang di checklis!"); window.location="index.php" </script>';
}
$check = $_POST['check'];
if (deletePoli($check) > 0) {
	echo "
				<script>
						alert('data berhasil di hapus')
							window.location.href = 'index.php'
				</script>
		";
} else {
	echo "
				<script>
						alert('data gagal di hapus')
						window.location.href = 'index.php'
				</script>
		";
}
