<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gambarbarang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_gambarbarang');
        $this->load->model('m_barang');
    }

    public function index()
    {
        $data = array(
            'title' => 'Gambar barang',
            'gambarbarang'  => $this->m_gambarbarang->get_all_data(),
            'isi'   => 'gambarbarang/v_index'
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function add($id_barang)
    {
        $data = array(
            'title' => 'Add gambar barang',
            'barang' => $this->m_barang->get_data($id_barang),
            'gambar'  => $this->m_gambarbarang->get_gambar($id_barang),
            'isi'   => 'gambarbarang/v_add'
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
}
