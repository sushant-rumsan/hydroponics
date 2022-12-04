
<button onClick=myFunction() id="clickButton">On</button>
<button onClick=myFunction2() id="clickButton2">Off</button>
Second
<button onClick=myFunction3()>On</button>
<button onClick=myFunction4()>Off</button>

<script>
    // window.onload = function(){
    // var button = document.getElementById('clickButton');
    // setInterval(function(){
    //     button.click();
    // },3000);  // this will make it click again every 1000 miliseconds
    // var button2 = document.getElementById('clickButton2');
    // setInterval(function(){
    //     button2.click();
    // },6000);  // this will make it click again every 1000 miliseconds
    // };
    

    function myFunction(){
    fetch('http://192.168.1.178/ledon');
    }

    function myFunction2(){
    fetch('http://192.168.1.178/ledoff');
    }

    function myFunction3(){
    fetch('http://192.168.1.178/ledton');
    }

    function myFunction4(){
    fetch('http://192.168.1.178/ledtoff');
    }
</script>