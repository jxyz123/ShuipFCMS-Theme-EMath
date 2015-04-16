$(document).ready(function(){
	$("#clear").click(function(){
		$("#verify_img").attr("src", verify_url+Math.random());
	});
});