<?php

    include('template/index.php');
?>
<!DOCTYPE html>

<html>

<head>

    <title>Change Password - Anveshana</title>

    <script src="script.js?1.0"></script>

</head>

<body>
<div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="loginbox">
                <form action="php/change_pwd.php" onsubmit="return validatepwd()" name="change_pwd" method="post">
                    <div>
                        <p>Old Password</p>
                        <input type="password" name="pwd">
                    </div>
                    <div>
                        <p>New Password</p>
                        <input type="password" name="npwd">
                    </div>
                    <div>
                        <p>Confirm New Password</p>
                        <input type="password" name="cpwd">
                    </div>
                    <br>
                    <div>
                        <input type="submit" value="Change" class="btn">
                    </div>
                </form>
            </div>
        </div>

</body>

</html>
