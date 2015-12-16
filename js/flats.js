function load()

{	$("#left-side-content").load("simple-fade-slideshow.source.html");
	$("#content").load("simple-fade-slideshow.source.html");
/* $("#content-left").load("filter.html");*/


 
	$("#areas").mousedown(function(){
	
		console.log("this was also done");
	$("#content").html("<iframe  id='frame' src='map.html'></iframe>")
	$("#frame").load("map.html");
     $("#content-left").load("filter.html");
});	
}


