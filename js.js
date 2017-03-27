function inputOnfocus(){
    var keyWords=document.getElementById("txt");
    if(keyWords.value="Search"){
        keyWords.value="";
        keyWords.style.color="Black";
    }
}

function inputOnblur(){
    var keyWords=document.getElementById("txt");
    if(keyWords.value.length<=0){
        keyWords.value="Search";
        keyWords.style.color="Gray";
    }
}