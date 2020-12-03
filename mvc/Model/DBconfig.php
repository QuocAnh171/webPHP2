<?php
	class Database{
		private $servername = 'localhost';
		private $username = 'root';
		private $password = 'vertrigo';
		private $dbname = 'customers';

		private $conn = NULL;
		private $result = NULL;

		public function connect()
		{
			$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
			if (!$this->conn) {
				echo "Kết nối thất bại";
				exit();
			}
			else{
				mysqli_set_charset($this->conn, 'utf8');
			}
			return $this->conn;
		}

		// function thực thi truy vấn
		public function execute($sql)
		{
			$this->result = $this->conn->query($sql);
			return $this->result;
		}

		// phương thức lấy dữ liệu
		public function getData()
		{
			if ($this->result) {
				$data = mysqli_fetch_array($this->result);
			}
			else{
				$data = 0;
			}
			return $data;
		}

		// phương thức lấy dữ liệu cần sửa theo ID:
		public function getDataID($table,$id)
		{
			$sql = "SELECT * FROM $table WHERE id ='$id'";
			$this->execute($sql);
			if ($this->num_rows()!= 0 ) {
				$data = mysqli_fetch_array($this->result);
			}
			else{
				$data = 0;
			}
			return $data;
		}


		// phương thức lấy toàn bộ dữ liệu
		public function getAllData($table)
		{
			$sql = "SELECT * FROM $table";
			$this->execute($sql);
			if ($this->num_rows()==0) {
				$data = 0;
			}
			else{
				while ($datas = $this->getData())
				{
					$data[] = $datas;
				}
			}
			return $data;
		}

		// Phương thức đếm số bản ghi:
		public function num_rows()
		{
			if ($this->result) {
				$num = mysqli_num_rows($this->result);
			}
			else{
				$num =0;
			}
			return $num;
		}

		// phương thức thêm dữ liệu:
		public function InsertData($title, $description, $image, $status)
		{
			$sql = "INSERT INTO myguests(id, title, description, image, status, creat_at, update_at)VALUES(null, '$title', '$description', '$image', '$status',null,null)";
			return $this->execute($sql);
		}

		// Phương thức sửa dữ liệu
		public function UpdateData($id, $title, $description, $image, $status)
		{
			$sql = "UPDATE myguests SET title = '$title', description = '$description', image = '$image', status = '$status' WHERE id = '$id'";
			return $this->execute($sql);
		}

		// Phương thức xóa
		public function Delete($id,$table)
		{
			$sql = "DELETE FROM $table WHERE id = '$id'";
			return $this->execute($sql);
		}
	}
?>