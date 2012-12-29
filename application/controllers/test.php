<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	private $user_id;

	public function __construct()
	{
		parent::__construct();

		$this->user_id = $this->facebook->getUser();
		
		if(empty($this->user_id)) 
		{
			echo '<script type="text/javascript">top.location.href="'.$this->facebook->getLoginURL().'";</script>';
	        exit;
    	}
    	else 
    	{
			try 
			{
				// Fetch the viewer's vasic information
				$this->user_info = $this->facebook->api('/me');
			} catch (FacebookApiException $e) {
				header('Location: '. getUrl($_SERVER['REQUEST_URI']));
				exit();
			}
		}
	}
	
	public function index(){	
		
		/*
		 *set up title and keywords (if not the default in custom.php config file will be set) 
		 */
		$this->title = "Yaaaaa";
		$this->keywords = "arny, arnodo";
		
		$this->_render('pages/home');
	}
	
}