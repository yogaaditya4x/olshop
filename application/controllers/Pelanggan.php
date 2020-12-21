<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
    }


    public function register()
    {
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required', array(
            'required' => '%s Harus Diisi !'
        ));
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[tbl_pelanggan.email]', array(
            'required' => '%s Harus Diisi !',
            'is_uniqe' => '%s Email ini sudah terdaftar !'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi !'
        ));
        $this->form_validation->set_rules('password2', 'Retype Password', 'matches[password]', array(
            'matches' => '%s tidak sama !'
        ));



        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Register Pelanggan',
                'isi'   => 'v_register'
            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        } else {
            $data = array(
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')

            );
            $this->m_pelanggan->register($data);
            $this->session->set_flashdata('pesan', 'Selamat anda berhasil mendaftar !');
            redirect('pelanggan/register');
        }
    }
}
