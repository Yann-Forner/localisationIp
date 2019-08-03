<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property  template
 */
class Welcome extends CI_Controller {

    /**
     * Welcome constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->library('Layouts');
        $this->layouts->view('home');
	}
	public function searchIp(){
	    $ip = $this->input->post('search');
        $this->load->library('Layouts');

        $geoplugin = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip) );

        if ( is_numeric($geoplugin['geoplugin_latitude']) && is_numeric($geoplugin['geoplugin_longitude']) ) {

            $lat = $geoplugin['geoplugin_latitude'];
            $long = $geoplugin['geoplugin_longitude'];
        }
        $this->layouts->view('searchIp',array(
            'search' => $ip,
            'lat' => $lat,
            'long' => $long
        ));
    }
}
