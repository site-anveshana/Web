<?php

    include('template/index.php');
    
?>

<html>

<title>Events - Anveshana</title>

<body>

		<div class="row" align="center"><div class="col-lg-1"></div>
		<div class="col-lg-10">
		<style>
#headings {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#headings td, #headings th {
  border: 1px solid #ddd;
  padding: 8px;
}

#headings tr{background-color: #f2f2f2;}

#headings tr:hover {background-color: black;color:white;}

#headings th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: purple;
  color: white;
}
label{
	margin:2%;
	margin-right:1%;
	margin-top:0;
	margin-bottom:0;
}
</style>
		
		</div>
		<table id="headings">
								<tr>
									<th>TOTAL REGISTRATIONS : <?php
												$result = $dbobj->search('anveshana_participants',"COUNT(DISTINCT HTNO)",1,1);
												if($result)
												echo $result->fetch_assoc()["COUNT(DISTINCT HTNO)"];
									?></th><th>
																			<input type="radio" id="registered" name="type" checked onchange="reloadstat(0)"><label for="registered">REGISTERED</label>
																			</th><th> <input type="radio" id="paid" name="type" onchange="reloadstat(1)"><label for="paid">PAID</label>
									
									</th>
									<script>
										function reloadstat(i=0){
											$.ajax({
												url:'php/event_stat.php',
												type:"GET",
												data:"i="+i,
												success:function(msg){
													document.getElementById("event").innerHTML = msg
												},
												error:function(msg){}
											});
										

										$.ajax({
												url:'php/dept_stat.php',
												type:"GET",
												data:"i="+i,
												success:function(msg){
													document.getElementById("dept").innerHTML = msg
												},
												error:function(msg){}
											});
										

										$.ajax({
												url:'php/clg_stat.php',
												type:"GET",
												data:"i="+i,
												success:function(msg){
													document.getElementById("clg").innerHTML = msg
												},
												error:function(msg){}
											});
										}
									
									</script>
								</tr>
		</table>
		</div><div class="col-lg-1"></div>
		</div>

    <div class="row">
			<div class="col-lg-4" id="event">
			<?php
				include("php/event_stat.php");
			?>
			</div>
			<div class="col-lg-3" id="dept">
			<?php
				include("php/dept_stat.php");
			?>
			</div>
			<div class="col-lg-4" id="clg">
			<?php
				include("php/clg_stat.php");
			?>
			</div>

    </div>

</body>

</html>

