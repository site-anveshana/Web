<?php
    class DBConnect{
        var $serverName = null;
        var $dbName = null;
        var $username = null;
        var $password = null;
        var $conn = null;

        function __construct(){
            $this->serverName = "localhost";            
            $this->username = "root";
            $this->password = "";
            $this->dbName = "mlf";
        }
        function setTable($tableName){
            $this->tableName = $tableName;
        }

        function setCreds($username,$password){
            $this->username = $username;
            $this->password = $password;
        }

        function setDBName($dbName){
            $this->dbName = $dbName;
        }

        function connect(){
            $this->serverName = $_SERVER['HTTP_HOST'];

            if($this->serverName == "172.168.2.115"){
                $this->conn = new mysqli($this->serverName, $this->username, $this->password, $this->dbName);
                if($this->conn->connect_error){
                    echo "<script>console.log('Connection Failed with 172.168.2.115.')</script>";
                }
                else{
                    echo "<script>console.log('Connection Successful with 172.168.2.115.')</script>";
                }
            }
            else if($this->serverName == "www.redants.info" ||$this->serverName == "redants.info" ){
                $this->serverName = "localhost";
                $this->username = "redants";
                $this->password = "Sasi@123";
                $this->dbName = "redants";
                $this->conn = new mysqli($this->serverName, $this->username, $this->password, $this->dbName);
                if($this->conn->connect_error){
                    echo "<script>console.log('Connection Failed with redants.info.')</script>";
                }
                else{
                    echo "<script>console.log('Connection Successful with redants.info.')</script>";
                }
            }
            else if($this->serverName == "mahalakshmifinance.000webhostapp.com"){
                    $this->serverName = "localhost";
                    $this->username = "id6062084_admin";
                    $this->password = "12345";
                    $this->dbName = "id6062084_mlf";
                    $this->conn = new mysqli($this->serverName, $this->username, $this->password, $this->dbName);
                    if($this->conn->connect_error){
                        echo "<script>console.log('Connection Failed with 000webhost.com.')</script>";
                    }
                    else{
                        echo "<script>console.log('Connection Successful with 000webhost.com.')</script>";
                    }
            }
            else if($this->serverName == "localhost"){
                $this->conn = new mysqli($this->serverName, $this->username, $this->password, $this->dbName);
                    if($this->conn->connect_error){
                        echo "<script>console.log('Connection Failed with localhost.')</script>";
                    }
                    else{
                        echo "<script>console.log('Connection Successful with localhost.')</script>";
                    }
            }
            else{
                echo "<script>alert('UNABLE TO CONNECT TO THE SERVER.')</script>";
                session_start();
                session_unset();
                session_destroy();
                echo "<script>         window.top.location = '../index.php';     </script>";
                die();
            }
               
        }

        function insert($tableName,$columnNames,$values){
            //INSERT INTO `users` (`user_id`, `user_pwd`) VALUES ('user_i', '12345');

            $sqlQry = "INSERT INTO ".$tableName." ".$columnNames." VALUES ".$values.";";

            echo "<script>console.log('".$sqlQry."')</script>";

            if($this->conn->query($sqlQry) === True){
                echo "<script>console.log('Inserted Successfully.')</script>";
            }
            else {
               echo "<script>console.log('Error: " . $sqlQry . mysqli_error($this->conn)."')</script>";
            }
        }

        function update($tableName,$columnName,$value,$fndByColumnName=null,$findByValue=null){
            //UPDATE users SET user_pwd='password' WHERE user_id='user_i'

            if($fndByColumnName==null){
                $sqlQry = "UPDATE ".$tableName." SET ".$columnName."=".$value." WHERE 1;";
            }
            else{
                $sqlQry = "UPDATE ".$tableName." SET ".$columnName."=".$value." WHERE ".$fndByColumnName."=".$findByValue.";";
            }
            

            echo "<script>console.log('".$sqlQry."')</script>";
            
            if($this->conn->query($sqlQry) === True){
                echo "<script>console.log('Updated Successfully.')</script>";
            }
            else {
                echo "<script>console.log('Error: " . $sqlQry . mysqli_error($this->conn)."')</script>";
            }

        }

        function delete($tableName,$findByColumnName,$findByValue){
            //DELETE FROM table_name WHERE some_column = some_value

            $sqlQry = "DELETE FROM ".$tableName." WHERE ".$findByColumnName."=".$findByValue.";";

            ////echo "<script>console.log('".$sqlQry."')</script>";
            
            if($this->conn->query($sqlQry) === True){
                echo "<script>console.log('Deleted Successfully.')</script>";
            }
            else {
                echo "<script>console.log('Error: " . $sqlQry . mysqli_error($this->conn)."')</script>";
            }

        }

        function fetch($tableName,$columnNames = '*'){
            // SELECT column_name(s) FROM table_name
            // SELECT * FROM table_name

            $sqlQry = "SELECT ".$columnNames." FROM ".$tableName.";";
            
            echo "<script>console.log('".$sqlQry."')</script>";

            $result = $this->conn->query($sqlQry);

            if($result->num_rows > 0){
                echo "<script>console.log('Fetched Data Successfully.')</script>";
            }
            else {
                echo "<script>console.log('Error: " . $sqlQry . mysqli_error($this->conn)."')</script>";
            }

            return $result;

        }

        function search($tableName,$columnNames,$findByColumnName,$fndByValue){
            // SELECT user,password FROM table_name WHRER user=1
    
            $sqlQry = "SELECT ".$columnNames." FROM ".$tableName." WHERE ".$findByColumnName."=".$fndByValue.";";

            echo "<script>console.log('".$sqlQry."')</script>";
            
            $result = $this->conn->query($sqlQry);

            if($result){
                if($result->num_rows > 0)
                echo "<script>console.log('Searched Data Successfully.')</script>";
            }
            else {
                echo "<script>console.log('Error: " . $sqlQry . mysqli_error($this->conn)."')</script>";
            }
    
            return $result;
    
        }
        function searchByOrder($tableName,$columnNames,$orderByColumnName){
            // SELECT user,password FROM table_name WHRER user=1
    
            $sqlQry = "SELECT ".$columnNames." FROM ".$tableName." ORDER BY ".$orderByColumnName.";";

            echo "<script>console.log('".$sqlQry."')</script>";
            
            $result = $this->conn->query($sqlQry);
    
            if($result->num_rows > 0){
               echo "<script>console.log('Searched Data Successfully.')</script>";
            }
            else {
                echo "<script>console.log('Error: " . $sqlQry . mysqli_error($this->conn)."')</script>";
            }
    
            return $result;
    
        }

        function sqlQury($sqlQry){

            echo "<script>console.log('".$sqlQry."')</script>";
            
            $result = $this->conn->query($sqlQry);

            if($result->num_rows > 0){
               echo "<script>console.log('Query Successful.')</script>";
            }
            else {
                echo "<script>console.log('Error: " . $sqlQry . mysqli_error($this->conn)."')</script>";
            }
    
            return $result;
    
        }


        function __destruct(){
            $this->conn->close();
            echo "<script>console.log('Connection Closed.')</script>";
        }

    }
?>