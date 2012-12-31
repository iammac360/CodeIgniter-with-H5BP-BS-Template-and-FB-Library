<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Snake extends MY_Controller {

	public $graph_url = "https://graph.facebook.com/";
	private $app_id;
	private $app_info;
	private $user_id;
	private $user_info;

	public function __construct() 
	{
		parent::__construct();

		// Set Application ID
		$this->app_id = $this->config->item('appId');
		
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

		// Fetch the basic info of the app that they are using
		$this->app_info = $this->facebook->api('/'.$this->app_id);
	}

	public function index()
	{
		$this->title = "Snake Game";
		$this->keywords = "snake, snake game, game";
		$this->hasNav = FALSE;
		$this->useHeader = FALSE;
		$this->useBasejs = FALSE;
		$this->useFBjs = TRUE;
		$this->css = array('custom-style.css');

		$this->jstmpl = array('pages/snakegame/snakejs');

		//Initialize the data to be used on views
		$this->data = array(
			'app_info' 				=> $this->app_info,
			'app_id'				=> $this->app_id,
			'app_name'				=> $this->app_info['name'],
			'app_image'				=> $this->app_info['logo_url'],
			'user_info'				=> $this->user_info,
			'user_id'				=> $this->user_id,
			'graph_url'				=> $this->graph_url,
			'user_name'				=> he($this->user_info['name']),
		);

		$this->_render('pages/snakegame/index');
	}

	public function debug() {
		$this->debugData = array(
			'app_info' 				=> $this->app_info,
			'app_id'				=> $this->app_id,
			'app_name'				=> $this->app_info['name'],
			'app_image'				=> $this->app_info['logo_url'],
			'user_info'				=> $this->user_info,
			'user_id'				=> $this->user_id,
			'graph_url'				=> $this->graph_url,
			'user_name'				=> he($this->user_info['name']),
		);

		$this->render('pages/debug');
	}
}