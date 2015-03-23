<?php
require_once "koneksi.php";
$q = strtolower($_GET['q']);
if (!$q) return;

$sql = "select DISTINCT FNAMA FROM film where FNAMA LIKE '%$q%' ORDER BY FNAMA";
$rsd = mysql_query($sql);

	
while($rs = mysql_fetch_array($rsd)) {
	
	$cname = $rs['FNAMA'];
	echo "$cname\n";
	
}
?>
