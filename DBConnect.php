<?php

	class DBConnect
	{
		var $server="localhost";
		var $user="redants";
		var $pass="Sasi@123";
		var $db="redants";
		var $conn=null;


		
		function connect()
		{
			$test=$this->conn=new mysqli($this->server,$this->user,$this->pass,$this->db);
			if($test)
			{
				//echo "DB Connected";
			}
			else
			{
				echo "No DB connected";
			}
		}
		

		function sendMail(string $name,string $mes)
		{
			mail("admin@redants.info",$name,$mes);
		}	




		function insert($sql)
		{
			return $this->conn->query($sql);

		}

		function delete(String $sql)
		{
			return $this->conn->query($sql);
		}

		function update(String $sql)
		{
			return $this->conn->query($sql);
		}

		function read(String $sql)
		{
			$data=$this->conn->query($sql);
			return $data;
		}
	}
?>