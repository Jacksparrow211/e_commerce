
<?php
	$base_url = "http://192.168.18.39/incubator_zaki/pengenalan_php/e_commerce/";
	// http://localhost/incubator_zaki/pengenalan_php/e_commerce/images/
	$asset_url = $base_url . "images/" ;
		// membuat function jsonResponse agar tidak perlu repot lagi harus rancang array responsenya tiap kali menampilkan hasil dari eksekusi perintah panggil data
	function jsonResponse($data, $code, $message) {
		$res = [
			"data" => $data,
			"status" => $code,
			"message" => $message
		];
		return json_encode($res);

	}

?>