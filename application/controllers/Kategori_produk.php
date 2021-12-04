<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori_produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Kategori_produk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kategori_produk?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kategori_produk?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kategori_produk';
            $config['first_url'] = base_url() . 'kategori_produk';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kategori_produk_model->total_rows($q);
        $kategori_produk = $this->Kategori_produk_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kategori_produk_data' => $kategori_produk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Kategori Produk';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Kategori Produk' => '',
        ];

        $data['page'] = 'kategori_produk/kategori_produk_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Kategori_produk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kategori' => $row->id_kategori,
		'kategori' => $row->kategori,
	    );
        $data['title'] = 'Kategori Produk';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'kategori_produk/kategori_produk_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('kategori_produk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kategori_produk/create_action'),
	    'id_kategori' => set_value('id_kategori'),
	    'kategori' => set_value('kategori'),
	);
        $data['title'] = 'Kategori Produk';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'kategori_produk/kategori_produk_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kategori' => $this->input->post('kategori',TRUE),
	    );

            $this->Kategori_produk_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('kategori_produk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kategori_produk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kategori_produk/update_action'),
		'id_kategori' => set_value('id_kategori', $row->id_kategori),
		'kategori' => set_value('kategori', $row->kategori),
	    );
            $data['title'] = 'Kategori Produk';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'kategori_produk/kategori_produk_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('kategori_produk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kategori', TRUE));
        } else {
            $data = array(
		'kategori' => $this->input->post('kategori',TRUE),
	    );

            $this->Kategori_produk_model->update($this->input->post('id_kategori', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('kategori_produk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kategori_produk_model->get_by_id($id);

        if ($row) {
            $this->Kategori_produk_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('kategori_produk'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('kategori_produk'));
        }
    }

    public function deletebulk(){
        $delete = $this->Kategori_produk_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('success', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');

	$this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kategori_produk.php */
/* Location: ./application/controllers/Kategori_produk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-04 14:39:45 */
/* http://harviacode.com */