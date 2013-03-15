<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Datatables extends MY_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->model('tournaments_model');
		$this->load->model('matches_model');
		$this->load->model('sports_model');
		$this->load->model('venues_model');
		$this->load->model('users_model');
		$this->load->model('teams_model');
		
	}

	public function sports() {
		$action = isset($_POST['action']) ? $_POST['action'] : "load";
		$out = array (
				'id' => -1,
				'error' => '',
				'fieldErrors' => array (
								 ),
				'data' => array (
						  ),
			   );

		switch ($action) {
			case "load":
				$sports = $this->sports_model->get_all();
				$out['aaData'] = array("DT_RowId"=>"row_1","sportID"=>1,"centreID"=>1,"name"=>"hello","description"=>"world","sportCategoryName"=>"football");
				
				$out = '{"id":-1,
					"error":"",
					"fieldErrors":[],
					"data":[],
					"aaData":[
						"DT_RowId":"row_1",
						"sportID":1,
						"centreID":1,
						"name":"hello",
						"description":"world",
						"sportCategoryName":"football"
					]
				}';
				//$out['error'] = $sports;
			break;
			case "create":
				$sports = $this->sports_model->get_all();
				$out['error'] = $sports;
			break;
			case "edit":
				$newdata = $_POST['data'];
				$out['error'] = $newdata;
			break;
			case "remove":
				foreach($_POST['data'] as $clientRowString) {
					$sportID = substr($clientRowString,4);
					$out['error'] = $this->sports_model->delete($sportID);
				}
			break;
		}

		// Send it back to the client, via our plain data dump view
		//$this->data['data'] = json_encode($out);
		$this->data['data'] = $out;
		$this->load->view('data', $this->data);
	}
}