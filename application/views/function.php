<?php 

function rupiah($angka){
	if($angka=="0") {
		$hasil_rupiah = "Rp 0,00";
	}
	else {
		$hasil_rupiah = "Rp " . number_format((float)$angka,2,',','.');
	}
	return $hasil_rupiah;
}

?>