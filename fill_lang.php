<!DOCTYPE html>
<html>
<body>

<p id="demo"></p>
<input name="car" list="anrede" id="text" />
<datalist id="anrede"></datalist>
<input type="submit" name="Submit" onclick="checkLang();"> 
<script>
var xhttp;
var x = document.getElementById("mySelect");
var option = document.createElement("option");



xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myFunction(this);
    }
};
xhttp.open("GET", "languages.xml", true);
xhttp.send();
var all_language = new Array();
var options = '';

function myFunction(xml) {
    var x, i, txt, xmlDoc; 
    xmlDoc = xml.responseXML;
    txt = "";
    x = xmlDoc.getElementsByTagName("language");
    for (i = 0; i < x.length; i++) { 

        
        all_language[i]=x[i].childNodes[0].nodeValue;
        options += '<option value="'+all_language[i]+'" />';       
        
    }

    document.getElementById('anrede').innerHTML = options;

}

function checkLang()
    {
        const lang_array = all_language;
        const lang_value = document.getElementById('text').value;
        const isInArray = lang_array.includes(lang_value);
        
        if((isInArray) == false){

            alert('Please select from the list below');

        }  // Check whether the value is in the list or not

        else{

            alert('Success');
        }
    
}



</script>
</body>
</html>
