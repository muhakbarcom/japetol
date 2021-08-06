<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Laporan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'laporan?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'laporan?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'laporan';
            $config['first_url'] = base_url() . 'laporan';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Laporan_model->total_rows($q);
        $laporan = $this->Laporan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'laporan_data' => $laporan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Laporan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Laporan' => '',
        ];

        $data['page'] = 'laporan/laporan_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Laporan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'tanggal_pemesanan' => $row->tanggal_pemesanan,
		'total_transaksi' => $row->total_transaksi,
		'pendapatan' => $row->pendapatan,
	    );
        $data['title'] = 'Laporan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'laporan/laporan_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('laporan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('laporan/create_action'),
	    'tanggal_pemesanan' => set_value('tanggal_pemesanan'),
	    'total_transaksi' => set_value('total_transaksi'),
	    'pendapatan' => set_value('pendapatan'),
	);
        $data['title'] = 'Laporan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'laporan/laporan_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tanggal_pemesanan' => $this->input->post('tanggal_pemesanan',TRUE),
		'total_transaksi' => $this->input->post('total_transaksi',TRUE),
		'pendapatan' => $this->input->post('pendapatan',TRUE),
	    );

            $this->Laporan_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('laporan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Laporan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('laporan/update_action'),
		'tanggal_pemesanan' => set_value('tanggal_pemesanan', $row->tanggal_pemesanan),
		'total_transaksi' => set_value('total_transaksi', $row->total_transaksi),
		'pendapatan' => set_value('pendapatan', $row->pendapatan),
	    );
            $data['title'] = 'Laporan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'laporan/laporan_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('laporan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'tanggal_pemesanan' => $this->input->post('tanggal_pemesanan',TRUE),
		'total_transaksi' => $this->input->post('total_transaksi',TRUE),
		'pendapatan' => $this->input->post('pendapatan',TRUE),
	    );

            $this->Laporan_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('laporan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Laporan_model->get_by_id($id);

        if ($row) {
            $this->Laporan_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('laporan'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('laporan'));
        }
    }

    public function deletebulk(){
        $delete = $this->Laporan_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('success', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('tanggal_pemesanan', 'tanggal pemesanan', 'trim|required');
	$this->form_validation->set_rules('total_transaksi', 'total transaksi', 'trim|required');
	$this->form_validation->set_rules('pendapatan', 'pendapatan', 'trim|required|numeric');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "laporan.xls";
        $judul = "laporan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Pemesanan");
	xlsWriteLabel($tablehead, $kolomhead++, "Total Transaksi");
	xlsWriteLabel($tablehead, $kolomhead++, "Pendapatan");

	foreach ($this->Laporan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_pemesanan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->total_transaksi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pendapatan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=laporan.doc");

        $data = array(
            'laporan_data' => $this->Laporan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('laporan/laporan_doc',$data);
    }

  public function printdoc(){
        $data = array(
            'laporan_data' => $this->Laporan_model->get_all(),
            'start' => 0
        );
        $this->load->view('laporan/laporan_print', $data);
    }

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-06 11:28:44 */
/* http://harviacode.com */