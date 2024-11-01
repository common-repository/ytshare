<?php 
	if( ! defined( "YTSHARE" ) ) {
	  header( 'Status: 403 Forbidden' );
	  header( 'HTTP/1.1 403 Forbidden' );
	  exit;
	}

	function getOptions($optionName) {
		$options = array(
					'heading'		=>	'YTShare',
					'subheading'	=>	'YTShare',
					'fbid'			=>	'',
					);

		$YTShareOptions = get_option($optionName);

		if (!empty($YTShareOptions)) {
			foreach ($YTShareOptions as $key => $option) {
				$options[$key] = $option;
			}
		}

		update_option($optionName, $options);

		return $options;
	}