/*
 * This script contains AJAX methods
 */
var xhr;

//run the init function when the page finishes loading.
window.onload = init;

function init() {
    //disable the autocomplete feature provided by the browser
    document.getElementById('name').setAttribute("autocomplete", "off");
    
    //put the focus into the text box
    document.getElementById('name').focus();

    //create an XMLHttpRequest object by calling the createXmlHttpRequestObject function
    xhr = createXmlHttpRequestObject();
}

//create an XMLHttpRequest object
function createXmlHttpRequestObject()
{
    var xmlHttp;

    if(window.ActiveObject) {  //IE6 and older
        xmlHttp = new ActiveObject("Microsoft.XMLHTTP");
    }
    else if (window.XMLHttpRequest) {  // IE7+, Chrome, Mozilla, Safari, Opera
        xmlHttp = new window.XMLHttpRequest();
    }
    else
        xmlHttp = false;
    
    return xmlHttp;
}

//this function is called after every keystroke
function handleKeyUp(e) {
    // get the event for different browsers
    e = (!e) ? window.event : e;

    //if the up arrow key is pressed
    if(e.keyCode == 38) {
        //add code here to handle up arrow key. e.g. select the previous item
    }
    //if the down arrow key is pressed
    else if (e.keyCode == 40) {
        //add code here to handle down arrow key, e.g. select the next item
    }
    
    //if any other key is pressed, call a function to send an AJAX request
    else
        processXMLHttpRequest();
}
//set and send XMLHttp request
function processXMLHttpRequest() {
    // proceed only if the xmlHttp object isn't busy
    if (xhr.readyState == 4 || xhr.readyState == 0) {
        
        // retrieve the name typed by the user on the form
        name = document.getElementById("name").value;
        
        if (name != "") {  //preceed only if the textbox isn't empty
            // execute an asynchronous request to the server.
            //suggest_url varies depending on the medium object. 
            //this variable receives the value from the view file specific to the medium type.
            xhr.open("GET", suggest_url + name, true);
        
            // specify the function to handle server responses
            xhr.onreadystatechange = handleServerResponse;

            // make the request
            xhr.send(null);
        }
        else //clear the suggestion div if the search textbox is empty
            document.getElementById("suggestionDiv").innerHTML = "";
    } 
    else
        // if the connection is busy, try again after one second
        setTimeout("processXMLHttpRequest()", 1000);
}

// executed automatically when a response is received from the server
function handleServerResponse()
{
    // move forward only if the transaction has completed
    if (xhr.readyState == 4)
    {
        // status of 200 indicates the transaction completed successfully
        if (xhr.status == 200)
        {
            // extract the XML received from the server
            xmlResponse = xhr.responseXML;
            
            // obtain the document element (the root element) of the XML structure
            xmlDocumentElement = xmlResponse.documentElement;
            
            // display suggested names in a div block
            displaySuggestions(xmlDocumentElement.getElementsByTagName("name"));
        }
        // a HTTP status different than 200 signals an error
        else
        {
            alert("There was a problem accessing the server: " + xhr.statusText);
        }
    }
}

/* populates the suggestion box with a table containing all the names retrieved from a XML doc */
function displaySuggestions(xmlDoc) {
    var divContent = "";
    if (xmlDoc.length != 0) {
        
        divContent = "<table>"; //start a new table
        
        //create a new row for each name
        for(i=0;i<xmlDoc.length;i++) {
            //retrive the name from the xml doc
            var name = xmlDoc.item(i).firstChild.data;
            
            divContent += "<tr>";  //start a new row
            divContent += "<td onclick='clickName(this)'>" + name + "</td>";
            divContent += "</tr>"; //finish the row
        }
        
        divContent += "</table>";  //finish the table
    }
    //display the table in the div block
    document.getElementById("suggestionDiv").innerHTML = divContent;
    document.getElementById('suggestionDiv').style.display = 'block';
}

//when a name is clicked, fill the search box with the name and then hide the suggestion list
function clickName(name) {
    //display the name in the search box
    document.getElementById('name').value=name.innerHTML;

    //hide all suggestions
    document.getElementById('suggestionDiv').style.display = 'none';
}