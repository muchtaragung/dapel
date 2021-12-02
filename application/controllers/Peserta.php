<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('peserta_model', 'peserta');
    }


    public function index()
    {
        $data['dapel'] = $this->peserta->get_all()->result();
        $this->load->view('peserta', $data);
    }
    public function detail($id_peserta)
    {
        $peserta = $this->peserta->get_where(['id_peserta' => $id_peserta])->row();
        $nama = $peserta->nama_peserta;
        // $superior_name = $peserta->superior_name;
        // var_dump($peserta);
        // var_dump($superior_name);
        // die;
        $data['peserta'] = $peserta;
        $data['superior_name'] =  $this->peserta->get_where(['direct_superior' => $nama])->result();
        $data['direct_superior'] =  $this->peserta->get_where(['superior_name' => $nama])->result();
        $this->load->view('detail', $data);
    }
}
