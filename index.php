<?php
session_start();
$title="Home Page";
include('header.php');
?>
<style>
.blueColor{color:blue;font-size:40px;}
</style>
<main>
      
        <div class="featured my-5">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <img id="img" class="w-75" src="images/undraw_online_cv_qy9w.svg">
                    </div>
                    <div class="col-8">
                        <h2  id="welcome">Create Resume Online</h2>
                        <p>Create your professional resume by adding your information and print using our predefined templates</p>
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

        function firstFunction(callbackfunction){
            alert('sd');
            window[callbackfunction](arguments);
        }
        function nextfunction(){
            alert('next ');
        }
        
        function testfunction(){
            alert('test ');
        }
    </script>

<?php
include('footer.php');
?>