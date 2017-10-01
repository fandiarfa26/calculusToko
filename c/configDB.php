<?php
	define('DB_HOST','localhost');
	define('DB_NAME','id3094333_calculustoko');
	define('DB_USER','id3094333_fandiarfa26');
	define('DB_PASS','makan098');
	/* untuk perbaikan */
	// define('DB_NAME','calculusToko');
	// define('DB_USER','root');
	// define('DB_PASS','arfabuma06');

	try{
		$conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo "Koneksi Database gagal ".$e->getMessage();
		exit;
	}