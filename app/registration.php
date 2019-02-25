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

                    <form action="php/payment.php" name="form2" method="post" ID="content">
                        <input name="sum" type="hidden">
                        <input name="req" type="hidden">
                        <div class="content0">
</div>
            <div class="row" >
            <div class="col-lg-8 col-sm-12">
            <h4 style="color:purple; font-weight: bold" id="info"> <?php 
                    echo strtoupper($_POST['htno'])."" ;
                ?>	</h4>
                </div>
                <div class="col-lg-2 col-sm-12">
                <button type="submit" class="btn btn-warning">
                PAY NOW</button>
                </div>

                <div class="col-lg-2 col-sm-12">
                <button type="button" class="btn btn-warning" >
                    <a href="payment.php" style="text-decoration:none;color:black;">
                CANCEL</a></button>
                </div>
            </div>
                    </form>
                    </div>

                </div>


        </div>

    </div>

</body>

</html>

<?php
    if(!isset($_POST['htno'])){
        header("refresh:0;url=payment.php");
    }
    $_SESSION['htno'] = $_POST['htno'];
    $htno = strtoupper($_POST['htno']);

    $dbobj->connect();

    $result = $dbobj->search('anveshana_participants','*',"HTNO","'".$htno."'");
    $dept = "";
    if($result){
        if($row = $result->fetch_assoc()){
            echo "<script>";
                $info = "".$row['FIRSTNAME']." ".$row["LASTNAME"]." - ".$htno;
                echo "document.getElementById('info').innerHTML = '".strtoupper($info)."'";

            echo "</script>";
            $dept = $row["DEPARTMENT"];
        }
    }
    else{
        echo "<script>alert('Reg.No NOT FOUND');window.top.location='payment.php'</script>";
		
		die();
    }
    if($dept == "DCME" || $dept == "DECE" || $dept == "DEEE"|| $dept ==  "DME"|| $dept ==  "DCE")
$dept = "DIPLOMA";

    //query
    $result = $dbobj->search('anveshana_events','*',1,1);

    if($result){
        echo "<script>var a = 0;";
        while($row = $result->fetch_assoc()){
                echo "if(document.getElementById('".$row['event_type']."')){";
                    echo 'document.getElementById("'.$row['event_type'].'").innerHTML += \'<tr><td><input type="checkbox" name='.$row['event_id'].' onClick="newCheck()" id="'.$row['event_id'].'"  value="'.$row['event_cost'].'" >'.$row['event_name'].'</td></tr>\'';
                echo "}";
                if($dept == $row['event_type'] || $row['event_type'] == 'CENTRAL' || $row['event_type'] == 'CULTURAL' || $row['event_type'] == 'SPORTS'){
                    echo "else{";
                        echo "var x = document.createElement('table');";
                        echo "x.id='".$row['event_type']."';";
                        echo "x.className ='col-lg-3 col-sm-6 col-md-12';";
                        echo "if((document.getElementsByTagName('table').length)%4 == 0){";
                            echo "a += 1;";
                            echo "var div = document.createElement('div');div.className = 'row';div.id='content'+a;";
                            echo "document.getElementById('content').appendChild(div);";
                        echo "}";
                        echo "document.getElementById('content'+a).appendChild(x);";
                        echo 'document.getElementById("'.$row['event_type'].'").innerHTML = \'<tr> <td colspan="6" ><h4 style="color:red; font-weight: bold"> '.$row['event_type'].' EVENTS	</h4></td></tr class="checkbox-grid">\';';
                        echo 'document.getElementById("'.$row['event_type'].'").innerHTML += \'<tr><td><input type="checkbox" name='.$row['event_id'].' id="'.$row['event_id'].'" onClick="newCheck()" value="'.$row['event_cost'].'" >'.$row['event_name'].'</td></tr>\';';
                    echo "}";
                }

            // $event_details .= '<tr><td><input type="checkbox" name='.$row['event_id'].' id="" value='.$row['event_id'].' >'.$row['event_name'].'</td></tr>';
        }
        
        $result = $dbobj->search('anveshana_registration','*',"HTNO","'".$htno."'");
        $req_amnt = 0;
        if($result){
            while($row = $result->fetch_assoc()){
                echo "if(document.getElementById('".$row['event_id']."')){";
                    echo "document.getElementById('".$row['event_id']."').checked = true;";
                    if($row["status"]){   
                        echo "document.getElementById('".$row['event_id']."').disabled = true;";
                    }
                    $req_amnt += $row['amount'];
                echo "}";
            }
        }
        echo "document.getElementById('0').checked = true;//document.getElementById('0').disabled = true;";
        echo "</script>";
    }

    ?>
    

    <div class="row" align="center">
    <div class="col-lg-6 col-sm-12">
    <h4 style="color:blue; font-weight: bold" id="req"> REQUIRED:	

                    <?php
                    // echo $req_amnt;
                        $result = $dbobj->search('anveshana_transactions','*',"HTNO","upper('".$htno."')");
                        $sum = 0;
                        if($result){
                            while($row = $result->fetch_assoc()){
                                $sum += $row["amount"];
                            }
                        }

                        echo "<script>sum = ".$sum.";document.form2.sum.value = sum;</script>";
                    
                        $req_amnt = $req_amnt - $sum;
                        if($req_amnt < 0)
                            $req_amnt = 0;
                        echo "₹".$req_amnt;
                    
                    ?>

    </h4>
</div>
<div class="col-lg-6 col-sm-12">
    <h4 style="color:blue; font-weight: bold"> PAID:	

                    <?php
                        echo "₹".$sum;

                        
                    ?>
    </h4>
                    </div>
                </div>

    <script>
        function newCheck(){
            var x = document.getElementsByTagName('input')
            var req = 0;
            for(var i=0;i<x.length;i++){
                if(x[i].checked){
                    req += parseInt(x[i].value)
                }
            }
            document.getElementById('req').innerHTML = "REQUIRED: ₹"+(req-sum)
            
            document.form2.req.value = (req-sum);
        }newCheck();
                        
    </script>

<div class="row" align="center">
    <h4 style="color:red; font-weight: bold" id="req"> ONLY CAPTAIN NEED TO REGISTER FOR TEAM EVENTS</h4>
</div>



