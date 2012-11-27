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
<title>Demo of Three Multiple drop down list box from plus2net</title>
<meta name="GENERATOR" content="Arachnophilia 4.0">
<meta name="FORMATTER" content="Arachnophilia 4.0">
<SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value; 
self.location='dd3.php?cat=' + val ;
}
function reload3(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value; 
var val2=form.subcat.options[form.subcat.options.selectedIndex].value; 

self.location='dd3.php?cat=' + val + '&cat3=' + val2 ;
}

</script>
</head>

<body>
<?


///////// Getting the data from Mysql table for first list box//////////
$quer2=mysql_query("SELECT DISTINCT category,cat_id FROM category order by category"); 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
$cat=$_GET['cat']; // This line is added to take care if your global variable is off
if(isset($cat) and strlen($cat) > 0){
$quer=mysql_query("SELECT DISTINCT subcategory,subcat_id FROM subcategory where cat_id=$cat order by subcategory"); 
}else{$quer=mysql_query("SELECT DISTINCT subcategory,subcat_id FROM subcategory order by subcategory"); } 
////////// end of query for second subcategory drop down list box ///////////////////////////


/////// for Third drop down list we will check if sub category is selected else we will display all the subcategory3///// 
$cat3=$_GET['cat3']; // This line is added to take care if your global variable is off
if(isset($cat3) and strlen($cat3) > 0){
$quer3=mysql_query("SELECT DISTINCT subcat2 FROM subcategory2 where subcat_id=$cat3 order by subcat2"); 
}else{$quer3=mysql_query("SELECT DISTINCT subcat2 FROM subcategory2 order by subcat2"); } 
////////// end of query for third subcategory drop down list box ///////////////////////////


echo "<form method=post name=f1 action='dd3ck.php'>";
//////////        Starting of first drop downlist /////////
echo "<select name='cat' onchange=\"reload(this.form)\"><option value=''>Select one</option>";
while($noticia2 = mysql_fetch_array($quer2)) { 
if($noticia2['cat_id']==@$cat){echo "<option selected value='$noticia2[cat_id]'>$noticia2[category]</option>"."<BR>";}
else{echo  "<option value='$noticia2[cat_id]'>$noticia2[category]</option>";}
}
echo "</select>";
//////////////////  This will end the first drop down list ///////////

//////////        Starting of second drop downlist /////////
echo "<select name='subcat' onchange=\"reload3(this.form)\"><option value=''>Select one</option>";
while($noticia = mysql_fetch_array($quer)) { 
if($noticia['subcat_id']==@$cat3){echo "<option selected value='$noticia[subcat_id]'>$noticia[subcategory]</option>"."<BR>";}
else{echo  "<option value='$noticia[subcat_id]'>$noticia[subcategory]</option>";}
}
echo "</select>";
//////////////////  This will end the second drop down list ///////////


//////////        Starting of third drop downlist /////////
echo "<select name='subcat3' ><option value=''>Select one</option>";
while($noticia = mysql_fetch_array($quer3)) { 
echo  "<option value='$noticia[subcat2]'>$noticia[subcat2]</option>";
}
echo "</select>";
//////////////////  This will end the third drop down list ///////////


echo "<input type=submit value='Submit the form data'></form>";
?>
<center><br><br><a href=dd3.zip>Download the code of this demo</a> &nbsp;|&nbsp;<a href=dump_dd3.txt>Download the SQL dump file for this demo</a><br><br>
<a href='http://www.plus2net.com'>PHP SQL HTML free tutorials and scripts</a></center> 
</body>

</html>