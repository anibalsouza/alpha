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
    queryMysql("CREATE TABLE IF NOT EXISTS $name ($query) ENGINE=MyISAM DEFAULT CHARSET=utf8");
    echo "Table '$name' created or already exists.<br>";
  }

  //###################################################################################################
  function insertInTable ($name, $id, $values)		  
  {
    queryMysql("INSERT INTO $name VALUES('$id','$values')");
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
  
  //###################################################################################################
  function queryMysql($query)
  {
    global $connection;
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    return $result;
  }
  
//###################################################################################################
				
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

				createTable ('usuario',
				'id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,  
				nome_conhecido VARCHAR(20) NOT NULL, 		/*Campo de Usuario*/
				nome_completo VARCHAR(60), 							/*Campo de Usuario*/
				email VARCHAR(60), 											/*Campo de Usuario*/
				equipe_id TINYINT UNSIGNED, 						/*Campo de Usuario*/
				user_type TINYINT UNSIGNED, 						/*Campo de Usuario*/
				pass VARCHAR(16), 											/*Campo de Usuario*/
				cpf CHAR(11), 													/*Campo de Usuario*/
				endereco_rua VARCHAR(100), 							/*Campo de Usuario*/
				endereco_numero SMALLINT UNSIGNED,			/*Campo de Usuario*/
				endereco_complemento VARCHAR(20),				/*Campo de Usuario*/
				endereco_cep BIGINT UNSIGNED,						/*Campo de Usuario*/
				telefone_residencial BIGINT UNSIGNED,		/*Campo de Usuario*/
				telefone_celular BIGINT UNSIGNED,				/*Campo de Usuario*/
				ehAdmin TINYINT UNSIGNED,								/*Campo de Professor*/
				objetivo VARCHAR (100), 								/*Campo de Aluno*/
				historico VARCHAR (100),								/*Campo de Aluno*/
				gaming_level TINYINT UNSIGNED DEFAULT 1,/*Campo de Aluno*/
				observacoes_medicas VARCHAR (100),			/*Campo de Aluno*/
				registro_professor VARCHAR (100),				/*Campo de Aluno*/
				plano_id SMALLINT,											/*Campo de Aluno*/
				status_pagamento VARCHAR (100),					/*Campo de Aluno*/
				
				INDEX (nome_conhecido)									
				');
				
				createTable ('equipe',
				'id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
				nome VARCHAR(60) NOT NULL,
				usuario_id MEDIUMINT UNSIGNED, 
				CONSTRAINT fk_equipe_usuario
					FOREIGN KEY (usuario_id)
					REFERENCES usuario (id)
					ON DELETE CASCADE
					ON UPDATE RESTRICT
				' );

				//Abaixo NÃO Funciona!!! Fiz Query direto no App do iPhone para criar a base. usando o yii-messages/data/messages.
				createTable ('messages', 
  			'id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  			sender_id int(11) NOT NULL,
  			receiver_id int(11) NOT NULL,
  			subject varchar(256) NOT NULL DEFAULT "",
  			body text,
  			is_read enum("0","1") NOT NULL DEFAULT 0,
  			deleted_by enum("sender","receiver") DEFAULT NULL,
  			created_at datetime NOT NULL,
				KEY sender (sender_id)
  			KEY receiver (receiver_id)
				');
					

/*				createTable ('aluno',
				'usuario_id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
				objetivo_id VARCHAR (100), 
				historico VARCHAR (100),
				gaming_level TINYINT UNSIGNED DEFAULT 1,
				observacoes_medicas VARCHAR (100),
				registro_professor VARCHAR (100),
				plano_id SMALLINT,
				status_pagamento VARCHAR (100),
				CONSTRAINT fk_aluno_usuario
					FOREIGN KEY (usuario_id)
					REFERENCES usuario (id )
					ON DELETE CASCADE
					ON UPDATE RESTRICT
				');

				createTable ('professor',
				'usuario_id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
				titulo VARCHAR(20),
				CONSTRAINT fk_professor_usuario
					FOREIGN KEY (usuario_id)
					REFERENCES usuario (id)
					ON DELETE CASCADE
					ON UPDATE RESTRICT
				');

				createTable ('administrador',
				'usuario_id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
				CONSTRAINT fk_administrador_usuario
					FOREIGN KEY (usuario_id)
					REFERENCES usuario (id)
					ON DELETE CASCADE
					ON UPDATE RESTRICT
				');*/


/*  createTable ('plano',
				'id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
				nome VARCHAR(60) NOT NULL,
				equipe_id TINYINT UNSIGNED NOT NULL,
				descricao VARCHAR (1000),
				CONSTRAINT fk_plano_equipe
					FOREIGN KEY (equipe_id)
					REFERENCES equipe (id)
					ON DELETE CASCADE
					ON UPDATE RESTRICT
				');

  createTable ('empresa_parceira',
				'id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
				nome VARCHAR(60) NOT NULL,
				usuario_id MEDIUMINT
				');

  createTable ('objetivo',
				'id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
				nome VARCHAR(60) NOT NULL,
				descricao VARCHAR (1000)
				');

 Exmplos a seguir
  createTable('members',
              'user VARCHAR(16),
              pass VARCHAR(16),
              INDEX(user(6))');

  createTable('messages', 
              'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              auth VARCHAR(16),
              recip VARCHAR(16),
              pm CHAR(1),
              time INT UNSIGNED,
              message VARCHAR(4096),
              INDEX(auth(6)),
              INDEX(recip(6))');

  createTable('friends',
              'user VARCHAR(16),
              friend VARCHAR(16),
              INDEX(user(6)),
              INDEX(friend(6))');

  createTable('profiles',
              'user VARCHAR(16),
              text VARCHAR(4096),
              INDEX(user(6))');
                           */
?>