function search_customer(str) {
    if (str.length==0) {
        document.getElementById("result").innerHTML="";
        document.getElementById("result").style.border="0px";
        return;
    }
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("result").innerHTML = xmlhttp.responseText;

        }
    }

    xmlhttp.open('GET', "find_customer.php?q="+str, true);
    xmlhttp.send();
}

function search_waybill(str) {
    if (str.length==0) {
        document.getElementById("result").innerHTML="";
        document.getElementById("result").style.border="0px";
        return;
    }
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("result").innerHTML = xmlhttp.responseText;

        }
    }

    xmlhttp.open('GET', "find_waybill.php?q="+str, true);
    xmlhttp.send();
}

function search_manifest(str) {
    if (str.length==0) {
        document.getElementById("result").innerHTML="";
        document.getElementById("result").style.border="0px";
        return;
    }
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("result").innerHTML = xmlhttp.responseText;

        }
    }

    xmlhttp.open('GET', "find_manifest.php?q="+str, true);
    xmlhttp.send();
}

function search_pod(str) {
    if (str.length==0) {
        document.getElementById("result").innerHTML="";
        document.getElementById("result").style.border="0px";
        return;
    }
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("result").innerHTML = xmlhttp.responseText;

        }
    }

    xmlhttp.open('GET', "find_pod.php?q="+str, true);
    xmlhttp.send();
}

function search_user(str) {
    if (str.length==0) {
        document.getElementById("result").innerHTML="";
        document.getElementById("result").style.border="0px";
        return;
    }
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("result").innerHTML = xmlhttp.responseText;

        }
    }

    xmlhttp.open('GET', "find_user.php?q="+str, true);
    xmlhttp.send();
}