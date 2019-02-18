<?php
session_start();
$user  = $_SESSION["user"];


    if(empty($user)){

            header( "refresh:0;url=index.html" );

}    
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title></title>
<meta name="generator" content="LibreOffice 5.0.3.2 (Linux)" />
<meta name="author" content="Michael " />
<meta name="created" content="2015-05-02T23:36:12.956263144" />
<meta name="changedby" content="Michael " />
<meta name="changed" content="2015-05-02T23:43:32.542260128" />
<style type="text/css">
table {
	margin-bottom: 0.25cm;
	line-height: 120%;
	font-size: 250%;
}
</style>
</head>
<body lang="en-AU" dir="ltr">

<?php
ob_start();
include_once("DBConnect.php");
$dbc = new DBConnect();
$dbc->connect();

//$htno = $_POST['htno'];
$htno = $_SESSION["htno"];

$sql="select * from  users where HTNO="."'".$htno."'";
//$sql="select * from  prie where HTNO='15K61A0503'";
$result=$dbc->read($sql);

//$row = $result->num_rows;
$row = $result->fetch_assoc();
//echo $row;

?>
	<p>
	
		<table >
				<tr>
				<td colspan="3" align="center"><img src="img/logo1.png" width=500 height=200/></td>
			</tr>
			<tr>
				<td colspan="3" align="center">Techno-Cultural Fest   23rd &amp; 24
				February 2018</td>
			</tr>
			<tr>
				<td colspan="3" align="center"><b>SASI INSTITUTE OF TECHNOLOGY AND ENGINEERING</b></td>

			</tr>
			<tr align="center">
				<td>Tel:08818-275500</td>
				<td> office@sasi.ac.in</td>
				<td> www.sasi.ac.in</td>


			</tr>
			<tr align="center" >
				<td colspan="3"><hr/></td>
			</tr>
			<tr >
				<td align="left">No:<?php echo $row["rno"]; ?></td>
				<td align="center"><b>Original Copy</b></td>
				<td align="left">Date:<?php echo substr($row["TOR"],0,10); ?></td>
			</tr>
			<tr>
				<td >Regd No.:<?php echo $row["HTNO"]; ?></td>
				<td align="center" colspan="2">Name:<?php echo $row["FIRSTNAME"]; ?></td>
				
			</tr>
			<?php
			$i=1;
			$ev="EVENT";
			while($i<=33)
			{
				$eve = $ev.$i;
				if($row[$eve] !="NA")
				{
					echo "<tr>";
					echo "<td colspan='2'>$row[$eve] </td>";
					echo "<td>100</td>";
					echo "<tr>";
				}
				$i++;
			}
			?>
			<tr>
				<td colspan="3">Amount: <?php echo $row["PAID"]; ?></td>
			</tr>
			
			<tr align="right">
				<td colspan="3" height="50px" >  Signature of <?php echo $user; ?></td>
			</tr>
</table>
	</p>
	<div align="center" class="noprint">



<button onclick="myFunction()">Print this page</button>
<a href="reg.php"><button>Go Back</button></a>
</div>

<script>
function myFunction() {
    window.print();
}
</script>
</body>
</html>
