<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
    }


    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'total_barang' => $this->m_admin->total_barang(),
            'total_kategori' => $this->m_admin->total_kategori(),
            'isi'   => 'v_admin'
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function setting()
    {
        $this->form_validation->set_rules('kota', 'Kota', 'required', array(
            'required' => '%s Harus Diisi !'
        ));
        $this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required', array(
            'required' => '%s Harus Diisi !'
        ));
        $this->form_validation->set_rules('no_telpon', 'Nomer Telepon', 'required', array(
            'required' => '%s Harus Diisi !'
        ));
        $this->form_validation->set_rules('alamat_toko', 'Alamat Toko', 'required', array(
            'required' => '%s Harus Diisi !'
        ));



        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Setting',
                'setting' => $this->m_admin->data_setting(),
                'isi'   => 'v_setting'
            );
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);
        } else {
            $data = array(
                'id' => 1,
                'lokasi' => $this->input->post('kota'),
                'nama_toko' => $this->input->post('nama_toko'),
                'no_telpon' => $this->input->post('no_telpon'),
                'alamat_toko' => $this->input->post('alamat_toko'),

            );
            $this->m_admin->edit($data);
            $this->session->set_flashdata('pesan', 'Settingan berhasil diubah !');
            redirect('admin/setting');
        }
    }
}
