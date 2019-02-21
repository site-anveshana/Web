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
}label{
	margin:2%;
	margin-right:1%;
	margin-top:0;
	margin-bottom:0;
}
.row{
	margin:1%;
}
</style>
		<table id="headings">
								<tr>
									<th>TOTAL REGISTRATIONS : <?php
												$result = $dbobj->search('anveshana_participants',"COUNT(DISTINCT HTNO)",1,1);
												if($result)
												echo $result->fetch_assoc()["COUNT(DISTINCT HTNO)"];
									?></th><th>
										
				<input type="radio" id="event" onclick="showoff()" name="cat"><label for="event">EVENT</label>
				<input type="radio" id="dept" onclick="showoff()" name="cat"><label for="dept">DEPARTMENT</label>
				<input type="radio" id="clg" onclick="showoff()" name="cat"><label for="clg">COLLEGE</label>
									
									</th>
								</tr>
								
		</table>
		
		</div><div class="col-lg-1"></div>
		</div>
		<div class="row">
		<div class="col-lg-5" id="collegesd">
						<h5 style="color:red">COLLEGES</h5>
									<select id="colleges" onfocusout="sendDataReports()">
										<?php
											$result = $dbobj->search('anveshana_colleges',"*",1,1);
											echo '<option value="" checked>---</option>';
											if($result){
													while($row = $result->fetch_assoc())
															echo '<option value="'.$row['NAME'].'">'.$row['NAME'].'</option>';
											}
										
										?>
									
									</select>
									</div>
					<div class="col-lg-3" id="eventsd">
						<h5 style="color:red">EVENTS</h5>
									<select id="events" onfocusout="sendDataReports()">
									<?php
											$result = $dbobj->search('anveshana_events',"*",1,1);
											echo '<option value="" checked>---</option>';
											if($result){
													while($row = $result->fetch_assoc())
															echo '<option value="'.$row['event_id'].'">'.$row['event_name'].' --> '.$row['event_type'].'</option>';
											}
										
										?>
									
									</select>
								</div>		<div class="col-lg-4" id="departmentsd">
						<h5 style="color:red" >DEPARTMENTS</h5>
						<select id="departments" onfocusout="sendDataReports()">
										<option value="">---</option>
										<option value="CIVIL">CIVIL</option>
										<option value="MECH">MECH</option>
										<option value="ECE">ECE</option>
										<option value="IT">IT</option>
										<option value="CSE">CSE</option>
										<option value="DCME">DCME</option>
										<option value="DECE">DECE</option>
										<option value="DEEE">DEEE</option>
										<option value="DME">DME</option>
										<option value="DCE">DCE</option>
										<option value="MS">MS</option>
									</select>
									</div>
								</div>

<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>

    <div class="row" id="result">
		<div id='loader'></div>
    </div>

</body>

</html>

<script>
					function showoff(){
						if(document.getElementById('event').checked==true){
							document.getElementById('eventsd').style=""
						}else{
							document.getElementById('eventsd').style="display:none"
							document.getElementById('events').value	= ""	
						}
						if(document.getElementById('dept').checked==true){
							document.getElementById('departmentsd').style=""
						}else{
							document.getElementById('departmentsd').style="display:none"
							document.getElementById('departments').value = ""
						}
						if(document.getElementById('clg').checked==true){
							document.getElementById('collegesd').style=""
						}else{
							document.getElementById('collegesd').style="display:none"
							document.getElementById('colleges').value = ""
						}
					}showoff();

					function sendDataReports(){
						startanim();
						var event = document.getElementById('events').value		
						var clg = document.getElementById('colleges').value		
						var dept = document.getElementById('departments').value
						var log = $.ajax({
							url:'php/report.php',
							type:'GET',
							data:'event='+event+'&clg='+clg+'&dept='+dept,
							success:function(msg){
								stopanim();
								$('#result').html(msg)
								// console.log(msg)
							},
							error:function(msg){
								console.log('FAILED')
							}
						});
						// console.log(log)

					}
					function startanim(){
						$('#result').html("<div align='center' class='loader'></div>")
					}
					function stopanim(){
						$('#result').html("")
					}
					// startanim(); 
					</script>

