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

                    <form action="php/event.php" name="events" method="post">
                        <div class="row">

                        <div class="col-md-12 col-lg-12 col-sm-12 form-group" >
                            <label>Event Name: </label>

                            <input type="text" class="form-control" name="event_name" placeholder="Event Name">
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
                            <div class="col-md-6 col-lg-4 col-sm-6 form-group" >
                                <input type="submit" value="Create" class="btn abtn">
                            </div>
                            <div class="col-md-6 col-lg-4 col-sm-6 form-group" >
                                <!-- <input type="reset" value="Delete" class="btn abtn"> -->
                            </div>
                            <div class="col-md-0 col-lg-4 col-sm-0 form-group" >
                            </div>
                        </div>
                    </form>
                    </div>

                </div>


        </div>

    </div>

</body>

</html>

