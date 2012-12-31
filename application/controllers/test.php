<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	private $user_id;
	private $user_info;

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
		
		echo $this->user_id;
		echo '<pre>';
		print_r($this->user_info);
		echo '</pre>';
	}
	
}