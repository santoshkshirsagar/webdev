<?php
session_start();
$title="Home Page";
include('header.php');
?>
<style>
.blueColor{color:blue;font-size:40px;}
</style>
<main>
        <div id="title" >
            <h1 style="display:block;" id="textTitle" class="text-center py-4 ">Resume Maker<br/></h1>
        <!--     <button onclick="changeColor()">Change Color</button> -->
        </div>
        <div class="featured">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <img id="img" class="w-75" src="images/dp.png">
                    </div>
                    <div class="col-8">
                        <h2  id="welcome">Welcome to Web Dev Course</h2>
                        <div id="divTest" class="classheading" style="width:300px;height:200px;background-color:green;">original text</div>
                        <button id="btntest">test</button>
                        <button id="addt">add</button>
                        <button id="removet">remove</button>
                        
                        <button id="csstest">css</button>
                        <br/>
                        <input id="inputText" type="text" class="form-control">
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

    <script>
        //document.getElementById('welcome').innerHTML="cafasf";
        window.onload=function(){
            $("#btntest").click(function(){
                $("#divTest").toggleClass('blueColor');
                $("#divTest").width('600px');
                $("#divTest").height('100px');
                //$("#inputText").val("changed value");
            })
            $("#addt").click(function(){
                $("#divTest").addClass('blueColor');
            })
            $("#removet").click(function(){
                $("#divTest").removeClass('blueColor');
            })

            
            $("#csstest").click(function(){
                $("#divTest").css('font-size','100px');
            })
            $('#inputText').click(function(){
                $(this).val('asfasdfasdf');
            })

        }
    </script>

<?php
include('footer.php');
?>