<?php

    include('template/index.php');
?>
<!DOCTYPE html>

<html>

<head>

    <title>Print - Anveshana</title>

</head>

<body>

    <div class="container">

		<?php
			$htno = false;
			$result3 = false;
			if(!isset($_SESSION['htno']))
				if(!isset($_GET['htno']))
					header("refresh:0;url=payment.php");
				else{
					$_GET['htno'] = strtoupper($_GET['htno']);
					$htno = $_GET['htno'];
					$result3 = $dbobj->search('anveshana_transactions','*',"HTNO","'".$htno."' order by transaction desc");
				}
			else
				$htno = $_SESSION['htno'];

			// if(!$htno)
			// 	header("refresh:0;url=payment.php");

			$result1 = $dbobj->search('anveshana_participants','*',"HTNO","'".$htno."'");
			if(!$result3)
				$result3 = $dbobj->search('anveshana_transactions','*',"HTNO","'".$htno."' and transaction_id like '".$_SESSION['anveshana_username']."' order by transaction desc");
			$result = $dbobj->search('anveshana_events','*',1,1);

			if(!$result1 || !$result2 || !$result3 || !$result){
				header("refresh:0;url=payment.php");
				die();
			}
			$row1 = $result1->fetch_assoc();
			$row3 = $result3->fetch_assoc();

		?>

        <!-- Modal -->

        <div class="" id="myModal" role="dialog">

                <!-- Modal content-->

                <div class="modal-content">


					<div class="modal-body" style="margin:0;">
							<div id="content">

							<table>
				<tr>
				<td colspan="3" align="center"><img src="img/logo1.png" width=500 height=200/></td>
			</tr>
			<tr>
				<td colspan="3" align="center">Techno-Cultural Fest   22nd &amp; 23 rd
				February 2019</td>
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
				<td align="left">No:<?php echo $row3["transaction"]; ?></td>
			 
				<td align="right" colspan="2" >Date:<?php echo substr($row3["timestamp"],0,10); ?></td>
			</tr>
			<tr>
				<td  align="left" colspan="3" >RNo.:<?php echo $row1["HTNO"]; ?></td> </tr>
				<tr>
				<td align="left" colspan="3">Name:<?php echo $row1["FIRSTNAME"]; ?></td>
				
			</tr>
			<tr align="center">
				<td colspan="3"><hr></td>
			</tr>
			<?php
			// print_r($_SESSION["array"]);
			while($row = $result->fetch_assoc()){
				$result2 = $dbobj->search('anveshana_registration','*',"HTNO","'".$htno."' and event_id=".$row['event_id']." and status=1 and transaction=".$_SESSION["array"]." order by timestamp");
				if($result2)
				if($result2->num_rows > 0)
				if($row2 = $result2->fetch_assoc()){
					if($row2["event_id"] == $row["event_id"]){
						echo "<tr>";
						echo "<td colspan='2'>".$row['event_name'] ."</td>";
						echo "<td>₹".$row['event_cost']."</td>";
						echo "<tr>";
					}
				}
			}
			?>
			<tr>
				<td colspan="2">Total:</td><td> ₹<?php echo $row3["amount"]; ?></td>
			</tr>
			
			<tr align="right">
				<td colspan="3" height="50px" > Signature of <?php echo $_SESSION['anveshana_username']; ?></td>
			</tr>

			<tr align="center">
				<td colspan="3" height="50px" >--> NO REFUND <--</td>
			</tr>
</table>	


							</div>

							<!-- <div class="row">
								<div align="center" class="noprint">

								<div class="col-md-6 col-lg-4 col-sm-6 form-group" >
                                <input type="button"onclick="myFunction()" value="Print this page" class="btn abtn">
							</div>
							<div class="col-md-6 col-lg-4 col-sm-6 form-group">
								<a href="payment.php"><button class="btn abtn">Go Back</button></a>
                            </div> -->
								
								</div>

								<script>
								
									window.print();

									setTimeout(function(){
										window.print();
										setTimeout(function(){window.top.location="payment.php"},500);
									},500);
								</script>

							</div>
                    
                    </div>

                </div>


        </div>

    </div>

</body>

</html>

