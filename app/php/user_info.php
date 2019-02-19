<?php

include_once("db_operations.php");
$dbobj = new DBConnect;

$dbobj->connect();

$result = $dbobj->search('anveshana_participants',"*",'htno','"'.$_SESSION['anveshana_user_htno'].'"');

if($result){
    if($row = $result->fetch_assoc()){
        // print_r($row);
?>
<form action="php/user.php" name="users" method="post">
<div class="row">

<div class="col-md-12 col-lg-12 col-sm-12 form-group" >
    <label>Hall Ticket: </label>

    <input type="text" class="form-control" name="htno" value="<?php echo strtoupper($row['HTNO']); ?>" placeholder="Register Number">
    </div>
</div>
<div class="row">

    <div class="col-md-6 col-lg-6 col-sm-6 form-group" >

        <input type="text" class="form-control" disabled name="firstname" value="<?php echo $row['FIRSTNAME']?>" placeholder="First Name">
    </div>
    <div class="col-md-6 col-lg-6 col-sm-6 form-group" >

        <input type="text" class="form-control" disabled name="lastname" value="<?php echo $row['LASTNAME']?>" placeholder="Last Name">
    </div>
</div>
<div class="row">

    <div class="col-md-6 col-lg-6 col-sm-6 form-group" >

        <input type="text" class="form-control" disabled name="department" value="<?php echo $row['DEPARTMENT']?>" placeholder="Department">
    </div>
    <div class="col-md-4 col-lg-6 col-sm-4">

        <input type="text" class="form-control" disabled name="email" value="<?php echo $row['EMAIL']?>" placeholder="Email">
    </div>
</div>

<div class="row">

    <div class="col-md-6 col-lg-6 col-sm-6 form-group" >
    <label>Role: </label>
        <select name="role_id" class="form-control">
                <option value="" selected>---</option>
                <?php
                    include('php/roles.php');
                ?>          
        </select>
        
    </div>
</div>
<div class="row"></div>
<div class="row">
    <input type="submit" value="ASSIGN" class="btn abtn">
</div>
    </form>
<?php
    }
}else{
        echo "<script>alert(\"USER NOT FOUND\")</script>";
        header("refresh:0;url=users.php");
}
?>