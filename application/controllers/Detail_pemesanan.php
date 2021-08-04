<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_pemesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Detail_pemesanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'detail_pemesanan?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'detail_pemesanan?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'detail_pemesanan';
            $config['first_url'] = base_url() . 'detail_pemesanan';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Detail_pemesanan_model->total_rows($q);
        $detail_pemesanan = $this->Detail_pemesanan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'detail_pemesanan_data' => $detail_pemesanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Detail Pemesanan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Detail Pemesanan' => '',
        ];

        $data['page'] = 'detail_pemesanan/detail_pemesanan_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Detail_pemesanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_detail_pemesanan' => $row->id_detail_pemesanan,
		'id_pemesanan' => $row->id_pemesanan,
		'id_produk' => $row->id_produk,
		'qty' => $row->qty,
		'total_harga' => $row->total_harga,
	    );
        $data['title'] = 'Detail Pemesanan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'detail_pemesanan/detail_pemesanan_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('detail_pemesanan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detail_pemesanan/create_action'),
	    'id_detail_pemesanan' => set_value('id_detail_pemesanan'),
	    'id_pemesanan' => set_value('id_pemesanan'),
	    'id_produk' => set_value('id_produk'),
	    'qty' => set_value('qty'),
	    'total_harga' => set_value('total_harga'),
	);
        $data['title'] = 'Detail Pemesanan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'detail_pemesanan/detail_pemesanan_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_pemesanan' => $this->input->post('id_pemesanan',TRUE),
		'id_produk' => $this->input->post('id_produk',TRUE),
		'qty' => $this->input->post('qty',TRUE),
		'total_harga' => $this->input->post('total_harga',TRUE),
	    );

            $this->Detail_pemesanan_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('detail_pemesanan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detail_pemesanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detail_pemesanan/update_action'),
		'id_detail_pemesanan' => set_value('id_detail_pemesanan', $row->id_detail_pemesanan),
		'id_pemesanan' => set_value('id_pemesanan', $row->id_pemesanan),
		'id_produk' => set_value('id_produk', $row->id_produk),
		'qty' => set_value('qty', $row->qty),
		'total_harga' => set_value('total_harga', $row->total_harga),
	    );
            $data['title'] = 'Detail Pemesanan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'detail_pemesanan/detail_pemesanan_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('detail_pemesanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_detail_pemesanan', TRUE));
        } else {
            $data = array(
		'id_pemesanan' => $this->input->post('id_pemesanan',TRUE),
		'id_produk' => $this->input->post('id_produk',TRUE),
		'qty' => $this->input->post('qty',TRUE),
		'total_harga' => $this->input->post('total_harga',TRUE),
	    );

            $this->Detail_pemesanan_model->update($this->input->post('id_detail_pemesanan', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('detail_pemesanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detail_pemesanan_model->get_by_id($id);

        if ($row) {
            $this->Detail_pemesanan_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('detail_pemesanan'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('detail_pemesanan'));
        }
    }

    public function deletebulk(){
        $delete = $this->Detail_pemesanan_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('success', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_pemesanan', 'id pemesanan', 'trim|required');
	$this->form_validation->set_rules('id_produk', 'id produk', 'trim|required');
	$this->form_validation->set_rules('qty', 'qty', 'trim|required');
	$this->form_validation->set_rules('total_harga', 'total harga', 'trim|required');

	$this->form_validation->set_rules('id_detail_pemesanan', 'id_detail_pemesanan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Detail_pemesanan.php */
/* Location: ./application/controllers/Detail_pemesanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-04 06:15:52 */
/* http://harviacode.com */