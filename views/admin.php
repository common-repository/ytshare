<?php 
if( ! defined( "YTSHARE" ) ) {
  header( 'Status: 403 Forbidden' );
  header( 'HTTP/1.1 403 Forbidden' );
  exit;
}
?>

<div class="wrap">
	<h2>YTShare</h2>

	<p>To use this plugin, use the shortcode: <code>[ytshare videoid="IDHERE"]</code></p>

	<form method="post" action="#">
	    <table class="form-table">
	        <tr valign="top">
	        <th scope="row">Heading</th>
	        <td><input type="text" name="heading" value="<?php echo $this->options['heading']; ?>" class="regular-text" /></td>
	        </tr>
	         
	        <tr valign="top">
	        <th scope="row">Sub-heading</th>
	        <td><input type="text" name="subheading" value="<?php echo $this->options['subheading']; ?>" class="regular-text" /></td>
	        </tr>
	        
	        <tr valign="top">
	        <th scope="row">Facebook Page ID (or username)</th>
	        <td><input type="text" name="fbid" value="<?php echo $this->options['fbid']; ?>" class="regular-text" /></td>
	        </tr>

	        <tr valign="top">
	        <th scope="row">Custom CSS</th>
	        <td><textarea name="css" class="large-text code" rows="10" cols="50"><?php echo $this->options['css']; ?></textarea></td>
	        </tr>
	    </table>
	    
	    <?php submit_button(); ?>

	</form>
</div>