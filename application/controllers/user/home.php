<?php
class Home extends User_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
		$this->load->view('user_view');
    }

}
?>