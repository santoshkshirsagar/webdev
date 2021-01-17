<?php
session_start();
$title="Home Page";
include('header.php');
?>
<main>
        <div id="title" >
            <h1 style="display:block;" id="textTitle" class="text-center py-4">Resume Maker<br/></h1>
        <!--     <button onclick="changeColor()">Change Color</button> -->
        </div>
        <div class="featured">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <img id="img" class="w-75" src="images/dp.png">
                    </div>
                    <div class="col-8">
                        <h2>Welcome to Web Dev Course</h2>
                        <p>HTML, PHP, Javascript etc</p>
                    </div>
                    
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