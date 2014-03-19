<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: jason
 * Date: 5/25/11
 * Time: 11:22 AM
 * To change this template use File | Settings | File Templates.
 */
 
class Script extends CI_Controller {

    public function maya_redo()
    {

        $this->load->view('mayaredo');
    }

    public function maya_post()
    {
        $config = array(
            'upload_path'   => './uploads',
            'allowed_types' => 'csv'
        );
        $this->load->library('upload', $config);

        $this->upload->do_upload();

        $errors = $this->upload->display_errors();

        if ($errors) {

            $this->session->set_userdata('error', $errors);
            redirect('errors/error_page');
        }

        $upload_data = $this->upload->data();

        $this->load->model('Script_Model');

        $csvName = $upload_data['file_name'];

        $origVendor = (string)$this->input->post('oldvendor', TRUE);
        $newVendor = (string)$this->input->post('newvendor', TRUE);

        $this->Script_Model->changeVendor($csvName, $origVendor, $newVendor);

    }

    public function lead_post()
    {
        $config = array(
            'upload_path'   => './uploads',
            'allowed_types' => 'csv'
        );
        $this->load->library('upload', $config);

        $this->upload->do_upload();

        $errors = $this->upload->display_errors();

        if ($errors) {

            $this->session->set_userdata('error', $errors);
            redirect('errors/error_page');
        }

        $upload_data = $this->upload->data();

        $this->load->model('Script_Model');

        $csvName = $upload_data['file_name'];

        $this->Script_Model->uploadLeads($csvName);

    }

    function success($ucount, $bcount)
    {
        $data['updated'] = $this->session->userdata('updated');
        $data['unupdated'] = $this->session->userdata('unupdated');
        $this->load->view('successPage', $data);
    }


}
