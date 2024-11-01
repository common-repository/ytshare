<?php 
if( ! defined( "YTSHARE" ) ) {
  header( 'Status: 403 Forbidden' );
  header( 'HTTP/1.1 403 Forbidden' );
  exit;
}
 $code = '
<style type="text/css">
' .  $this->options['css'] . '
</style>

<div id="ytshare_player"></div>
<script src="http://www.youtube.com/player_api"></script>
<script>
	var ytFlag = 0;
    var player;
    function onYouTubePlayerAPIReady() {
        player = new YT.Player("ytshare_player", {
          height: "' .  $this->height . '",
          width: "' .  $this->width . '",
          videoId: "' .  $atts['videoid'] . '",
          events: {
            "onStateChange": onPlayerStateChange
          }
        });
    }

    function onPlayerStateChange(event) {     
        if(event.data === 2 && ytFlag == 0) {   
        	ytFlag = 1;  
        	jQuery(function($) {
        		var cookie = getCookie("ytshare_foreverclose");
        		if(cookie != "true") {
		            $("#ytshare_dimScreen").css("opacity", .7).fadeTo(700, 0.7);
		            $("#ytshare_popup").css("opacity", 1).fadeTo(700, 1.0);
		        }
	        });
        }
    }
</script>';

if($this->isMobile()) { 
  $code .= '<div id="ytshare_popup-mobile" class="ytshare_popup"  style="opacity: 0; display:none;">';
 } else { 
  $code .= '<div id="ytshare_popup" class="ytshare_popup"  style="opacity: 0; display:none;">';
 } 

	$code .= '<a href="#">
		<img src="' . plugins_url( '../close.png' , __FILE__ ) . '" class="ytshare_close" id="ytshare_close" />
	</a>
	<h1>' .  $this->options['heading'] . '</h1>

	<p>' .  $this->options['subheading'] . '</p>

	<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Ffacebook.com%2F' .$this->options['fbid'] . '&amp;width=250&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;share=false&amp;height=80&amp;appId=1422280591329291" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:250px; height:80px;" allowTransparency="true"></iframe>

	<div style="border-top: 1px solid #88868b; width: 80%; height: 1px; margin-left: 10%;  margin-right: 10%;"></div>
	<br />

	<a href="#" id="ytshare_closeforever">I\'ve already liked ' . get_bloginfo( 'name' ). ' on Facebook.</a>
</div>

<div id="ytshare_dimScreen" class="ytshare_close" style="opacity: 0; display:none;"></div>';
