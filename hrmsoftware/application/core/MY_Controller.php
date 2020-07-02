<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
    public function __construct() {
        parent::__construct();    
		$ci =& get_instance();
        $ci->load->helper('language');
        $siteLang = $ci->session->userdata('site_lang');
        if ($siteLang) {
            $ci->lang->load('workablezone',$siteLang);
        } else {
            $ci->lang->load('workablezone','english');
        } 
    }
	
	
	
	

}
?>