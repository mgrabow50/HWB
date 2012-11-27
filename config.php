<?php

//////////// Change the data part only with your database login details /////////////////
$dbservertype='mysql';
// hostname or ip of server
$servername='hwbllcdb.db.9008530.hostedresource.com';
// username and password to log onto db server
$dbusername='hwbllcdb';
$dbpassword='M3xN32q';
$dbname='hwbllcdb';

//////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////
////// DONOT EDIT BELOW  /////////
///////////////////////////////////////

connecttodb($servername,$dbname,$dbusername,$dbpassword);
function connecttodb($servername,$dbname,$dbuser,$dbpassword)
{
global $conn;
$conn=mysql_connect ("$servername","$dbuser","$dbpassword");
if(!$conn){die("Could not connect to MySQL");}
mysql_select_db("$dbname",$conn) or die ("could not open db".mysql_error());
}
?>