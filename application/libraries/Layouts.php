<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 21/05/2019
 * Time: 16:27
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Layouts Class. PHP5 only.
 *
 */
class Layouts {
    // Will hold a CodeIgniter instance
    private $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function view($view_name, $params = array(), $layout = 'default')
    {
        // Load the view's content, with the params passed
        $view_content = $this->CI->load->view($view_name, $params, TRUE);

        // Now load the layout, and pass the view we just rendered
        $this->CI->load->view('default/layout.php', array(
            'content_for_layout' => $view_content
        ));
    }
}