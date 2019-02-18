<?php

    include('template/index.php');
    
?>

<html>

<title>Users - Anveshana</title>

<body>

    <div class="container">



        <!-- Modal -->

        <div class="" id="myModal" role="dialog">

                <!-- Modal content-->

                <div class="modal-content">


                    <div class="modal-body" style="margin:0;">

                        <?php
                        if(!isset($_GET['htno'])){
                            include('php/search_user.php');
                            }
                        else{
                            $_SESSION['anveshana_user_htno'] = $_GET['htno'];
                            include('php/user_info.php');
                            }

                        ?>
                    </div>

                </div>


        </div>

    </div>

</body>

</html>

