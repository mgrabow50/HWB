<?php
//***************************************
// This is downloaded from www.plus2net.com //
/// You can distribute this code with the link to www.plus2net.com ///
//  Please don't  remove the link to www.plus2net.com ///
// This is for your learning only not for commercial use. ///////
//The author is not responsible for any type of loss or problem or damage on using this script.//
/// You can use it at your own risk. /////
//*****************************************

require "config.php"; // Your Database details 
?>

<!doctype html public "-//w3c//dtd html 3.2//en">

<html>

<head>
<title>HWB - || Blade Selection Guide ||</title>
<link rel="stylesheet" href="hwb.css" type="text/css" media="screen">
<link rel="stylesheet" href="hwbm.css" type="text/css" media="handheld">
<link rel="icon" href="http://hwbllc.biz/favicon.ico">
<SCRIPT language=JavaScript>
function reload(form)
{
var val=form.make.options[form.make.options.selectedIndex].value; 
self.location='bladeguide.php?make=' + val;
}
function reload2(form)
{
var val=form.make.options[form.make.options.selectedIndex].value; 
var val2=form.model.options[form.model.options.selectedIndex].value; 

self.location='bladeguide.php?make=' + val + '&model=' + val2;
}

function reload3(form)
{
var val=form.make.options[form.make.options.selectedIndex].value; 
var val2=form.model.options[form.model.options.selectedIndex].value; 
var val3=form.year.options[form.year.options.selectedIndex].value; 

self.location='bladeguide.php?make=' + val + '&model=' + val2 + '&year=' + val3;
}
</script>
</head>

<body>
<?php include_once("analyticstracking.php") ?>
<div id="heading">
<img src="images/Logo3.gif" width="753" height="163" alt="Ice-E-Liminator">
</div>

      <div id="topmenu" align="right"> 
	    <a href="index.html">Home</a> 
	    <a href="index.html#pricing">Pricing</a> 
        <a href="#">Blade Selection</a> 
        <a href="contactus.html">Contact Us</a> 
		<a href="troubleshooting.html">Troubleshooting</a> 
      </div>

<h3>Select Make, Model, and Year of your automobile to find the length of Wiper Blade<br>for both the Driver and Passenger side of your vehicle.</h3>

<?


///////// Getting the data from Mysql table for first list box//////////
$quer1=mysql_query("SELECT DISTINCT make FROM blade_guide ORDER BY make"); 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if car make is selected///// 
$make=$_GET['make']; // This line is added to take care if your global variable is off
if(isset($make) and strlen($make) > 0){
$quer2=mysql_query("SELECT DISTINCT model FROM blade_guide WHERE make='$make' ORDER BY model"); 
}
////////// end of query for model drop down list box ///////////////////////////


/////// for Third drop down list we will check if car model is selected///// 
$model=$_GET['model']; // This line is added to take care if your global variable is off
$year=$_GET['year'];
if(isset($model) and strlen($model) > 0){
$quer3=mysql_query("SELECT (CONCAT(from_year, '-', to_year)) as year FROM blade_guide where make='$make' AND model='$model'
  ORDER BY from_year"); 
} 
////////// end of query for ;year drop down list box ///////////////////////////

echo "<div class=\"selectors\">\n";
echo "<form name=\"form1\">\n";

//////////        Starting of first drop downlist /////////
echo "<select name='make' onchange=\"reload(this.form)\"><option value=''>Select one</option>\n";
while($noticia2 = mysql_fetch_array($quer1)) { 
if($noticia2['make']==@$make){
  echo "<option selected value='$noticia2[make]'>$noticia2[make]</option>"."<BR>\n";
}
else{echo  "<option value='$noticia2[make]'>$noticia2[make]</option>\n";}
}
echo "</select>\n";
//////////////////  This will end the first drop down list ///////////

//////////        Starting of second drop downlist /////////
echo "<select name='model' onchange=\"reload2(this.form)\"><option value=''>Select one</option>\n";
while($noticia = mysql_fetch_array($quer2)) { 
if($noticia['model']==@$model){echo "<option selected value='$noticia[model]'>$noticia[model]</option>"."<BR>\n";}
else{echo  "<option value='$noticia[model]'>$noticia[model]</option>\n";}
}
echo "</select>\n";
//////////////////  This will end the second drop down list ///////////


//////////        Starting of third drop downlist /////////
echo "<select name='year' onchange=\"reload3(this.form)\"><option value=''>Select one</option>\n";
while($noticia3 = mysql_fetch_array($quer3)) { 
if($noticia3['year']==@$year){
  echo "<option selected value='$noticia3[year]'>$noticia3[year]</option>"."<BR>\n";}
else{echo  "<option value='$noticia3[year]'>$noticia3[year]</option>\n";}
}
echo "</select>\n";
//////////////////  This will end the third drop down list ///////////

echo "</form>\n";
/*echo "<input type=submit value='Submit the form data'></form>";*/

echo "</div>\n";

if(isset($year)){
  $quer4=mysql_query("SELECT driver, passenger FROM blade_guide WHERE make='$make' AND model='$model' AND 
  (CONCAT(from_year, '-', to_year))='$year'");
  $res=mysql_fetch_array($quer4);
  $driver=$res['driver'];
  $driver.='"';
  $passenger=$res['passenger'];
  $passenger.='"';
}               
else{
  $driver='N/A';
  $passenger='N/A';
}
echo "<div class=\"output\">Driver Side: $driver <br><br>Passenger Side: $passenger</div>";

?>

<p><a href="index.html">Home</a></p>

</body>

</html>