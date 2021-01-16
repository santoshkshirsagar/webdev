<?php
session_start();
$title="Home Page";
include('header.php');
?>
<main>
        <div id="title" >
            <h1 style="display:block;" id="textTitle" class="text-center">Website Layout<br/></h1>
            <button onclick="changeColor()">Change Color</button>


        </div>
        <div class="container" style="height:2000px;">
            Input 1 <input type="text" id="input1">
            Input 2 
            <input type="text" id="input2"><br/>
            Result
            <span id="result"></span>
            <button onclick="addition()">Addition</button>
            <button onclick="sub()">Substraction</button>
        </div>
        <div class="featured">
            <div class="container">
                <div class="float-left py-5 w-25">
                    <img id="img" style="width:200px;" src="images/dp.png">
                </div>
                <div class="float-right py-5 w-75">
                    <h2>Welcome to Web Dev Course</h2>
                    <p>HTML, PHP, Javascript etc</p>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </main>
    <script>
        var count=0;
        function changeColor(){
            var colors=['silver', 'green','red','blue','yellow', 'pink', 'aqua'];
            let color = colors[0];
            if(count<colors.length){
                color = colors[count]
            }else{
                count = 1;
            }
            document.getElementById('textTitle').style.color=color;
            count=count+1;
        }
    </script>
<?php
include('footer.php');
?>