<?php // setup.php


			$dbhost = 'br-cdbr-azure-south-a.cloudapp.net';
			$dbname = 'alphayDB';
			$dbuser = 'bbc3af3243c6e0';
			$dbpass = '4fb8cadb';
			$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  		if ($connection->connect_error) die($connection->connect_error);

  //###################################################################################################
    function createTable($name, $query)
  {
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br>";
  }

  //###################################################################################################
  function insertInTable ($name, $id, $values)		  
  {
    queryMysql("INSERT INTO $name VALUES('$id','$values')");
  }
 /*###################################################################################################
  *Parametros para Inclui Coluna: 
  *$name, Nome da Tabela
  *$coluna, nome da coluna
  *$$dataType, tipo de dado (ex. smallint unsigned)
	*/
	function incluiColuna ($name, $coluna, $dataType)
	{
		queryMysql("ALTER TABLE $name ADD $coluna $dataType");
	}
	
	 /*###################################################################################################
  *Parametros para Exclui Coluna: 
  *$name, Nome da Tabela
  *$coluna, nome da coluna
  *$$dataType, tipo de dado (ex. smallint unsigned)
	*/
	function excluiColuna ($name, $coluna)
	{
		queryMysql("ALTER TABLE $name DROP $coluna");
	}
	
	 /*###################################################################################################
  *Parametros para Altera dataType de coluna: 
  *$name, Nome da Tabela
  *$coluna, nome da coluna
  *$$dataType, tipo de dado (ex. SMALLINT UNSIGNED)
	*/
	function alteraDataType ($name, $coluna, $dataType)
	{
		queryMysql("ALTER TABLE $name MODIFY $coluna $dataType");
	}
	
 /*###################################################################################################
  * Parametros para UpDate Table: 
  *$name, Nome da Tabela
  *$keyid Nome do campo chave
  *$keyvalue, Valor do campo chave para comparação
  *$fieldname, nome do campo a ser alterado
  *$newdata novo valor do c
  */
  function upDateTable ($name, $keyid,$keyvalue, $fieldname, $newdata)
  {
    queryMysql("UPDATE $name SET $fieldname = '$newdata' WHERE $keyid = '$keyvalue'");
  }
  
     /*###################################################################################################
*/
    function viewTables ()
  {
		$dbhost = 'br-cdbr-azure-south-a.cloudapp.net';
		$dbname = 'alphayDB';
		$dbuser = 'bbc3af3243c6e0';
		$dbpass = '4fb8cadb';
		$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  	
  	$link = mysql_connect($dbhost, $dbuser, $dbpass);
		mysql_select_db($dbname, $link);
  	
  	$result = mysql_list_tables($dbname);

		for ($i = 0; $i < mysql_num_rows($result); $i++) {
    	echo "Table: ", mysql_tablename($result, $i), "<br>";
    	viewTable(mysql_tablename($result, $i));
    //																																			    	echo  "queryMysql(::DROP TABLE ", mysql_tablename($result, $i), "::);<br>";	
		}
  }
  
   /*###################################################################################################
  * Parametros para visualizar Table: 
  *$name, Nome da Tabela
  */
  function viewTable ($name)
  {
		$dbhost = 'br-cdbr-azure-south-a.cloudapp.net';
		$dbname = 'alphayDB';
		$dbuser = 'bbc3af3243c6e0';
		$dbpass = '4fb8cadb';
		$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  	
  	$link = mysql_connect($dbhost, $dbuser, $dbpass);
		mysql_select_db($dbname, $link);
  	
   	$query = "SELECT * FROM $name";
		$result = mysql_query($query, $link);
		$rows = mysql_num_rows($result);
    $columns = mysql_num_fields($result); 
 		echo "linhas = ".$rows."<br>"; 
 		echo "colunas = ".$columns."<br>";
 		
 		echo "<table border = '1'><tr>";
 		for ($k = 0 ; $k < $columns ; ++$k)
 		  		echo "<th>".mysql_field_name($result, $k)."</th>";
 		echo "</tr>";
 		for ($j = 0 ; $j < $rows ; ++$j){
 			$row = mysql_fetch_row($result);
 			echo "<tr>";
			for ($k = 0 ; $k < $columns ; ++$k)
				echo "<td>".$row[$k]."</td>";
 		echo "</tr>";
 		}
 		echo "</table>  <br> <br> <br>";
  }
  
  
  //###################################################################################################
  function queryMysql($query)
  {
    global $connection;
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    return $result;
  }
  
  function criaSql ($filename)
  {
  		$templine = '';
			// Read in entire file
			$lines = file($filename);
			// Loop through each line

			foreach ($lines as $line_num => $line) {
				echo "Ok Linha $line_num - File $filename<br>";
				// Only continue if it's not a comment
				if (substr($line, 0, 2) != '--' && $line != '') {
					// Add this line to the current segment
					$templine .= $line;
					// If it has a semicolon at the end, it's the end of the query
					if (substr(trim($line), -1, 1) == ';') {
						// Perform the query
						queryMysql($templine) or print('Error performing query \'<b>' . $templine . '</b>\': ' . mysql_error() . '<br /><br />');
						// Reset temp variable to empty
						$templine = '';
					}
				}
			}
  }
  
//###################################################################################################
				
				
//					criaSql("/home/ubuntu/workspace/protected/modules/bum/install/install.v3.MySQL.sql");
//					criaSql("/home/ubuntu/workspace/protected/modules/bum/install/schema-mysql.sql");
					viewTables();
//				queryMysql("DROP TABLE papel");
//				queryMysql("DROP TABLE aluno");
//				queryMysql("DROP TABLE professor");
//				queryMysql("DROP TABLE userType");
//				queryMysql("DROP TABLE equipe");
//				queryMysql("DROP TABLE usuario");
				
/*				createTable ('userType',
				'type_id TINYINT UNSIGNED PRIMARY KEY,
				name VARCHAR (20)
				');*/
				
//				insertInTable('userType','0', 'master_admin' );
//				insertInTable('userType','1', 'admin' );
//				insertInTable('userType','2', 'professor' );
//				insertInTable('userType','3', 'aluno' );
//				upDateTable('userType','id','3','nome','admin');

//				incluiColuna('read', 'sexo', 'CHAR(10)');
//				excluiColuna('usuario', 'ehAdmin' );

		//viewTables();

//queryMysql("SET FOREIGN_KEY_CHECKS=0");



//queryMysql("SET FOREIGN_KEY_CHECKS=1");
					
		
					


?>