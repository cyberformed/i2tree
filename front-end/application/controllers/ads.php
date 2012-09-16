<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @property CI_Loader $load
 * @property CI_Input $input
 * @property ads_model $ads_model
 */
class ads extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('bt_scorer_model');
    }

    /**
     * @Api
     */
    public function index() {
        $status = array("status" => "error");
        $this->output->set_output(json_encode($status));
    }

    /**
     * @Api   
     */
    public function insert_scorer() {
        $status = array("status" => "error", "id" => 0);
        $id = $this->bt_scorer_model->insert_scorer();
        if ($id > 0) {
            $status['status'] = 'ok';
            $status['id'] = $id;
            $this->output->set_output(json_encode($status));
        }
        $this->output->set_output(json_encode($status));
    }

    public function request_info() {
        $this->bt_scorer_model->getRequestInfo();
    }

    /**
     * @Api   
     */
    public function get_last_ten_scorers() {
        $status = array("status" => "error", "data" => array());
        $data = $this->bt_scorer_model->get_last_ten_scorers();
        if (!empty($data)) {
            $status['status'] = 'ok';
            $status['data'] = $data;
            $this->output->set_output(json_encode($status));
        }
        $this->output->set_output(json_encode($status));
    }

    /**
     * @Api   
     */
    public function get_scorer_result() {
        $status = array("status" => "error", "data" => array());
        $data = $this->bt_scorer_model->get_scorer_result();
        if (!empty($data)) {
            $status['status'] = 'ok';
            $status['data'] = $data;
            $this->output->set_output(json_encode($status));
        }
        $this->output->set_output(json_encode($status));
    }

}