<?php
/*------------------------------------------------------------------------------------------
     DB Browser

     ©PhpToys 2006
     http://www.phptoys.com

     Released under the terms and conditions of the
     GNU General Public License (http://gnu.org).

     $Revision: 1.0 $
     $Date: 2006/06/22 $
     $Author: PhpToys $
     
     USAGE:
          Just copy the file to your webserver and load it.
--------------------------------------------------------------------------------------------*/
session_start();
$sitemode = 0;    
$sqlerror = "";

if (isset($_GET['mode'])) $sitemode=$_GET['mode'];
if (isset($_GET['db']))   { $dbname=$_GET['db']; $_SESSION['dbname']=$dbname;}
if (isset($_GET['table']))   { $tablename=$_GET['table']; $_SESSION['table']=$tablename;}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
  <title>DB Browser</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <div id="ctr">
    <div class="login">
		<div class="lform">
          <div class="text">Database Browser</div><br/>
			<div class="fblock">
                <?php if (($sitemode == 0) && (!isset($_POST['submitdb']))){ ?>
                
			      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="convertForm">
                    <table width="100%" >
                     <tr align=left>
                       <td class="text">Hostname:</td>
                       <td><input name="hostname" value="localhost" /></td>
                     </tr>
                     <tr align=left>
                       <td class="text">User name:</td>
                       <td><input name="username" value="" /></td>
                     </tr>
                     <tr align=left>
                       <td class="text">Password:</td>
                       <td><input name="password" type="password" value="" /></td>
                     </tr>
                     <tr>
                       <td style="text-align: center;" colspan="2"><br/><input type="submit" name="submitdb" value="Show databases" /></td>
                     </tr>
                   </table>
 			     </form>
                 
                <?php } if (($sitemode == 0) && (isset($_POST['submitdb']))){
                    $hostname = $_POST['hostname']; 
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $_SESSION['hostname']=$hostname;
                    $_SESSION['username']=$username;
                    $_SESSION['password']=$password;
                    
                    $link = mysql_connect($hostname, $username, $password);
                    if (!$link) die('Could not connect: ' . mysql_error());
                    $sitemode=1;
                 
                } if ($sitemode == 1) { 
                    $result = mysql_query('SHOW databases');
                    if (!$result) die('Invalid query: ' . mysql_error());
                    
                    echo '<table width="300"><tr><th width="100">Nr.</th><th>Database name:</th></tr>';
                    $i=1;
                    while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
                        echo '<tr><td align="center">'.$i.'</td><td align="left"><a href="'.$_SERVER['PHP_SELF'].'?mode=2&amp;db='.$row[0].'">'.$row[0].'</a></td></tr>';
                        $i++;
                    }
                    echo "</table>";

                    mysql_free_result($result);    
                    mysql_close($link);                
                } if ($sitemode == 2) {
                    $link = mysql_connect($_SESSION['hostname'],$_SESSION['username'] ,$_SESSION['password'] );
                    if (!$link) die('Could not connect: ' . mysql_error());
                    mysql_select_db($_SESSION['dbname']);
                    $result = mysql_query('SHOW tables');
                    if (!$result) die('Invalid query: ' . mysql_error());
                    
                    echo '<table width="300"><tr><th width="100">Nr.</th><th>Tables in '.$_SESSION['dbname'].':</th></tr>';
                    $i=1;
                    while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
                        echo '<tr><td align="center">'.$i.'</td><td align="left"><a href="'.$_SERVER['PHP_SELF'].'?mode=3&amp;table='.$row[0].'">'.$row[0].'</a></td></tr>';
                        $i++;
                    }
                    echo "</table>";

                    mysql_free_result($result);                    
                    mysql_close($link);                
                } if ($sitemode == 3) {
                    $link = mysql_connect($_SESSION['hostname'],$_SESSION['username'] ,$_SESSION['password'] );
                    if (!$link) die('Could not connect: ' . mysql_error());
                    mysql_select_db($_SESSION['dbname']);
                    $result = mysql_query('SELECT * FROM '.$_SESSION['table']);
                    if (!$result) die('Invalid query: ' . mysql_error());
                    
                    echo '<table width="100%" cellspacing="0" cellpadding="0">';
                    $i=1;
                    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                        if ($i==1){
                          echo '<tr>';
                          foreach ($row as $name => $value) {
                            echo '<th class="th1"> '.$name.' </th>'; 
                          }
                          echo '</tr>'; 
                        }
                        
                        echo '<tr>';
                        foreach ($row as $name => $value) {
                            if ( $value == "" ) $value="&nbsp;";
                            echo '<td class="td1"> '.$value.' </td>'; 
                        }
                        echo '</tr>'; 
                        $i++;
                    }
                    
                    if ($i==1){
                        echo "No record was found!";
                    }
                    
                    echo "</table>";

                    mysql_free_result($result);                    
                    mysql_close($link);                
                }
                ?> 
			</div>
          <div class="text2">Micro Database Browser 1.1</div><br/>
		</div>
	</div>
  </div>
</body>

</html>
