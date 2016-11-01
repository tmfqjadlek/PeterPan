<?

$prodnum = $_SESSION['num'];
$prodnum1 = $_SESSION['num1'];


if($prodnum)
{
include "../lib/dbconn.php";
	$sqlttt = "select * from peterpan_product where num=$prodnum";
	$resulttttt = mysql_query($sqlttt, $connect);
   $rowwwww = mysql_fetch_array($resulttttt);  

?>
   <img src='../admin_prod/data/<?=$rowwwww[file_copied_0]?>'  width="80"/>
<?}
if($prodnum != $prodnum1 )
{
   	$sqlaaa = "select * from peterpan_product where num=$prodnum1";
	$resultttttt = mysql_query($sqlaaa, $connect);
   $rowwwwwww = mysql_fetch_array($resultttttt);
?>
<img src='../admin_prod/data/<?=$rowwwwwww[file_copied_0]?>'  width="80"/>
ป็ม๘2
<?
}
?>