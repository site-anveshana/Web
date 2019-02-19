<form action="users.php" name="users" onsubmit="return validate()" method="get">
    <div class="row">

        <div class="col-md-12 col-lg-12 col-sm-12 form-group" >
            <label>Hall Ticket: </label>

            <input type="text" class="form-control" name="htno" placeholder="Register Number">
            </div>
        </div>
        <div class="row">
            <input type="submit" value="search" class="btn">
        </div>
    </div>
</form>

<script>
    function validate(){
        var htno = document.users.htno
        if(htno.value.length!=10){
            htno.focus();
            alert('Invalid Reg.No')
            return false;
        }
    }

</script>