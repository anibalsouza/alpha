<?php // setup.php


//			$dbhost = 'br-cdbr-azure-south-a.cloudapp.net';
//			$dbname = 'alphayDB';
//			$dbuser = 'bbc3af3243c6e0';
//			$dbpass = '4fb8cadb'; 

			$dbhost = 'alphadb.ccpdawycehrd.us-west-2.rds.amazonaws.com';
			$dbname = 'AlphaDB';
			$dbuser = 'AlphaUSER_45';
			$dbpass = 'an987kjhg$5%6*';


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
  function upDateTable ($name, $fieldname, $newdata, $keyid, $keyvalue)
  {
    //queryMysql("UPDATE $name SET $fieldname = '$newdata' WHERE $keyid = '$keyvalue'");
    queryMysql("UPDATE $name SET $fieldname = '$newdata' WHERE $keyid = '$keyvalue'");
  }
  
  	upDateTable('usuario','equipe_id','1','equipe_id','11');
    upDateTable('usuario','equipe_id','2','equipe_id','21');

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
//					insertInTable('usuario','1','Armandinho','Armando Admilson','armando@equipea.com','11','1','1234','72872844724','Rua A','100','Apto 11','5050101','21113333','921113333',' ',' ','1',' ',' ',' ',' ',' ');				
//				insertInTable('userType','0', 'master_admin' );
//				insertInTable('userType','1', 'admin' );
//				insertInTable('userType','2', 'professor' );
//				insertInTable('userType','3', 'aluno' );
//				upDateTable('userType','id','3','nome','admin');

//queryMysql("ALTER TABLE usuario MODIFY cpf VARCHAR(100)");




/*queryMysql ("INSERT INTO usuario (nome_conhecido, nome_completo, email, equipe_id, user_type, pass, cpf, endereco_rua, endereco_numero, endereco_complemento, endereco_cep, telefone_residencial, telefone_celular, objetivo, historico, gaming_level, observacoes_medicas, registro_professor, plano_id, status_pagamento, sexo) VALUES
('Armandinho', 'Armando Admilson', 'armando@equipea.com', '11', '1', '1234', '72872844724', 'Rua A', '100', 'Apto 11', '5050101', '21113333', '921113333', ' ', ' ', '1', ' ', ' ', ' ', ' ', ' '),
('Bernardinho', 'Bernardo Admilson', 'bernardo@equipeb.com', '21', '1', '1234', '83776162627', 'Rua B', '200', 'Apto 22', '5050202', '22223333', '922223333', ' ', ' ', '1', ' ', ' ', ' ', ' ', ' '),
('Aloizio', 'Aloizio Profeta', 'aloizio@equipea.com', '11', '2', '1234', '72872844724', 'Rua A', '100', 'Apto 11', '5050101', '21113333', '921113333', ' ', ' ', '1', ' ', ' ', ' ', ' ', ' '),
('Andre', 'Andre Alonzo', 'andre@equipea.com', '11', '3', '1234', '72872844724', 'Rua A', '100', 'Apto 11', '5050101', '2111333', '921113333', 'Objetivo de Andre', 'Histórico de Andre', '1', 'Observações médicas de Andre', 'Registro do Professor para o Andre', '1', 'Status do Pagamento do Plano A do Andre', ' '),
('Alex', 'Alex Alonzo', 'alex@equipea.com', '11', '3', '1234', '72872844724', 'Rua A', '100', 'Apto 11', '5050101', '2111333', '921113333', 'Objetivo de Alex', 'Histórico de Alex', '1', 'Observações médicas de Alex', 'Registro do Professor para o Alex', '1', 'Status do Pagamento do Plano A do Alex', ' '),
('Anderson', 'Anderson Alonzo', 'anderson@equipea.com', '11', '3', '1234', '72872844724', 'Rua A', '100', 'Apto 11', '5050101', '2111333', '921113333', 'Objetivo de Anderson', 'Histórico de Anderson', '1', 'Observações médicas de Anderson', 'Registro do Professor para o Anderson', '1', 'Status do Pagamento do Plano A do Anderson', ' '),
('Baltazar', 'Baltazar Profeta', 'baltazar@equipeb.com', '21', '2', '1234', '83776162627', 'Rua B', '200', 'Apto 22', '5050202', '22223333', '922223333', ' ', ' ', '1', ' ', ' ', ' ', ' ', ' '),
('Benedito', 'Benedito Profeta', 'benedito@equipeb.com', '21', '2', '1234', '83776162627', 'Rua B', '200', 'Apto 22', '5050202', '22223333', '922223333', ' ', ' ', '1', ' ', ' ', ' ', ' ', ' '),
('Bruno', 'Bruno Alonzo', 'bruno@equipeb.com', '21', '3', '1234', '72872844724', 'Rua B', '100', 'Apto 22', '5050202', '22223333', '922223333', 'Objetivo de Bruno', 'Histórico de Bruno Alonzo', '1', 'Observações médicas de Bruno Alonzo', 'Registro do Professor para o Bruno Alonzo', '1', 'Status do Pagamento do Plano A do Bruno Alonzo', ' '),
('Bia', 'Bia Alonzo', 'bia@equipeb.com', '21', '3', '1234', '72872844724', 'Rua B', '100', 'Apto 22', '5050202', '22223333', '922223333', 'Objetivo de Bia Alonzo', 'Histórico de Bia Alonzo', '1', 'Observações médicas de Bia Alonzo', 'Registro do Professor para Bia Alonzo', '1', 'Status do Pagamento do Plano A de Bia Alonzo', ' '),
('Beto', 'Beto Alonzo', 'beto@equipeb.com', '21', '3', '1234', '72872844724', 'Rua B', '100', 'Apto 22', '5050202', '22223333', '922223333', 'Objetivo de Beto Alonzo', 'Histórico de Beto Alonzo', '1', 'Observações médicas de Beto Alonzo', 'Registro do Professor para Beto Alonzo', '1', 'Status do Pagamento do Plano A de Beto Alonzo', ' '),
('Antonio', 'Antonio Profeta', 'antonio@equipea.com', '11', '2', '1234', '83776162627', 'Rua A', '100', 'Apto 11', '5050101', '21113333', '921113333', ' ', ' ', '1', ' ', ' ', ' ', ' ', ' '),
('teste', 'teste', 'teste', ' ', '3', 'teste', '123', 'teste', '123', '123', '123', '123', '123', '132', '132', '132', '132', '132', '132', '123', ' ')");  


queryMysql ("INSERT INTO equipe (nome, usuario_id) VALUES
('Equipe A', '1'),
('Equipe B', '2')");
*/
				createTable ('usuario',
				'id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,  
				nome_conhecido VARCHAR(20) NOT NULL, 		/*Campo de Usuario*/
				nome_completo VARCHAR(60), 							/*Campo de Usuario*/
				email VARCHAR(60), 											/*Campo de Usuario*/
				equipe_id TINYINT UNSIGNED, 						/*Campo de Usuario*/
				user_type TINYINT UNSIGNED, 						/*Campo de Usuario*/
				pass VARCHAR(16), 											/*Campo de Usuario*/
				cpf CHAR(100), 													/*Campo de Usuario*/
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
				sexo VARCHAR (100),											/*Campo de Usuario*/
			
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
/*
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