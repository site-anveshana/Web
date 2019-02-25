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

                    <form action="php/alert.php" name="events" method="post">
                        <div class="row">

                        <div class="col-md-12 col-lg-12 col-sm-12 form-group" >
                            <label>Message: </label>

                            <input type="text" class="form-control" name="msg" placeholder="Message">
                            </div>
                        </div>
                        <div class="row">
                            <select name="event_id"class="form-control">
    <?php
                            $result = $dbobj->search('anveshana_events',"*",1,1);
    $output = "";
    echo '<option value="">---</option>';
    if($result){
        while($row = $result->fetch_assoc())
            if($row["event_id"] != 0)
            echo '<option value="'.$row['event_id'].'">'.$row['event_name'].' -- '.$row['event_type'].'</option>';
    }
?>

                            </select>
                            
                        </div>
                        <input type="submit" value="Send" class="btn abtn">
                    </form>
                    </div>

                </div>


        </div>

    </div>

</body>

</html>

