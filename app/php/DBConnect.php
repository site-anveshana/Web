<?php



	class DBConnect

	{

		var $server="localhost";

		var $user="root";

		var $pass="";

		var $db="sasiac_anveshana";

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

				//echo "No DB connected";

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



		function delete($sql)

		{

			return $this->conn->query($sql);

		}



		function update($sql)

		{

			return $this->conn->query($sql);

		}



		function read($sql)

		{

			$data=$this->conn->query($sql);

			return $data;

		}

	}

?>