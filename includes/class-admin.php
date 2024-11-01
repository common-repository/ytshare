<?php 
	if( ! defined( "YTSHARE" ) ) {
	  header( 'Status: 403 Forbidden' );
	  header( 'HTTP/1.1 403 Forbidden' );
	  exit;
	}

    class YTShareAdmin {

    	private $options;
    	private $optionsName = 'YTShareAdminOptions';

		public function __construct() {
			$this->getAdminOptions();
			add_action( 'admin_menu', array($this, 'addMenu') );
		}

		public function init() {
			$this->getAdminOptions();
		}

		public function getAdminOptions() {
			$this->options = getOptions($this->optionsName);
		}

		public function addMenu() {
			add_options_page('YTShare', 'YTShare Settings', 'manage_options', 'ytshare', array($this, 'settingsPage'));
		}

		public function settingsPage() {
			if($_POST['heading']) {
				$this->options['heading'] = $_POST['heading'];
			}

			if($_POST['subheading']) {
				$this->options['subheading'] = $_POST['subheading'];
			}

			if($_POST['fbid']) {
				$this->options['fbid'] = $_POST['fbid'];
			}

			if($_POST['css']) {
				$this->options['css'] = $_POST['css'];
			}

			update_option($this->optionsName, $this->options);

			require_once(__DIR__ . "/../views/admin.php");
		}
	}    