<script>
    $("#btnMuaNgay123").on("click", function(){
       // $(this).closest("li")
       //    .find("img")
       //    .clone()
       //    .addClass("zoom")
       //    .appendTo("body");
       //    setTimeout(function(){
       //        $(".zoom").remove();
       //    }, 1000);
    });
 </script>
<style type="text/css">

.basket{
	position: absolute;
	z-index: 10;
	top: 40px;
	  right: 50%;
	  width: 40px;
}

.zoom{
  position: absolute;
  top: 40px;
  right: 50%;
  width: 40px;
  opacity: 0;
  animation: zoom 1s ease forwards;
}


@keyframes zoom{
    0%{opacity: 0}
    50%{opacity: 1}
    100%{opacity: 0; right: 40px;}
}
</style>