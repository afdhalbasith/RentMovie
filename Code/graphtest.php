<?php
include "koneksi.php";
include "phpgraphlib.php";
$graph = new PHPGraphLib(600,500);

$dataArray = array();

$sql="SELECT FILM.KATEGORI, COUNT(*) AS 'count' 
	  FROM FILM, DETIL_PEMINJAMAN
	  WHERE DETIL_PEMINJAMAN.FID = FILM.FID
	  GROUP BY FILM.KATEGORI";
$result = mysql_query($sql) or die('Query failed: ' . mysql_error());
if ($result) {
  while ($row = mysql_fetch_array($result)) {
      $salesgroup=$row["KATEGORI"];
      $count=$row["count"];
      //add to data areray
      $dataArray[$salesgroup]=$count;
  }
}
  
//configure graph
$graph->addData($dataArray);
$graph->setTitle("Ranking Kategori");
$graph->setGradient("lime", "green");
$graph->setBarOutlineColor("black");
$graph->createGraph();
?>