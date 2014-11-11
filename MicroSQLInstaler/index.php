<?php
/*------------------------------------------------------------------------------------------
     Micro DB Installer

     �PhpToys 2007
     http://www.phptoys.com

     Released under the terms and conditions of the
     GNU General Public License (http://gnu.org).

     $Revision: 1.0 $
     $Date: 2007/09/05 $
     $Author: PhpToys $
     
     USAGE:
          Just copy the files to your webserver with a valid sql file.
          You can configure the sql file name by changing the $sqlFileToExecute
          variable.
--------------------------------------------------------------------------------------------*/
$sqlErrorText = '';
$sqlErrorCode = 0;
$sqlStmt      = '';
//$sqlFileToExecute = 'Scripts/install.v3.MySQL.sql';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Micro DB Installer</title>
   <link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="main">
      <div class="caption">MICRO DB INSTALLER</div>
      <div id="icon">&nbsp;</div>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="dbdata">
        <table width="100%">
          <tr><td>Hostname:</td><td><input class="text" name="hostname" type="text" size="20" value="br-cdbr-azure-south-a.cloudapp.net" /></td></tr>
          <tr><td>Dbname:</td><td><input class="text" name="dbname" type="text" size="20" value="alphayDB" /></td></tr>
          <tr><td>Username:</td><td> <input class="text" name="username" type="text" size="20" value="bbc3af3243c6e0" /></td></tr>
          <tr><td>Password:</td><td> <input class="text" name="password" type="text" size="20" value="4fb8cadb" /></td></tr>
          <tr><td>File:</td><td> <input class="text" name="file" type="text" size="20" value="Scripts/" /></td></tr>
          <tr><td align="center" colspan="2"><br/><input class="text" type="submit" name="submitBtn" value="Install" /></td></tr>
        </table>  
      </form>
<?php    
    if (isset($_POST['submitBtn'])){
        $host = isset($_POST['hostname']) ? $_POST['hostname'] : '';
        $dbname = isset($_POST['dbname']) ? $_POST['dbname'] : '';
        $user = isset($_POST['username']) ? $_POST['username'] : '';
        $pass = isset($_POST['password']) ? $_POST['password'] : '';
        $sqlFileToExecute = isset($_POST['file']) ? $_POST['file'] : '';
        echo "mysql_connect(" . $host . $user . $pass . $dbname . ")"; 

        $con = mysql_connect($host,$user,$pass);
        mysql_select_db($dbname, $con);
        
        if ($con !== false){
           // Load and explode the sql file
           $f = fopen($sqlFileToExecute,"r+");
           $sqlFile = fread($f,filesize($sqlFileToExecute));
           $sqlArray = explode(';',$sqlFile);
           $sqlArray = split('[;$$]', $sqlFile);
           //Process the sql file by statements
           $Linha=0;
           foreach ($sqlArray as $stmt) {
              if (strlen($stmt)>3){
                  echo "Linha: ".$Linha." - ";
                  echo $stmt."<br>";
                  $Linha++;
           	     $result = mysql_query($stmt);
           	     if (!$result){
           	        $sqlErrorCode = mysql_errno();
           	        $sqlErrorText = mysql_error();
           	        $sqlStmt      = $stmt;
           	        break;
           	     }
           	  }
           }
        }

?>
      <div class="caption">RESULT:</div>
      <div id="icon2">&nbsp;</div>
      <div id="result">
        <table width="100%">
<?php
        if ($sqlErrorCode == 0){
           echo "<tr><td>Installation was finished succesfully!</td></tr>";
        } else {
           echo "<tr><td>An error occured during installation!</td></tr>";
           echo "<tr><td>Error code: $sqlErrorCode</td></tr>";
           echo "<tr><td>Error text: $sqlErrorText</td></tr>";
           echo "<tr><td>Statement:<br/> $sqlStmt</td></tr>";
        }
?>
        </table>
     </div>
<?php            
    }
?>
	<div id="source">Micro DB Installer 1.0</div>
    </div>
</body>   
