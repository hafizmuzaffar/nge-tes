<?php
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_user');
    }
 
    function index()
    {       
            if ($this->session->userdata('level') == '') {
                # code...
            $this->load->view('v_login');
            }
    }
 
    function auth(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($username == 'admin') {
            $cek = $this->m_user->cek_login_admin("users",$username,$password);
        } elseif ($username == 'superadmin') {
            $cek = $this->m_user->cek_login_admin("users",$username,$password);
        } else {
            $cek = $this->m_user->cek_login("users",$username,$password);
        }
        if($cek->num_rows() > 0){
            $data_user = $cek->row();
            $data_session = array(
                'id' =>$data_user->id,
                'username' => $username,
                'nama' => $data_user->nm_dosen,
                'level' => $data_user->level,
                'nomor' => $data_user->nomor
            );

            $this->session->set_userdata($data_session);

            if ($data_user->level == 'Admin') {
                redirect('admin');
            }elseif ($data_user->level == 'Mahasiswa') {
                redirect('mahasiswa');
            }elseif ($data_user->level == 'Dosen') {
                redirect('dosen');
            }elseif ($data_user->level == 'Super') {
                redirect('super');
            }
            {
                echo "login gagal";
            }

        }else{
            echo "<script type='text/javascript'>
            alert ('Maaf Username Dan Password Anda Salah !');
            document.write ('<center><h1> Harap Masukan Username Dan Password Dengan Benar !</h1></center><center><h1> Penilaian </h1></center>');
            </script>";
        }
 
    }
 
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('welcome/'));
    }
 
}