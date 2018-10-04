
	<div id="quangcao">
		<iframe width="393" height="300" src="https://www.youtube.com/embed/e7P1Zjgj_Do" frameborder="0" allowfullscreen></iframe>
		<a href="index.php?a=2&idsp=9">
			<img class="mySlides" src="Images/QuangCao/quangcao-iphonese.png" width="796" height="300">
		</a>
		<a href="index.php?a=2&idsp=14">
			<img class="mySlides" src="Images/QuangCao/quangcao-samsungj5.gif" width="796" height="300">
		</a>
		<a href="index.php?a=2&idsp=10">
			<img class="mySlides" src="Images/QuangCao/quangcao-galaxys7.png" width="796" height="300">
		</a>	
		<a href="#">
			<img class="mySlides" src="Images/QuangCao/quangcao4.png" width="796" height="300">
		</a>
		<a href="#">
			<img class="mySlides" src="Images/QuangCao/quangcao5.png" width="796" height="300">
		</a>
	</div>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 3000);    
}
</script>