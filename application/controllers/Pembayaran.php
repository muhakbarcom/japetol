<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Pembayaran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'pembayaran?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pembayaran?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pembayaran';
            $config['first_url'] = base_url() . 'pembayaran';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pembayaran_model->total_rows($q);
        $pembayaran = $this->Pembayaran_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pembayaran_data' => $pembayaran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Pembayaran';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Pembayaran' => '',
        ];

        $data['page'] = 'pembayaran/pembayaran_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id)
    {
        $row = $this->Pembayaran_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_pembayaran' => $row->id_pembayaran,
                'id_pemesanan' => $row->id_pemesanan,
                'metode_pembayaran' => $row->metode_pembayaran,
                'status_pembayaran' => $row->status_pembayaran,
            );
            $data['title'] = 'Pembayaran';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'pembayaran/pembayaran_read';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('pembayaran'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pembayaran/create_action'),
            'id_pembayaran' => set_value('id_pembayaran'),
            'id_pemesanan' => set_value('id_pemesanan'),
            'metode_pembayaran' => set_value('metode_pembayaran'),
            'status_pembayaran' => set_value('status_pembayaran'),
        );
        $data['title'] = 'Pembayaran';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'pembayaran/pembayaran_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_pemesanan' => $this->input->post('id_pemesanan', TRUE),
                'metode_pembayaran' => $this->input->post('metode_pembayaran', TRUE),
                'status_pembayaran' => $this->input->post('status_pembayaran', TRUE),
            );

            $this->Pembayaran_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('pembayaran'));
        }
    }

    public function update($id)
    {
        $row = $this->Pembayaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pembayaran/update_action'),
                'id_pembayaran' => set_value('id_pembayaran', $row->id_pembayaran),
                'id_pemesanan' => set_value('id_pemesanan', $row->id_pemesanan),
                'metode_pembayaran' => set_value('metode_pembayaran', $row->metode_pembayaran),
                'status_pembayaran' => set_value('status_pembayaran', $row->status_pembayaran),
            );
            $data['title'] = 'Pembayaran';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'pembayaran/pembayaran_form';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('pembayaran'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pembayaran', TRUE));
        } else {
            $data = array(
                'id_pemesanan' => $this->input->post('id_pemesanan', TRUE),
                'metode_pembayaran' => $this->input->post('metode_pembayaran', TRUE),
                'status_pembayaran' => $this->input->post('status_pembayaran', TRUE),
            );

            $this->Pembayaran_model->update($this->input->post('id_pembayaran', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('pembayaran'));
        }
    }

    public function delete($id)
    {
        $row = $this->Pembayaran_model->get_by_id($id);

        if ($row) {
            $this->Pembayaran_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('pembayaran'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('pembayaran'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Pembayaran_model->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('success', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_pemesanan', 'id pemesanan', 'trim|required');
        $this->form_validation->set_rules('metode_pembayaran', 'metode pembayaran', 'trim|required');
        $this->form_validation->set_rules('status_pembayaran', 'status pembayaran', 'trim|required');

        $this->form_validation->set_rules('id_pembayaran', 'id_pembayaran', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/Pembayaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-04 06:17:14 */
/* http://harviacode.com */