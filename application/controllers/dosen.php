<?php
class Dosen extends CI_Controller{
    function __construct(){
        parent::__construct();
        // $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $this->load->model('m_user');
         $this->load->library('excel');
        // if ($this->session->userdata('id_user') == '') {
        //     redirect('login/logout');
        // }
    }
    // function excel()
    // {
    //     $this->load->view('excel');
    // }
     function index(){
        $this->load->model('m_user');

        $nik = $this->session->userdata('nomor');
        $data['jakul'] = $this->m_user->jakul_by_nik($nik)->result();
        $data['title'] = $this->session->userdata('level');
        
        $this->load->view('dosen/home',$data);
    }
    function input_nilai(){
        $data['prodi'] = $this->m_user->list('prodi');
        $data['kelas'] = $this->m_user->list('kelas');
        $data['tahunakademik'] = $this->m_user->list('tahunakademik');
        $data['matkul'] = $this->m_user->list('matkul');

        $this->load->view('dosen/input_nilai',$data);
    }
    function edit_nilai()
    {
        $id = $this->uri->segment(3);
        $data['nilai'] = $this->m_user->Getdatabyid('nilai', 'id_nilai', $id)->row_array();
        $this->load->view('dosen/edit_nilai', $data);
    }

    function edit_nilai_final()
    {
        $id = $this->uri->segment(3);
        $data['nilai'] = $this->m_user->Getdatabyid('nilai', 'id_nilai', $id)->row_array();
        $this->load->view('dosen/edit_nilai_final', $data);
    }

    function edit_nilai_simpan()
    {
        $uas = $this->input->post('uas');
        $uts = $this->input->post('uts');
        $tugas = $this->input->post('tugas');
        $absen = $this->input->post('absen');

        $h_uas = ($uas/100)*30;
        $h_uts = ($uts/100)*25;
        $h_tugas = ($tugas/100)*25;
        $h_absen = ($absen/14)*20;
        $total = $h_uas + $h_uts + $h_tugas + $h_absen;
        if ($total >= 85 && $total <= 100) {
            $nilai = 'A';
        }elseif ($total >= 75 && $total <= 84) {
            $nilai = 'B';
        }elseif ($total >= 65 && $total <= 74) {
            $nilai = 'C';
        }elseif ($total >= 55 && $total <= 64) {
            $nilai = 'D';
        }elseif ($total >= 0 && $total <= 54) {
            $nilai = 'E';
        }else{
            $nilai = 'Tidak ada hasil';
        }
        $bobot = $nilai;
        $id = $this->input->post('id_nilai');
        $data = array(
            'uas' => $this->input->post('uas'),
            'uts' => $this->input->post('uts'),
            'tugas' => $this->input->post('tugas'),
            'absen' => $this->input->post('absen'),
            'bobot' => $nilai,
            'total' => $total,
        );

        $this->db->where('id_nilai', $id);
        $this->db->update('nilai', $data);
        echo "<script type='text/javascript'>
            alert ('nilai berhasil Di simpan');
            </script>";
            echo "<script>location='".base_url('dosen/data_nilai')."'; </script>";
        // redirect('dosen/data_nilai');
    }

    function edit_nilai_final_simpan()
    {
        $uas = $this->input->post('uas');
        $uts = $this->input->post('uts');
        $tugas = $this->input->post('tugas');
        $absen = $this->input->post('absen');

        $h_uas = ($uas/100)*30;
        $h_uts = ($uts/100)*25;
        $h_tugas = ($tugas/100)*25;
        $h_absen = ($absen/14)*20;
        $total = $h_uas + $h_uts + $h_tugas + $h_absen;
        if ($total >= 85 && $total <= 100) {
            $nilai = 'A';
        }elseif ($total >= 75 && $total <= 84) {
            $nilai = 'B';
        }elseif ($total >= 65 && $total <= 74) {
            $nilai = 'C';
        }elseif ($total >= 55 && $total <= 64) {
            $nilai = 'D';
        }elseif ($total >= 0 && $total <= 54) {
            $nilai = 'E';
        }else{
            $nilai = 'Tidak ada hasil';
        }
        $bobot = $nilai;
        $id = $this->input->post('id_nilai');
        $data = array(
            'uas' => $this->input->post('uas'),
            'uts' => $this->input->post('uts'),
            'tugas' => $this->input->post('tugas'),
            'absen' => $this->input->post('absen'),
            'bobot' => $nilai,
            'total' => $total,
        );

        $this->db->where('id_nilai', $id);
        $this->db->update('nilai', $data);
        echo "<script type='text/javascript'>
            alert ('nilai berhasil Di simpan');
            </script>";
            echo "<script>location='".base_url('dosen/form_laporan')."'; </script>";
        // redirect('dosen/data_nilai');
    }

    function fetch()
    {
        $data = $this->m_user->list('nilai');
        $output = '
        <h3 align="center">Input Nilai - '.$data->num_rows().'</h3>
        <table class="table table-striped table-bordered">
            <tr>
                <th>Uas</th>
                <th>Uts</th>
                <th>Tugas</th>
                <th>Absen</th>
                <th>Bobot</th>
                <th>total</th>
            </tr>
        ';
        foreach($data->result() as $row)
        {
            $output .= '
            <tr>
                <td>'.$row->uas.'</td>
                <td>'.$row->uts.'</td>
                <td>'.$row->tugas.'</td>
                <td>'.$row->absen.'</td>
                <td>'.$row->bobot.'</td>
                <td>'.$row->total.'</td>

            </tr>
            ';
        }
        $output .= '</table>';
        echo $output;
    }

    public function data_nilai()
    {
        $data['nilai'] = $this->m_user->list_nilai_belum_ferivikasi('nilai');
        $this->load->view('dosen/data_nilai',$data);
    }

    function finalisasi_nilai() {
        $id_nilai = $this->uri->segment(3);

        $update = $this->m_user->finalisasi_nilai_dosen($id_nilai);
        if ($update) {
            echo "<script type='text/javascript'>
            alert ('nilai berhasil Di Fwinalisasi');
            </script>";
            echo "<script>location='".base_url('dosen/data_nilai')."'; </script>";
        }
    }

    function data_kelas()
    {
        $tahunid = $this->input->post('tahunid');

        $this->load->model('M_user');
        $data['kelas'] = $this->m_user->kelas_by_id($tahunid);
        $data['prodi'] = $this->m_user->list('prodi');
        $data['semester'] = $this->m_user->list('semester');
        $data['tahunakademik'] = $this->m_user->list('tahunakademik');
        $this->load->view('dosen/data_kelas', $data);
    }
    function data_perkelas($kelas, $tahun)
    {
        $this->load->model('M_user');
        $kelas = $this->uri->segment(3);
        $tahun = $this->uri->segment(4);
        // $data['prodi'] = $this->m_user->list('prodi');
        // $data['kelas'] = $this->m_user->list('kelas');
        // $data['tahunakademik'] = $this->m_user->list('tahunakademik');
        $data['lihat_perkelas'] = $this->m_user->lihat_perkelas_aja($kelas, $tahun);
        // print_r($data['lihat_perkelas']);
        $this->load->view('dosen/data_perkelas', $data);
    }

    function import()
    {
        $tahunid = $this->input->post('provinsi');
        $bobot_uts = $this->input->post('bobot_uts');
        $bobot_uas = $this->input->post('bobot_uas');
        $bobot_tugas = $this->input->post('bobot_tugas');
        $bobot_absen = $this->input->post('bobot_absen');

        if ($bobot_uts + $bobot_uas + $bobot_tugas + $bobot_absen < 100) {
            echo "<script>alert('Jumlah Bobot yang Dimasukkan Kurang Dari 100')</script>";
            echo "<script>location='input_nilai' </script>";
        } else if ($bobot_uts + $bobot_uas + $bobot_tugas + $bobot_absen > 100) {
            echo "<script>alert('Jumlah Bobot yang Dimasukkan Lebih Dari 100')</script>";
            echo "<script>location='input_nilai' </script>";
        } else {

        $sql = $this->m_user->getjakulbyid($tahunid);

        $id_kelas  = $sql->row()->id_kelas;
        $idprodi  = $sql->row()->idprodi;
        $idmatkul  = $sql->row()->idmatkul;
        
        if(isset($_FILES["file"]["name"]))
        {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach($object->getWorksheetIterator() as $worksheet)
            {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($row=2; $row<=$highestRow; $row++)
                {

                    $uas = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $uts = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $tugas = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $absen = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    // $h_uas = ($uas/100)*30;
                    // $h_uts = ($uts/100)*25;
                    // $h_tugas = ($tugas/100)*25;
                    // $h_absen = ($absen/14)*20;
                    $h_uas = ($uas/100)*$bobot_uas;
                    $h_uts = ($uts/100)*$bobot_uts;
                    $h_tugas = ($tugas/100)*$bobot_tugas;
                    $h_absen = ($absen/14)*$bobot_absen;
                    $total = $h_uas + $h_uts + $h_tugas + $h_absen;
                    if ($total > 84 && $total < 101) {
                        $nilai = 'A';
                    }elseif ($total > 74 && $total < 83) {
                        $nilai = 'B';
                    }elseif ($total > 64 && $total < 73) {
                        $nilai = 'C';
                    }elseif ($total > 54 && $total < 64) {
                        $nilai = 'D';
                    }elseif ($total >= 0 && $total < 53) {
                        $nilai = 'E';
                    }else{
                        $nilai = 'Tidak ada hasil';
                    }
                    $bobot = $nilai;
                    $npm = $worksheet->getCellByColumnAndRow(0, $row)->getValue();

                    $data[] = array(
                        'idmatkul'      =>  $idmatkul,
                        'tahunid'    =>  $tahunid,
                        'id_kelas'      =>  $id_kelas,
                        'idprodi'       =>  $idprodi,
                        'uas'           =>  $uas,
                        'uts'           =>  $uts,
                        'tugas'         =>  $tugas,
                        'absen'         =>  $absen,
                        'total'         =>  $total,
                        'bobot'         =>  $bobot,
                        'npm'           =>  $npm
                    );
                }
            }

            $status = $this->m_user->getSemesterbyid($tahunid);

            if ($status->status == "non aktif") {
                echo "<script>alert('Semester yang dipilih sudah tidak aktif')</script>";
                echo "<script>location='input_nilai' </script>";

            } else {
            //validasi tanggal sekarang, apakah masih masuk di jangka waktu. bila tidak, tidak bisa input.
            $this->m_user->insert($data);
            $data['nilai'] = $data;
            // print_r($data['nilai']);
            echo "<script>alert('Data disimpan')</script>";
            $this->load->view('dosen/nilainya',$data);
            // redirect('dosen/data_kelas');
        }
        } 
        }  
    }
   function export_perkelas()
    {
        $output = '';
        $kelas = $this->input->post('id_kelas');
        $tahun = $this->input->post('tahun');
        $this->load->model('M_user');
        $lihat_perkelas = $this->m_user->lihat_perkelas($kelas, $tahun);
        $no = 1;
        $output .= '
       <table class="table" bordered="1">
                        <tr>
                        <th>npm</th>
                        <th>nama</th>
                        <th>kelas</th>
                        <th>uas</th>
                        <th>uts</th>
                        <th>tugas</th>
                        <th>absen</th>
                        </tr>
      ';
      foreach ($lihat_perkelas as $row) {
       $output .= '
        <tr>
        <td>'.$row->npm.'</td>
        <td>'.$row->nm_mhs.'</td>
        <td>'.$row->nama_kelas.'</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
                        </tr>
       ';
      }
      $output .= '</table>';
      header('Content-Type: application/xls');
      header('Content-Disposition: attachment; filename=DataKelas.xls');
      echo $output;
    }
    public function export() {
        $output = '';
        $kelas = $this->input->post('id_kelas');
        $tahun = $this->input->post('tahun');
       

        $this->load->model('M_user');
    

        error_reporting(E_ALL);
    
        include_once '../assets/phpexcel/Classes/PHPExcel.php';

        $data = $this->m_user->lihat_perkelas_aja($kelas, $tahun);
        $excel = new PHPExcel();
            // Settingan awal fil excel
            $excel->getProperties()->setCreator('My Notes Code')
                         ->setLastModifiedBy('My Notes Code')
                         ->setTitle("Data Kelas")
                         ->setSubject("Data Kelas")
                         ->setDescription("Laporan Data Kelas")
                         ->setKeywords("Data Kelas ");
            // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
            $style_col = array(
              'font' => array('bold' => true), // Set font nya jadi bold
              'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
              ),
              'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
              )
            );
            // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
            $style_row = array(
              'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
              ),
              'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
              )
            );
            // Buat header tabel nya pada baris ke 3
            $excel->setActiveSheetIndex(0)->setCellValue('A1', "npm"); // Set kolom A3 dengan tulisan "NO"
            $excel->setActiveSheetIndex(0)->setCellValue('B1', "nama"); // Set kolom B3 dengan tulisan "NIS"
            $excel->setActiveSheetIndex(0)->setCellValue('C1', "kelas"); // Set kolom C3 dengan tulisan "NAMA"
            $excel->setActiveSheetIndex(0)->setCellValue('D1', "uas"); // 
            $excel->setActiveSheetIndex(0)->setCellValue('E1', "uts"); // Set kolom E3 dengan tulisan "ALAMAT"
            $excel->setActiveSheetIndex(0)->setCellValue('F1', "tugas"); // Set kolom E3 dengan tulisan "ALAMAT"
            $excel->setActiveSheetIndex(0)->setCellValue('G1', "absen"); // Set kolom E3 dengan tulisan "ALAMAT"
            // Apply style header yang telah kita buat tadi ke masing-masing kolom header
            $excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);
            // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    
            // $no = 1; // Untuk penomoran tabel, di awal set dengan 1
            $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
            foreach($data as $data){ // Lakukan looping pada variabel siswa
              // $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
              $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->npm);
              $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nm_mhs);
              $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama_kelas);
              $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow);
              $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow);
              $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow);
              $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow);
              
              // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
              $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
              $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
              $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
              $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
              $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
              $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
              $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
              
              // $no++; // Tambah 1 setiap kali looping
              $numrow++; // Tambah 1 setiap kali looping
            }
            $excel->getActiveSheet()->getColumnDimension('A')->setWidth(10); // Set width kolom A
            $excel->getActiveSheet()->getColumnDimension('B')->setWidth(20); // Set width kolom B
            $excel->getActiveSheet()->getColumnDimension('C')->setWidth(20); // Set width kolom C
            $excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom D
            $excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); // Set width kolom E
            $excel->getActiveSheet()->getColumnDimension('F')->setWidth(15); // Set width kolom F
            $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15); // Set width kolom G
            
            // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
            $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
            // Set orientasi kertas jadi LANDSCAPE
            $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
            // Set judul file excel nya
            $excel->getActiveSheet(0)->setTitle("Laporan Data Kelas");
            $excel->setActiveSheetIndex(0);
            // Proses file excel
            $objWriter = new PHPExcel_Writer_Excel2007($excel); 
            $objWriter->save('./assets/excel/Data Kelas.xlsx'); 

            $this->load->helper('download');
            force_download('./assets/excel/Data Kelas.xlsx', NULL);
}
   


  
  public function listjakul(){
    // Ambil data ID Provinsi yang dikirim via ajax post
    $tahunid = $this->input->post('tahunid');
    $nomor = $this->session->userdata('nomor');
    
    $jakul = $this->m_user->viewBytahunakademik($tahunid, $nomor);
    
    // Buat variabel untuk menampung tag-tag option nya
    // Set defaultnya dengan tag option Pilih
    $lists = "<option value=''>Pilih</option>";
    
    foreach($jakul as $data){

      $lists .= "<option value='".$data->idjakul."'>".$data->hari.", ".$data->nm_matkul.", ".$data->jenjang." ".$data->nm_prodi."</option>"; // Tambahkan tag option ke variabel $lists
    }
    
    $callback = array('list_jakul'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
    echo json_encode($callback); // konversi varibael $callback menjadi JSON
  }

  function form_laporan()
  {
    $data['tahunakademik'] = $this->m_user->list('tahunakademik');
    $this->load->view('dosen/form_laporan',$data);
  }

  function laporan_nilai()
  {
    $tahunid = $this->input->post('tahunid');
    $data['laporan'] = $this->m_user->laporan_nilai($tahunid);
    $data['tahunakademik'] = $this->m_user->list('tahunakademik');
    $data['tahunid'] = $tahunid;
    $this->load->view('dosen/form_laporan',$data);
  }

  function laporan_nilai_excel()
  {
    $output = '';
    $tahunid = $this->uri->segment(3);
    $data['laporan'] = $this->m_user->laporan_nilai($tahunid);
    $data['tahunakademik'] = $this->m_user->list('tahunakademik');
    $data['tahunid'] = $tahunid;

    error_reporting(E_ALL);
    
    include_once '../assets/phpexcel/Classes/PHPExcel.php';

    $laporan = $this->m_user->laporan_nilai($tahunid);
    $tahunakademik = $this->m_user->list('tahunakademik');
    $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('My Notes Code')
                     ->setLastModifiedBy('My Notes Code')
                     ->setTitle("Laporan Nilai")
                     ->setSubject("Laporan Nilai")
                     ->setDescription("Laporan Nilai")
                     ->setKeywords("Data Laporan Nilai ");
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
          'font' => array('bold' => true), // Set font nya jadi bold
          'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
          )
        );
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
          'alignment' => array(
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
          )
        );
        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "Laporan Nilai"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->setActiveSheetIndex(0)->setCellValue('A2', $this->session->userdata('nama')); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A1:I1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);"NO";

        $excel->getActiveSheet()->mergeCells('A2:I2'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);"NO";

        $excel->setActiveSheetIndex(0)->setCellValue('A3', "Tahun Akademik"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "Mata Kuliah"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "NPM"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "UAS"); // 
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "UTS"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "Tugas"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "Absen"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "Bobot"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('I3', "Total"); // Set kolom E3 dengan tulisan "ALAMAT"
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    
        // $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach($laporan as $laporan){ // Lakukan looping pada variabel siswa
          // $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
          $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $laporan->semester.' - '.$laporan->tahun);
          $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $laporan->nm_matkul);
          $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $laporan->nm_mhs);
          $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $laporan->uas);
          $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $laporan->uts);
          $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $laporan->tugas);
          $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $laporan->absen);
          $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $laporan->bobot);
          $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $laporan->total);
          
          // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
          $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
          
          // $no++; // Tambah 1 setiap kali looping
          $numrow++; // Tambah 1 setiap kali looping
        }
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(30); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(20); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(20); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(15); // Set width kolom F
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15); // Set width kolom G
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); // Set width kolom G
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(15); // Set width kolom G
        
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data Kelas");
        $excel->setActiveSheetIndex(0);
        // Proses file excel
        $objWriter = new PHPExcel_Writer_Excel2007($excel); 
        $objWriter->save('./assets/excel/Laporan Nilai.xlsx'); 

        $this->load->helper('download');
        force_download('./assets/excel/Laporan Nilai.xlsx', NULL);
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
              $pdf->Cell(100, 7,  'BERITA ACARA', 0, 1, 'C');
              $pdf->SetFont('Arial', '', 12);
              $pdf->Cell(190, 7, 'Surat Terima', 0, 0, 'C');
              $pdf->Cell(365, 7, '', 0, 1, 'C');
              $pdf->Cell(70, 7, '', 0, 2, 'C');
              $pdf->Cell(285, 7, '', 0, 1, 'C');
              $pdf->Line(10,35, 220-20, 35);
              $pdf->Line(10,35.5, 220-20, 35.5);
              
              

              $pdf->Cell(70, 7, '', 0, 0, 'C');
              $pdf->Cell(285, 7, '', 0, 1, 'C');


              //tabel hasil donasi
              $pdf->Cell(1,7, '',0,0,'C');
              $pdf->MultiCell(188, 5.5, '[KALIMAT PEMBUKA] berita acara kegiatan adalah salah satu berita yang di dalamnya berisi rangkaian proses atau catatan tertentu dari sebuah kegiatan.berita acara kegiatan adalah salah satu berita yang di dalamnya berisi rangkaian proses atau catatan tertentu dari sebuah kegiatan.berita acara kegiatan adalah salah satu berita yang di dalamnya berisi rangkaian proses atau catatan tertentu dari sebuah kegiatan.',0,'J');
               $pdf->Cell(10, 7, '', 0, 3, 'C');
              $pdf->Cell(10, 7, 'no', 1, 0, 'C');
              $pdf->Cell(75, 7, 'nama', 1, 0, 'C');
              $pdf->Cell(75, 7, 'keterangan', 1, 0, 'C');
              $pdf->Cell(30, 7, 'ttd', 1, 1, 'C');
              
                  
             
              $pdf->Cell(10, 7, '1', 1, 0, 'C');
              $pdf->Cell(75, 7, 'ridwan cahyo hariyanto', 1, 0, 'C');
              $pdf->Cell(75, 7, '', 1, 0, 'C');
              $pdf->Cell(30, 7, '', 1, 1, 'C');

              $pdf->Cell(10, 7, '1', 1, 0, 'C');
              $pdf->Cell(75, 7, 'ridwan cahyo hariyanto', 1, 0, 'C');
              $pdf->Cell(75, 7, '', 1, 0, 'C');
              $pdf->Cell(30, 7, '', 1, 1, 'C');

              $pdf->Cell(10, 7, '1', 1, 0, 'C');
              $pdf->Cell(75, 7, 'ridwan cahyo hariyanto', 1, 0, 'C');
              $pdf->Cell(75, 7, '', 1, 0, 'C');
              $pdf->Cell(30, 7, '', 1, 3, 'C');


               $pdf->Cell(70, 7, '', 0, 0, 'C');
              $pdf->Cell(285, 7, '', 0, 1, 'C');


              //tabel hasil donasi
              $pdf->Cell(1,7, '',0,0,'C');
              $pdf->MultiCell(188, 5.5, '[KALIMAT PENUTUP] berita acara kegiatan adalah salah satu berita yang di dalamnya berisi rangkaian proses atau catatan tertentu dari sebuah kegiatan.berita acara kegiatan adalah salah satu berita yang di dalamnya berisi rangkaian proses atau catatan tertentu dari sebuah kegiatan.berita acara kegiatan adalah salah satu berita yang di dalamnya berisi rangkaian proses atau catatan tertentu dari sebuah kegiatan.',0,'J');
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