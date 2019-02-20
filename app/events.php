<?php

    include('template/index.php');
    
?>

<html>

<title>Events - Anveshana</title>

<body>

    <div class="container">



        <!-- Modal -->

        <div class="" id="myModal" role="dialog">

                <!-- Modal content-->

                <div class="modal-content">


                    <div class="modal-body" style="margin:0;">

                    <form action="php/event.php" onsubmit="return check()" name="events" method="post">
                        <div class="row">

                        <div class="col-md-12 col-lg-6 col-sm-12 form-group" >
                            <label>Event Name: </label>

                            <input type="text" class="form-control" name="event_name" placeholder="Event Name">
                            </div>
                            <div class="col-md-12 col-lg-6 col-sm-12 form-group" >
                            <label>Event Id: <b style="color:red">*DELETE*</b></label>

                                <select name="event_id" class="form-control">
                                    <?php
                                        $result = $dbobj->search('anveshana_events','*',1,1);
                                        echo "<option value='' selected>---</option>";
                                        if($result){
                                            while($row = $result->fetch_assoc()){
                                                echo "<option value='".$row["event_id"]."'>".$row["event_name"]."-->".$row["event_type"]."</option>";
                                            }
                                        }
                                    
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6 col-lg-6 col-sm-6 form-group" >

                                <label>Type: </label>
                                <select name="event_type" class="form-control" onchange="setType()">
                                        <option value="" selected>---</option>
                                        <option value="CENTRAL">CENTRAL</option>
                                        <option value="CULTURAL">CULTURAL</option>
                                        <option value="CSE">CSE</option>
                                        <option value="IT">IT</option>  
                                        <option value="MECH">MECH</option>
                                        <option value="EEE">EEE</option>
                                        <option value="ECE">ECE</option>
                                        <option value="CIVIL">CIVIL</option>
                                        <option value="MS">MS</option>
                                        <option value="DIPLOMA">DIPLOMA</option>
                                        <option value="SPORTS">SPORTS</option>  
                                </select>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-6 form-group" >
                            <label>Entry Fee: </label>
                                <input type="number" class="form-control" name="event_cost" placeholder="$999">
                            </div>
                        </div>

                        <div class="row"></div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-6" >
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-6" >
                            <div class="col-md-6 col-lg-4 col-sm-6" >
                                <input type="submit" value="Create" class="btn abtn">
                            </div><div class="col-md-6 col-lg-4 col-sm-6" >
                                <input type="button" value="Delete" class="btn abtn">
                            </div>
                            </div>
                            <!-- <div class="col-md-0 col-lg-4 col-sm-0 form-group" >
                            </div> -->
                        </div>
                    </form>
                    </div>

                </div>


        </div>

    </div>

</body>

</html>


<script>
    function check(){

        var event = document.events

        if(event.event_name.value == ""){
            alert("Invalid Event Name")
            return false
        }

        if(event.event_type.value == ""){
            alert("Invalid Event Type")
            return false
        }

        if(event.event_cost.value == "" || event.event_cost.value < 100){
            alert("Minimum Fee should be ₹100")
            return false
        }

        var x = document.events.event_id
        for(var i=0;i<x.length;i++){
            if(document.events.event_name.value.toUpperCase() == x[i].text.split("-->")[0]){
                if(document.events.event_type.value.toUpperCase() == x[i].text.split("-->")[1]){
                    alert('Duplicate Event')
                    return false
                }

            }
        }
    }

</script>