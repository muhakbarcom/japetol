<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Produk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'produk?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'produk?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'produk';
            $config['first_url'] = base_url() . 'produk';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Produk_model->total_rows($q);
        $produk = $this->Produk_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'produk_data' => $produk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Produk';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Produk' => '',
        ];

        $data['page'] = 'produk/produk_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Produk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_produk' => $row->id_produk,
		'nama_produk' => $row->nama_produk,
		'harga_produk' => $row->harga_produk,
		'stok_produk' => $row->stok_produk,
		'gambar_produk' => $row->gambar_produk,
	    );
        $data['title'] = 'Produk';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'produk/produk_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('produk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('produk/create_action'),
	    'id_produk' => set_value('id_produk'),
	    'nama_produk' => set_value('nama_produk'),
	    'harga_produk' => set_value('harga_produk'),
	    'stok_produk' => set_value('stok_produk'),
	    'gambar_produk' => set_value('gambar_produk'),
	);
        $data['title'] = 'Produk';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'produk/produk_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_produk' => $this->input->post('nama_produk',TRUE),
		'harga_produk' => $this->input->post('harga_produk',TRUE),
		'stok_produk' => $this->input->post('stok_produk',TRUE),
		'gambar_produk' => $this->input->post('gambar_produk',TRUE),
	    );

            $this->Produk_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('produk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Produk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('produk/update_action'),
		'id_produk' => set_value('id_produk', $row->id_produk),
		'nama_produk' => set_value('nama_produk', $row->nama_produk),
		'harga_produk' => set_value('harga_produk', $row->harga_produk),
		'stok_produk' => set_value('stok_produk', $row->stok_produk),
		'gambar_produk' => set_value('gambar_produk', $row->gambar_produk),
	    );
            $data['title'] = 'Produk';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'produk/produk_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('produk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_produk', TRUE));
        } else {
            $data = array(
		'nama_produk' => $this->input->post('nama_produk',TRUE),
		'harga_produk' => $this->input->post('harga_produk',TRUE),
		'stok_produk' => $this->input->post('stok_produk',TRUE),
		'gambar_produk' => $this->input->post('gambar_produk',TRUE),
	    );

            $this->Produk_model->update($this->input->post('id_produk', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('produk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Produk_model->get_by_id($id);

        if ($row) {
            $this->Produk_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('produk'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('produk'));
        }
    }

    public function deletebulk(){
        $delete = $this->Produk_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('success', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('nama_produk', 'nama produk', 'trim|required');
	$this->form_validation->set_rules('harga_produk', 'harga produk', 'trim|required');
	$this->form_validation->set_rules('stok_produk', 'stok produk', 'trim|required');
	$this->form_validation->set_rules('gambar_produk', 'gambar produk', 'trim|required');

	$this->form_validation->set_rules('id_produk', 'id_produk', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-04 06:17:22 */
/* http://harviacode.com */