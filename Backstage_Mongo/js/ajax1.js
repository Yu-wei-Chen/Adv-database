var xmlHTTP;

function $_xmlHttpRequest()
{   
    if(window.ActiveXObject)
    {
        xmlHTTP=new ActiveXObject("Microsoft.XMLHTTP");
    }
    else if(window.XMLHttpRequest)
    {
        xmlHTTP=new XMLHttpRequest();
    }
}

function check()
{  
    var select_op=document.getElementById("q1_from").value;
    
    $_xmlHttpRequest();
    xmlHTTP.open("GET","test.php?select_op="+select_op,true);
    
        xmlHTTP.onreadystatechange=function check_user()
        {
            if(xmlHTTP.readyState == 4)
            {
                if(xmlHTTP.status == 200)
                {
                    var str=xmlHTTP.responseText;
                    document.getElementById("message").innerHTML=str;
                }
            }
        }
        xmlHTTP.send(null);
    }