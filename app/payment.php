<?php

    include('template/index.php');
?>
<!DOCTYPE html>

<html>

<head>

    <title>Registration - Anveshana</title>

</head>

<body>

    <div class="container">

        <!-- Trigger the modal with a button -->

        <button type="button" class="btn btn-info btn-lg rbtn" data-toggle="modal" data-target="#myModal" align="center ">Offline Payment</button>



        <!-- Modal -->

        <div class="modal fade" id="myModal" role="dialog">

            <div class="modal-dialog">



                <!-- Modal content-->

                <div class="modal-content">

                    <div>

                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <img src="img/logo1.png" alt="" width="80%" class="img">

                    </div>

                    <div class="modal-body">

                        <form action="registration.php" method="post">

                            <label>Hall Ticket</label>

                            <input type="text" name="htno" id="">

                            <input type="submit" value="submit" class="btn abtn">

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>