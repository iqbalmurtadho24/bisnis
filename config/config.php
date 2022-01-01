<?php
$DB = "bisnis";
$HOST = "localhost";
$USERNAME = "root";
$PASSWORD = "";
date_default_timezone_set('Asia/Jakarta');
//koneksi database
function connect_to_db()
{
	$connect_db = mysqli_connect($GLOBALS['HOST'],$GLOBALS['USERNAME'],$GLOBALS['PASSWORD'],$GLOBALS['DB']);

	if (!$connect_db) {
		die('Gagal Terkoneksi ke database :'.mysqli_error($connect_db));
	}
	return $connect_db;
}

//eksekusi query
function query($query)
{
	$conn = connect_to_db();

	//security
	if($data = mysqli_query($conn ,$query)){
		
		return $data;

	}
	else{
		return $query;
	}
    $conn->close();
}

function update( $query )
{
	$conn = connect_to_db();

	//security
	if($data = mysqli_query($conn ,$query) && $conn->affected_rows != 0  ){
		
		return 1;

	}
	else{
		return 0;
	}
    $conn->close();
}
