
<!-- <script>

let timerId = setInterval(()=>alert('tick'),1000);
setTimeout(()=> {clearInterval(timerId);alert('stop');},1000);
</script> -->
 
<p id="demo"></p>
<button type="button" onclick="loadDoc()" >изменить</button>




<script>


function loadDoc() {

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
alert('ghbdtn');



    async function f1()  { let timerId;
let promise = new Promise((resolve,reject) => {
resolve(timerId=setTimeout(()=> location.reload(),5000 ) )});
let result = await promise; 
setTimeout(()=> clearTimeout(timerId),5000);

}


f1();

}





};
xhttp.open("GET","ajax_info.php",true);
xhttp.send();

}


</script>


