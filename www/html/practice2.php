<?php
	$filename = "./log.txt";//ログファイル名
	$time = date("Y/m/d H:i");//アクセス時刻
	$ip = getenv("REMOTE_ADDR");//IPアドレス
	$host = getenv("REMOTE_HOST");//ホスト名
	$referer = getenv("HTTP_REFERER");//リファラ
	if($referer == "")
	{
		$referer = "(refererなし)";
	}
	
	//ログ本文
	$log = $time ." ". $ip . " ". $host. " ". $referer;
	
	//ログ表示
	echo $log. "<br>";
	
	//ログ書き込み
	$fp = fopen($filename, "a");
	fputs($fp, $log."n");
	fclose($fp);
	
	//ログを表示
	$fp = fopen($filename, "r");
	while( ! feof( $fp ) )
	{
		echo fgets($fp). "<br>";
	}
	fclose($fp);
	
	//ログダウンロードリンク
	echo "<a href="". $filename. "">ログDL</a><br>";
?>