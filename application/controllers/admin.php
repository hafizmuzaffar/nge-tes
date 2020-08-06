<?php
class Admin extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_user');
        if ($this->session->userdata('id') == '') {
            redirect('login/logout');
        }
    }
 //
    function index(){
    	$this->load->model('m_user');

        $data['jakul'] = $this->m_user->jakul()->result();
         $data['matkul'] = $this->m_user->list('matkul');
         $data['prodi'] = $this->m_user->list('prodi');
         $data['ruangan'] = $this->m_user->list('ruangan');
         $data['dosen'] = $this->m_user->list('dosen');
         $data['kelas'] = $this->m_user->list('kelas');
         $data['tahunakademik'] = $this->m_user->list('tahunakademik');
        //$data['totaldokter'] = $this->m_user->total_dokter()->num_rows();
        //$data['totalpasien'] = $this->m_user->total_pasien()->num_rows();
        //$data['totalantrian'] = $this->m_user->total_antrian()->num_rows();
        $data['title'] = $this->session->userdata('level');
        $this->load->view('admin/home',$data);
    }
    function store_jadwal()
    {

        $data = array( 
            'idmatkul' => $this->input->post('idmatkul'), 
            'idprodi'  => $this->input->post('idprodi'), 
            'idruangan'=> $this->input->post('idruangan'), 
            'hari'     => $this->input->post('hari'), 
            'id_kelas' => $this->input->post('id_kelas'), 
            'nik'      => $this->input->post('nik'), 
            'jamawal'  => $this->input->post('jamawal'), 
            'jamakhir' => $this->input->post('jamakhir'),
            'tahunid' => $this->input->post('tahunid'),  
        );
        $masuk = $this->m_user->insert_data('jakul',$data);  
      redirect('admin/index');
    }
     function store_matkul()
    {

        $data = array( 
            'idmatkul' => $this->input->post('idmatkul'), 
            'idprodi'  => $this->input->post('idprodi'), 
            'idruangan'=> $this->input->post('idruangan'), 
            'hari'     => $this->input->post('hari'), 
            'id_kelas' => $this->input->post('id_kelas'), 
            'nik'      => $this->input->post('nik'), 
            'jamawal'  => $this->input->post('jamawal'), 
            'jamakhir' => $this->input->post('jamakhir'),  
        );
        $masuk = $this->m_user->insert_data('jakul',$data);  
      redirect('admin/index');
    }
     function data_user()
    {
        $this->load->model('m_user');
        $data['user'] = $this->m_user->user()->result();
        $data['title'] = $this->session->userdata('level');
        $this->load->view('admin/data_user',$data);
    }
     function edit_dosen()
    {
        $id = $this->uri->segment(3);
        $data['dosen'] = $this->m_user->Getdatabyid('dosen', 'nik', $id)->row_array();
        $this->load->view('admin/edit_dosen', $data);
    }
    function edit_dosen_simpan()
    {
        $this->load->model('m_user');
         $data = array( 
            'nik' => $this->input->post('nik2'),
            'nm_dosen' => $this->input->post('nm_dosen')
        );  
        $where = array('nik' => $this->input->post('nik'));
        $this->m_user->update_dosen($where,$data,'dosen');
        redirect('admin/data_dosen');
    }

     function store_user()
    {
        $id = $this->input->post('id');
         $data = array(
            'nomor' => $this->input->post('nomor'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'), 
            'level' => $this->input->post('level'),
        );
         $this->db->where('id', $id);
        $this->db->update('users', $data);
        redirect('admin/data_user');
    }
     function edit_user()
    {
        $id = $this->uri->segment(3);
        $data['user'] = $this->m_user->Getdatabyid('users', 'id', $id)->row_array();
        $this->load->view('admin/edit_user', $data);
    }
     function edit_jadwal()
    {
         $id = $this->uri->segment(3);
         $data['jakul'] = $this->m_user->Getdatabyid('jakul', 'idjakul', $id)->row_array();
          $data['kelas'] = $this->m_user->list('kelas');
           $data['dosen'] = $this->m_user->list('dosen');
           $data['matkul'] = $this->m_user->list('matkul');
               $data['ruangan'] = $this->m_user->list('ruangan');
        $this->load->view('admin/edit_jadwal',$data);
    }
    function edit_jadwal_simpan()
    {
        $idjakul = $this->input->post('idjakul');
         $data = array( 
            'idmatkul' => $this->input->post('idmatkul'), 
            'idruangan'=> $this->input->post('idruangan'), 
            'hari'     => $this->input->post('hari'), 
            'id_kelas' => $this->input->post('id_kelas'), 
            'nik'      => $this->input->post('nik'), 
            'jamawal'  => $this->input->post('jamawal'), 
            'jamakhir' => $this->input->post('jamakhir'),
        );  
         $this->db->where('idjakul', $idjakul);
        $this->db->update('jakul', $data);
        redirect('admin/index');
    }

         function edit_matkul()
    {
         $id = $this->uri->segment(3);
         $data['matkul'] = $this->m_user->Getdatabyid('matkul', 'idmatkul', $id)->row_array();
        
        $this->load->view('admin/edit_matkul',$data);
    }
    function edit_matkul_simpan()
    {
        $this->load->model('m_user');
         $data = array( 
            'nm_matkul' => $this->input->post('nm_matkul'),
            'sks' => $this->input->post('sks'),
           
        );  
        $where = array('idmatkul' => $this->input->post('idmatkul'));
        $this->m_user->update_matkul($where,$data,'matkul');
        redirect('admin/data_matkul');
    }
    function edit_mahasiswa()
    {
         $id = $this->uri->segment(3);
        $data['mhs'] = $this->m_user->Getdatabyid('mhs', 'npm', $id)->row_array();
         $data['prodi'] = $this->m_user->list('prodi');
           $data['kelas'] = $this->m_user->list('kelas');
           $data['tahunakademik'] = $this->m_user->list('tahunakademik');
        $this->load->view('admin/edit_mhs',$data);
    }
    
function edit_mahasiswa_simpan()
    {
         $id = $this->input->post('npm');
         $data = array( 
            'nm_mhs' => $this->input->post('nm_mhs'), 
            'idprodi'=> $this->input->post('idprodi'),  
            'id_kelas' => $this->input->post('id_kelas'), 
            'tahunid'  => $this->input->post('tahunid'), 
        );  
         $this->db->where('npm', $id);
        $this->db->update('mhs', $data);
        redirect('admin/data_mahasiswa');
    }
    function data_mahasiswa()
    {
        $this->load->model('m_user');
        $data['mhs'] = $this->m_user->mhs()->result();
        $data['title'] = $this->session->userdata('level');
        $this->load->view('admin/data_mahasiswa',$data);
    }

        public function store_mahasiswa()
    {
        $data = array(
            'npm' => $this->input->post('npm'), 
            'nm_mhs' => $this->input->post('nm_mhs'), 
            'idprodi' => $this->input->post('idprodi'), 
            'id_kelas' => $this->input->post('kelas'), 
            'tahunid' => $this->input->post('tahunid'), 
        );
        $masuk = $this->m_user->insert_data('mhs',$data);

        $data2 = array(
            'nomor' => $this->input->post('npm'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')), 
            'email' => $this->input->post('email'), 
            'level' => 'Mahasiswa',
        );
        $masuk2 = $this->m_user->insert_data('users',$data2);
        redirect('admin/data_mahasiswa');
    }

    function data_dosen()
    {
        $this->load->model('m_user');
        $data['dosen'] = $this->m_user->dosen()->result();
        $data['title'] = $this->session->userdata('level');
        $this->load->view('admin/data_dosen',$data);
    }
    function data_jadwal()
    {
        $this->load->view('admin/data_jadwal');
    }
    function data_matkul()
    {
        $this->load->model('m_user');
        $data['mtkl'] = $this->m_user->mtkl()->result();
        $data['title'] = $this->session->userdata('level');
        $this->load->view('admin/data_matkul',$data);
    }

    public function data_kelas()
    {
        $data['kelas'] = $this->m_user->list('kelas');
        $this->load->view('admin/data_kelas',$data);
    }

    public function input_kelas()
    {
        $this->load->view('admin/input_kelas');
    }

    public function store_kelas()
    {
        $data = array(
            'nama_kelas' => $this->input->post('nama_kelas') 
        );

        $masuk = $this->m_user->insert_data('kelas',$data);
        redirect('admin/data_kelas');
    }

     public function tambah_mahasiswa()
    {
        $data['tahunakademik'] = $this->m_user->list('tahunakademik');
        $data['kelas'] = $this->m_user->list('kelas');
        $data['prodi'] = $this->m_user->list('prodi');
        $this->load->view('admin/tambah_mahasiswa',$data);
    }



     
     public function tambah_dosen()
    {
        
        $data['dosen'] = $this->m_user->list('dosen');
        $this->load->view('admin/tambah_dosen', $data);
    }
    public function store_dosen()
    {
        $data = array(
            'nik' => $this->input->post('nik'), 
            'nm_dosen' => $this->input->post('nm_dosen'), 
        );
        $masuk = $this->m_user->insert_data('dosen',$data);

         $data2 = array(
            'nomor' => $this->input->post('nik'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')), 
            'email' => $this->input->post('email'), 
            'level' => 'Dosen',
        );
        $masuk2 = $this->m_user->insert_data('users',$data2);
        redirect('admin/data_dosen');
    }
     function data_nilai()
    {
        $this->load->model('M_user');
        $data['mhs'] = $this->m_user->mhs();
        $data['kelas'] = $this->m_user->kelas();
         $data['nilai'] = $this->m_user->nilai()->result();
         $data['title'] = $this->session->userdata('level');
        $this->load->view('admin/data_nilai',$data);
    }
    function nilai_perkelas()
    {
        $kelas = $this->uri->segment(3);
        $tahun = $this->uri->segment(4);
        $this->load->model('M_user');
        $data['prodi'] = $this->m_user->list('prodi');
        $data['nilai'] = $this->m_user->list('nilai');
        $data['kelas'] = $this->m_user->list('kelas');
        
        $data['id_kelas'] = $this->uri->segment(3);
        $data['tahun'] = $this->uri->segment(4);
        $data['lihat_perkelas'] = $this->m_user->lihat_perkelas($kelas, $tahun);
        $this->load->view('admin/nilai_perkelas', $data);
    }
    function tahun_akademik()
    {
        $this->load->model('m_user');
        $data['tahunid'] = $this->m_user->list_tahunak()->result();
        $this->load->view('admin/tahun_akademik', $data);
    }
    function store_akademik()
    {
        $data = array(
            'semester' => "Semester Ganjil",
            'tahun' => $this->input->post('tahun'), 
            'idsemester' => 1, 
            'status' => 'aktif', 
            'waktuawal' => $this->input->post('waktuawal1'), 
            'bataswaktu' => $this->input->post('bataswaktu1'), 
           
        );
        $masuk = $this->m_user->insert_data('tahunakademik',$data);

         $data2 = array(
            'semester' => "Semester Genap",
            'tahun' => $this->input->post('tahun'),
            'idsemester' => 2,
            'status' => 'aktif',
            'waktuawal' => $this->input->post('waktuawal2'),
            'bataswaktu' => $this->input->post('bataswaktu2'), 
        );
        $masuk2 = $this->m_user->insert_data('tahunakademik',$data2);

         $data3 = array(
            'semester' => "Semester Pendek",
            'tahun' => $this->input->post('tahun'),
            'idsemester' => 3,
            'status' => 'aktif',
            'waktuawal' => $this->input->post('waktuawal3'),
            'bataswaktu' => $this->input->post('bataswaktu3'), 
        );
        $masuk3 = $this->m_user->insert_data('tahunakademik',$data3);
        redirect('admin/tahun_akademik');
    }
     function sudah_selesai()
    {
        $kelas = $this->uri->segment(3);
        $update = $this->m_user->update_nilai($kelas);
        if ($update) {
            redirect('admin/data_nilai');
        }
}
    
    function aktifkansemester() {
        $tahunid = $this->uri->segment(3);

        $update = $this->m_user->aktifkansemester($tahunid);
        if ($update) {
            redirect('admin/tahun_akademik');
        }
    }

    function nonaktifkansemester() {
        $tahunid = $this->uri->segment(3);

        $update = $this->m_user->nonaktifkansemester($tahunid);
        if ($update) {
            redirect('admin/tahun_akademik');
        }
    }

    function finalisasi_nilai() {
        $id_kelas = $this->uri->segment(3);

        $update = $this->m_user->finalisasi_nilai($id_kelas);
        if ($update) {
            redirect('admin/data_nilai');
        }
    }

    function cetak_berita_acara(){
            //$this->load->model('M_user');
            //$key = $this->M_user->list_cetak_berita_acara()->result();

                $this->load->library('pdf');
                $pdf = new FPDF('P', 'mm', 'A4');

                $pdf->AddPage();
                // setting jenis font yang akan digunakan
                $pdf->SetFont('Arial', 'B', 16);
                // mencetak string 
                $pdf->Cell(45, 7, '', 0, 0, 'C');
                $pdf->Image('http://localhost/tugasa/images/download.png',10,5,27,27);
                $pdf->Cell(100, 12,  'POLITEKNIK POS INDONESIA', 0, 1, 'C');
                $pdf->SetFont('Arial', '', 12);
                $pdf->Cell(200, 17, 'Jalan Sariasih No.54, Sarijadi, Sukasari, Kota Bandung, Jawa Barat 40151', 0, 0, 'C');
                $pdf->Cell(365, 7, '', 0, 1, 'C');
                $pdf->Cell(70, 7, '', 0, 2, 'C');
                $pdf->Cell(285, 7, '', 0, 1, 'C');
                $pdf->Line(10,35, 220-20, 35);
                $pdf->Line(10,35.5, 220-20, 35.5);
                
                

                $pdf->Cell(70, 7, '', 0, 0, 'C');
                $pdf->Cell(285, 7, '', 0, 1, 'C');


                //tabel hasil donasi
                $pdf->Cell(1,7, '',0,0,'C');
                $pdf->MultiCell(188, 5.5, 'Menyatakan bahwa input nilai ke dalam sistem telah selesai dan menandakan juga berakhirnya semester pada tahun akademik yang dicantumkan di bawah ini:
                    ',0,'J');

                $tahunid = $this->uri->segment(3);

                $data = $this->m_user->getSemesterbyid($tahunid);

                 $pdf->Cell(10, 7, '', 0, 3, 'C');
                $pdf->Cell(40, 7, 'Tahun', 1, 0, 'C');
                $pdf->Cell(75, 7, 'Semester', 1, 0, 'C');
                $pdf->Cell(65, 7, 'Keterangan', 1, 1, 'C');
                
                    
               
                $pdf->Cell(40, 7, $data->tahun, 1, 0, 'C');
                $pdf->Cell(75, 7, $data->semester, 1, 0, 'C');
                $pdf->Cell(65, 7, 'Selesai', 1, 1, 'C');




                 $pdf->Cell(70, 7, '', 0, 0, 'C');
                $pdf->Cell(285, 7, '', 0, 1, 'C');


                //tabel hasil donasi
                $pdf->Cell(1,7, '',0,0,'C');
                $pdf->MultiCell(188, 5.5, 'Berita acara ini dibuat setelah selesainya prosedur yang dilaksanakan dengan sebenar-benarnya. ',0,'J');
                 $pdf->Cell(10, 7, '', 0, 3, 'C');
                
            
                 $pdf->Cell(1,7, '',0,0,'C');
                $pdf->Cell(230, 9, '', 0, 0, 'C');

                $pdf->Cell(50, 9, 'harga_total', 1, 1, 'C');

                $pdf->Cell(130, 10, '', 0, 1);
                $pdf->Cell(130, 10, '', 0, 1);
                $pdf->Cell(110, 10, '', 0, 0);
                $pdf->Cell(215, 10, 'Tanggal Cetak', 0, 0, 'R');
                $pdf->Cell(43, 10, ': '.date('d-F-Y '), 0, 0, 'R');
                $pdf->Output('cetak-bukti-donasi.pdf','I');
            }
}