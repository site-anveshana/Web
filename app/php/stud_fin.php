<form action="php/alert.php" name="events" method="post">
                        <div class="row" style="display:none">

                        <div class="col-md-4 col-lg-6 col-sm-6 form-group" >
							<label>Financial: </label>

							<input type="radio" class="form-control" name="type" onchange="" placeholder="Message">
</div><div class="col-md-4 col-lg-6 col-sm-6 form-group" >
                            <label>Event: </label>
							<input type="radio" class="form-control" name="type" onchange="" placeholder="Message">
                            </div>
                        </div><style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr{background-color: #f2f2f2;}

#customers tr:hover {background-color: black;color:white;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: red;
  color: white;
}
</style>
                        <div class="row" id="customers" align="center">
							<script>
								var dept = [];
							</script>

							<table>
								<tr>
									<th>USERNAME</th>
									<th>INCOME (₹)</th>
									<th>MEMEBERS</th>
								</tr>
								<?php
								include_once('db_operations.php');
$dbobj = new DBConnect;
$dbobj->connect();
										$result = $dbobj->search('anveshana_transactions',"SUM(amount),transaction_id,COUNT(transaction)",1,"1 GROUP BY transaction_id");
										if($result)
										while($r = $result->fetch_assoc()){
												if($r["SUM(amount)"]=="")
													continue;
									
										echo "<tr>";
										echo "<td>".$r["transaction_id"]."</td>";
										// echo "<script>
										// dept[dept.length]={name:'".$r["COLLEGE"]."',members:".$r["COUNT(DISTINCT HTNO)"]."}
										// </script>";
										echo "<td>".$r["SUM(amount)"]."</td>";
										
										echo "<td>".$r["COUNT(transaction)"]."</td>";
										
										echo "</tr>";
			
								}
							
							?>

							</table>
                            
						</div>
                    </form>