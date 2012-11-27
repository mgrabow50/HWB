<!-- Original:  Jerome Caron (jerome.caron@globetrotter.net) -->

<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->

refer = new Array(
new Array(
new Array("Movin'On - Nov", "Movin'On - Nov"),
new Array("Movin'On - Dec", "Movin'On - Dec"),
new Array("Other", "Other")
),
new Array(
new Array("Google", "Google"),
new Array("Yahoo", "Yahoo"),
new Array("Bing", "Bing"),
new Array("Facebook", "Facebook"),
new Array("LinkedIn", "LinkedIn"),
new Array("ThomasNet", "ThomasNet"),
new Array("Kelly Search", "Kelly Search"),
new Array("Alta Vista", "Alta Vista"),
new Array("Lycos", "Lycos"),
new Array("Searchalot", "Searchalot"),
new Array("AlltheWeb", "AlltheWeb"),
new Array("Dmoz", "Dmoz"),
new Array("Ask Jeeves", "Ask Jeeves"),
new Array("GigaBlast", "GigaBlast"),
new Array("Other", "Other")
),
new Array(
new Array("                  ", "Mailing")
),
new Array(
new Array("AAPEX 2011", "AAPEX 2011"),
new Array("AAPEX 2012","AAPEX 2012"),
new Array("GATS 2012","GATS 2012"),
new Array("FabTech 2012","FabTech 2012"),
new Array("SpringWorld 2012","SpringWorld 2012"),
new Array("MATS 2013","MATS 2013"),
new Array("HDAW13","HDAW13"),
new Array("Other", "Other")
),
new Array(
new Array("                  ", "Sales Rep")
),
new Array(
new Array("                  ", "Word of Mouth")
),
new Array(
new Array("                  ", "Other")
)
);

function fillSelectFromArray(selectCtrl, itemArray, goodPrompt, badPrompt, defaultItem) {
var i, j;
var prompt;
// empty existing items
for (i = selectCtrl.options.length; i >= 0; i--) {
selectCtrl.options[i] = null; 
}
prompt = (itemArray != null) ? goodPrompt : badPrompt;
if (prompt == null) {
j = 0;
}
else {
selectCtrl.options[0] = new Option(prompt);
j = 1;
}
if (itemArray != null) {
// add new items
for (i = 0; i < itemArray.length; i++) {
selectCtrl.options[j] = new Option(itemArray[i][0]);
if (itemArray[i][1] != null) {
selectCtrl.options[j].value = itemArray[i][1]; 
}
j++;
}
// select first item (prompt) for sub list
selectCtrl.options[0].selected = true;
   }
}//-->
