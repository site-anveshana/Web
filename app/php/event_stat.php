
<form action="#" name="events" method="post">
                        <div class="row" style="display:none">

                        <div class="col-md-4 col-lg-6 col-sm-6 form-group" >
							<label>Financial: </label>

							<input type="radio" class="form-control" name="type" onchange="" placeholder="Message">
</div><div class="col-md-4 col-lg-6 col-sm-6 form-group" >
                            <label>Event: </label>
							<input type="radio" class="form-control" name="type" onchange="" placeholder="Message">
                            </div>
                        </div><style>
												html,body {    
    height:100%;
    margin: 0;
}
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
	display: block;
	max-height: 100%;
	position:relative;
	overflow-y: auto;
	-ms-overflow-style: -ms-autohiding-scrollbar;
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
								var events = [];
							</script>

							<table max-height="100%">
								<tr>
									<th>EVENT NAME</th>
									<th>MEMEBERS</th>
								</tr>
								<?php
include_once('db_operations.php');
$dbobj = new DBConnect;
$dbobj->connect();
								
$result = $dbobj->search('anveshana_events',"*",1,1);

while($r = $result->fetch_assoc()){
		$res= FALSE;
		if(isset($_GET["i"])){
			if($_GET["i"] == 1){
				// echo $_GET["i"];
				$res = $dbobj->search('anveshana_registration',"COUNT(DISTINCT HTNO)","event_id",$r["event_id"]." and status=1");
			}
		}
		if(!$res){$res = $dbobj->search('anveshana_registration',"COUNT(DISTINCT HTNO)","event_id",$r["event_id"]);}
									if($res)
										if(($res2 = $res->fetch_assoc()["COUNT(DISTINCT HTNO)"]) > 0){
										
										echo "<tr>";
										echo "<td>".$r["event_name"]." -- ".$r["event_type"]."</td>";
										echo "<script>
										events[events.length]={name:'".$r["event_name"]."',members:".$res2."}
										</script>";
										
										echo "<td>".$res2."</td>";
										
										echo "</tr>";
									}else{
										echo "<script>
										events[events.length]={name:'".$r["event_name"]."',members:0}
										</script>";
										// echo "<td>0</td>";
										
										// echo "<td>0</td>";
									}
								}
							
							?>

							</table>
                            
						</div>
                    </form>