function getCookie(cname)
{
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++) 
	{
		var c = ca[i].trim();
		if (c.indexOf(name)==0) return c.substring(name.length,c.length);
	}
	return "";
}

function setCookie(cname,cvalue,exdays)
{
	var d = new Date();
	d.setTime(d.getTime()+(exdays*24*60*60*1000));
	var expires = "expires="+d.toGMTString();
	document.cookie = cname + "=" + cvalue + "; " + expires;
}

jQuery(function($) {
	$('.ytshare_close').click(function() {
		$("#ytshare_dimScreen").css("opacity", 0).fadeTo(1000, 0);
	    $("#ytshare_popup").css("opacity", 0).fadeTo(1000, 0);
	    $(this).hide();
	    $("#ytshare_popup").hide();
	});

	$('#ytshare_closeforever').click(function() {
		$("#ytshare_dimScreen").css("opacity", 0).fadeTo(1000, 0);
	    $("#ytshare_popup").css("opacity", 0).fadeTo(1000, 0);
	    $("#ytshare_dimScreen").hide();
	    $("#ytshare_popup").hide();
	    setCookie("ytshare_foreverclose", "true", 30);
	    return false;
	});
});