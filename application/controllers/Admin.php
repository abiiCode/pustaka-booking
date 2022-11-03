<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          //cek_login();
     }

     public function index()
     {
          $data['judul'] = 'Dashboard';
          $this->load->view('templates/header', $data);
          $this->load->view('admin/sidebar', $data);
          $this->load->view('templates/topbar', $data);
          $this->load->view('admin/index', $data);
          $this->load->view('templates/footer');
     }

     public function biodata_anggota()
     {
          $data['judul'] = 'Biodata';
          $this->load->view('templates/header', $data);
          $this->load->view('admin/sidebar', $data);
          $this->load->view('templates/topbar', $data);
          $this->load->view('admin/biodataform');
          $this->load->view('templates/footer');
     }

     public function biodata()
     {
          //membuat rule untuk inputan nama agar tidak boleh kosong dengan membuat pesan error dengan
          //bahasa sendiri yaitu 'Nama Belum diisi'
          $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
               'required' => 'Nama Belum diis!!'
          ]);
          //membuat rule untuk inputan email agar tidak boleh kosong, tidak ada spasi, format email harus valid
          //dan email belum pernah dipakai sama user lain dengan membuat pesan error dengan bahasa sendiri
          //yaitu jika format email tidak benar maka pesannya 'Email Tidak Benar!!'. jika email belum diisi,
          //maka pesannya adalah 'Email Belum diisi', dan jika email yang diinput sudah dipakai user lain,
          //maka pesannya 'Email Sudah dipakai'
          $this->form_validation->set_rules('nis', ' NIS', 'required|is_unique[anggota.nis]', [
               'required' => 'NIS Belum diisi!!',
               'is_unique' => 'NIS Sudah Terdaftar!'
          ]);
          //membuat rule untuk inputan password agar tidak boleh kosong, tidak ada spasi, tidak boleh kurang dari
          //dari 3 digit, dan password harus sama dengan repeat password dengan membuat pesan error dengan
          //bahasa sendiri yaitu jika password dan repeat password tidak diinput sama, maka pesannya
          //'Password Tidak Sama'. jika password diisi kurang dari 3 digit, maka pesannya adalah
          //'Password Terlalu Pendek'.
          $this->form_validation->set_rules('kelas', 'Kelas', 'required', [
               'required' => 'Kelas Belum diis!!'
          ]);
          //jika jida disubmit kemudian validasi form diatas tidak berjalan, maka akan tetap berada di
          //tampilan registrasi. tapi jika disubmit kemudian validasi form diatas berjalan, maka data yang
          //diinput akan disimpan ke dalam tabel user
          if ($this->form_validation->run() == false) {
               $data['judul'] = 'Biodata';
               $this->load->view('templates/header', $data);
               $this->load->view('admin/sidebar', $data);
               $this->load->view('templates/topbar', $data);
               $this->load->view('admin/biodataform');
               $this->load->view('templates/footer');
          } else {
               $data = [
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'nis' => htmlspecialchars($this->input->post('nis', true)),
                    'kelas' => htmlspecialchars($this->input->post('kelas', true)),
                    'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
                    'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                    'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')),
                    'agama' => htmlspecialchars($this->input->post('agama')),
               ];

               $this->model_anggota->tambahAnggota($data); //menggunakan model

               $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Anda Telah Tersimpan</div>');
               redirect('admin/Tampil_Biodata');
          }
     }


     public function Tampil_Biodata()
     {
          $data['anggota'] = $this->model_anggota->tampil_biodata();
          $data['judul'] = 'Biodata';
          $this->load->view('templates/header', $data);
          $this->load->view('admin/sidebar', $data);
          $this->load->view('templates/topbar', $data);
          $this->load->view('admin/tampil_biodata', $data);
          $this->load->view('templates/footer');
     }
}
