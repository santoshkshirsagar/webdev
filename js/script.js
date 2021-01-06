
//to change text 

/* this is demo js file
to teach basics of javascript */

function changeText(){
    document.getElementById('textTitle').innerHTML="Welcome to course"; // nsd
}
function addText(){
    document.getElementById('textTitle').innerHTML+="<br/>Welcome to course";
}
function hideText(){
    document.getElementById('textTitle').style.display="none";
}
function showText(){
    document.getElementById('textTitle').style.display="block";
}

function changeImg(){
    document.getElementById('img').src="images/bg.png";
}

function addition(){
    var input1 = parseInt(document.getElementById('input1').value);
    var input2 = parseInt(document.getElementById('input2').value);
    document.getElementById('result').innerHTML=input1+input2;
}
function sub(){
    var input1 = parseInt(document.getElementById('input1').value);
    var input2 = parseInt(document.getElementById('input2').value);
    document.getElementById('result').innerHTML=input1/input2;
}