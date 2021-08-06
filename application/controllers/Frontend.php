<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend extends CI_Controller
{


  // public function index()
  // {
  //   $data['page'] = 'frontend/index';
  //   $data['title'] = 'Home';
  //   $this->load->view('template/frontend', $data);
  // }

  function __construct()
  {
    parent::__construct();
    $c_url = $this->router->fetch_class();
    // $this->layout->auth();
    // $this->layout->auth_privilege($c_url);
    $this->load->model('Produk_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $q = urldecode($this->input->get('q', TRUE));
    $start = intval($this->input->get('start'));

    if ($q <> '') {
      $config['base_url'] = base_url() . 'frontend?q=' . urlencode($q);
      $config['first_url'] = base_url() . 'frontend?q=' . urlencode($q);
    } else {
      $config['base_url'] = base_url() . 'frontend';
      $config['first_url'] = base_url() . 'frontend';
    }

    $config['per_page'] = 12;
    $config['page_query_string'] = TRUE;
    $config['total_rows'] = $this->Produk_model->total_rows_pelanggan($q);
    $produk = $this->Produk_model->get_limit_data_pelanggan($config['per_page'], $start, $q);

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
    $this->session->set_flashdata('success', NULL);
    $this->session->set_flashdata('error', NULL);
    $data['page'] = 'frontend/index';
    $this->load->view('template/pelanggan', $data);
  }

  public function about()
  {
    $data['page'] = 'frontend/about';
    $data['title'] = 'About';
    $this->load->view('template/frontend', $data);
  }

  public function features()
  {
    $data['page'] = 'frontend/features';
    $data['title'] = 'Features';
    $this->load->view('template/frontend', $data);
  }

  public function portofolio()
  {
    $data['page'] = 'frontend/portofolio';
    $data['title'] = 'Portofolio';
    $this->load->view('template/frontend', $data);
  }

  public function faq()
  {
    $data['page'] = 'frontend/faq';
    $data['title'] = 'Faq';
    $this->load->view('template/frontend', $data);
  }

  public function contact()
  {
    $data['page'] = 'frontend/contact';
    $data['title'] = 'Contact';
    $this->load->view('template/frontend', $data);
  }

  public function signin()
  {
    // $data['page']='auth/login';
    redirect('login');
  }

  public function signup()
  {
    $data['page'] = 'frontend/signup';
    $data['title'] = 'Signup';
    $this->load->view('template/frontend', $data);
  }
}
