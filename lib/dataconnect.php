<?php

class dbOperations
{
	function fncConnect()
	{
		try {
			$config = parse_ini_file('includes/config.ini');
			
			$host = $config['host'];
			$user = $config['user'];
			$pass = $config['pass'];
			$db = $config['dbName'];
			
			$conncet = mysqli_connect($host,$user,$pass);
			if(!$conncet) {
				die('Wrong Conncetion String');
			}
			$dbSelect = mysqli_select_db($conncet, $db);
		} catch(exception $e) {
			echo $e->get_message();
		}
		return $conncet;
	}
	
	function fncInsertUpdate($tableName, $tableData=array(), $where = "")
	{
		
		$conection = $this->fncConnect();
		if(!empty($tableName) && !empty($tableData))
		{
			$fields = '';
			$data='';
			
			if ($where == "") 
			{
				$sql = "INSERT INTO ";
			}
			else 				
			{
				$sql = "UPDATE ";
			}
			$sql .= "$tableName SET ";
									
			foreach ($tableData as $tblField => $tblValue)
			{
				$fields .= $tblField.",";
				$data .= "'".$tblValue."',";
		
				$sql .= "$tblField = '{$tblValue}' ,";
			}
			//echo 'hi:-'."$sql"."</br>";
				$sql = rtrim($sql,',');
				//echo 'hi:-'."$sql";
			
			if ($where != "") 
			{
				$sql .=" where $where";
			}
				
				$sql = "INSERT INTO $tableName (".rtrim($fields,',').") values (".rtrim($data,',').");";
				$rsSql = mysqli_query($conection, $sql);
			
			echo "Data Inserted";
			
		} 
		else 
		{
			echo "Data is not proper format. So not Inerted the data.";
		}
	}
}
?>