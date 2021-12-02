<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('peserta_model', 'peserta');
        $this->load->model('data_model', 'data');
    }


    public function index()
    {
        $data['dapel'] = $this->peserta->get_all()->result();
        $this->load->view('peserta', $data);
    }
    public function import()
    {
        $file = $_FILES['csv']['tmp_name'];

        // Medapatkan ekstensi file csv yang akan diimport.
        $ekstensi  = explode('.', $_FILES['csv']['name']);

        // Tampilkan peringatan jika submit tanpa memilih menambahkan file.
        if (empty($file)) {
            $this->session->set_flashdata('error', 'Anda belum memilih file yang akan diimport.');
        } else {
            // Validasi apakah file yang diupload benar-benar file csv.
            if (strtolower(end($ekstensi)) === 'csv' && $_FILES["csv"]["size"] > 0) {

                $i = 0;
                $handle = fopen($file, "r");
                while (($row = fgetcsv($handle, 2048))) {
                    $i++;
                    if ($i == 1) continue;

                    // goal
                    if ($row[2] == 1) {
                        $row[2] = 'punya';
                    } else if ($row[2] == 2) {
                        $row[2] = 'tidak';
                    }

                    // locus
                    if ($row[3] == 1) {
                        $row[3] = 'internal';
                    } else if ($row[3] == 2) {
                        $row[3] = 'eksternal';
                    }

                    // knowledge
                    if ($row[4] == 1) {
                        $row[4] = 'high';
                    } else if ($row[4] == 2) {
                        $row[4] = 'low';
                    }

                    // skill
                    if ($row[5] == 1) {
                        $row[5] = 'high';
                    } else if ($row[5] == 2) {
                        $row[5] = 'low';
                    }


                    // Data yang akan disimpan ke dalam databse
                    $data['nama']      = $row[1];
                    $data['goal']      = strtolower($row[2]);
                    $data['locus']     = strtolower($row[3]);
                    $data['knowledge'] = strtolower($row[4]);
                    $data['skill']     = strtolower($row[5]);

                    // Simpan data ke database.
                    $this->data->save($data);
                }

                fclose($handle);
                $this->session->set_flashdata('msg', 'Berhasil Import Data');
                redirect('peserta');
            } else {
                $this->session->set_flashdata('error', 'Anda belum memilih file yang akan diimport.');
            }
        }
    }
    public function truncate()
    {
        $this->db->query('TRUNCATE `data`');
        $this->session->set_flashdata('msg', 'Berhasil Menghapus Data');
        redirect('peserta');
    }
}
