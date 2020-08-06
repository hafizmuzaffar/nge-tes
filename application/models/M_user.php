<?php
class m_user extends CI_Model{
    //cek nip dan password dosen
 function cek_login($table,$username,$password)
 {
    // $this->db->select('*');
    // $this->db->from($table);
    $this->db->join('dosen','dosen.nik = users.nomor');
    // $this->db->where('username',$username);
    // $this->db->where('password',$password);
    // return $this->db->get();
  	return $this->db->get_where($table,array('users.username' => $username, 'users.password' => md5($password)));
 }

 function cek_login_admin($table,$username,$password)
 {
    // $this->db->select('*');
    // $this->db->from($table);
    // $this->db->where('username',$username);
    // $this->db->where('password',$password);
    // return $this->db->get();
    return $this->db->get_where($table,array('users.username' => $username, 'users.password' => md5($password)));
 }

 function get_dosen_nik($table, $where, $nik){
  return $this->db->get_where($table, $where, $nik);
 }

 function jakul()
 {
  $sql = "select * from jakul join matkul on matkul.idmatkul = jakul.idmatkul join ruangan on ruangan.idruangan = jakul.idruangan join dosen on dosen.nik = jakul.nik join kelas on kelas.id_kelas = jakul.id_kelas ";
  return $this->db->query($sql);
 }
 function jakul_by_nik($nik)
 {
  $sql = "select * from jakul join matkul on matkul.idmatkul = jakul.idmatkul join ruangan on ruangan.idruangan = jakul.idruangan join dosen on dosen.nik = jakul.nik join kelas on kelas.id_kelas = jakul.id_kelas WHERE jakul.nik = $nik";
  return $this->db->query($sql);
 }
 function nilai()
 {

  $sql ="select * from nilai join matkul on matkul.idmatkul = nilai.idmatkul join mhs on mhs.npm = nilai.npm join tahunakademik on tahunakademik.tahunid = nilai.tahunid";
  return $this->db->query($sql);
 }

 // function dosen()
 // {
 //  $sql = "SELECT * FROM users WHERE level = 'Dokter'";
 //  return $this->db->query($sql);
 // }
 // function dosen()
 // {
 //  $sql = "select * from dosen";
 //  return $this->db->query($sql);
 // }
 function mtkl()
{
  $sql = "select * from matkul join prodi on prodi.idprodi = matkul.idprodi join semester on semester.idsemester = matkul.idsemester ";
  return $this->db->query($sql); 
}
function dosen()
 {
  $sql = "select * from dosen";
  return $this->db->query($sql);
 }
 function user()
 {
  $sql = "select * from users";
  return $this->db->query($sql);
 }
  function tahunakademik()
 {
  $sql = "select * from tahunakademik";
  return $this->db->query($sql);
 }

  function mhs()
 {
  $sql = "select * from mhs join kelas on kelas.id_kelas = mhs.id_kelas join prodi on prodi.idprodi = mhs.idprodi join tahunakademik on tahunakademik.tahunid = mhs.tahunid ORDER BY mhs.npm DESC";
  return $this->db->query($sql);
 }
 function kelas()
 {
  $this->db->select('kelas.*,tahunakademik.*');
    $this->db->from('kelas');
    $this->db->join('tahunakademik', 'kelas.tahunid = tahunakademik.tahunid','left');
    return $this->db->get()->result();
    //  $sql = "select * from  kelas join tahunakademik on tahunakademik.tahunid = kelas.tahunid join mhs on mhs.id_kelas = kelas.id_kelas";
    // return $this->db->query($sql)->result();
  }

  function kelas_by_id($tahunid)
  {
   $this->db->select('kelas.*,tahunakademik.*');
     $this->db->from('kelas');
     $this->db->join('tahunakademik', 'kelas.tahunid = tahunakademik.tahunid','left');
     $this->db->where('kelas.tahunid', $tahunid);
     return $this->db->get()->result();
     //  $sql = "select * from  kelas join tahunakademik on tahunakademik.tahunid = kelas.tahunid join mhs on mhs.id_kelas = kelas.id_kelas";
     // return $this->db->query($sql)->result();
   }
  function lihat_perkelas($kelas, $tahun)
  {
    $sql = "select * from mhs join kelas on kelas.id_kelas = mhs.id_kelas join prodi on prodi.idprodi = mhs.idprodi join tahunakademik on tahunakademik.tahunid = mhs.tahunid join nilai on nilai.npm = mhs.npm where mhs.id_kelas = '$kelas' and mhs.tahunid = '$tahun' ";
    return $this->db->query($sql)->result();
    // $this->db->select('mhs.*,kelas.*,prodi.*,tahunakademik.*,nilai.*');
    // $this->db->from('mhs');
    // $this->db->join('kelas', 'mhs.id_kelas = kelas.id_kelas','left');
    // $this->db->join('nilai', 'mhs.npm = nilai.npm');
    // $this->db->join('prodi', 'mhs.idprodi = prodi.idprodi','left');
    // $this->db->join('tahunakademik', 'mhs.tahunid = tahunakademik.tahunid','left');
    // $this->db->where(array('mhs.id_kelas' => $kelas, 'mhs.tahunid' => $tahun));
    // return $this->db->get()->result();
    // return $this->db->query($sql)->result();
  }

  function lihat_perkelas_aja($kelas, $tahun)
  {
    $sql = "select * from mhs join kelas on kelas.id_kelas = mhs.id_kelas join prodi on prodi.idprodi = mhs.idprodi join tahunakademik on tahunakademik.tahunid = mhs.tahunid where mhs.id_kelas = '$kelas' and mhs.tahunid = '$tahun' ";
    return $this->db->query($sql)->result();
    // $this->db->select('mhs.*,kelas.*,prodi.*,tahunakademik.*,nilai.*');
    // $this->db->from('mhs');
    // $this->db->join('kelas', 'mhs.id_kelas = kelas.id_kelas','left');
    // $this->db->join('nilai', 'mhs.npm = nilai.npm');
    // $this->db->join('prodi', 'mhs.idprodi = prodi.idprodi','left');
    // $this->db->join('tahunakademik', 'mhs.tahunid = tahunakademik.tahunid','left');
    // $this->db->where(array('mhs.id_kelas' => $kelas, 'mhs.tahunid' => $tahun));
    // return $this->db->get()->result();
    // return $this->db->query($sql)->result();
  }

 function prodi()
 {
  $sql = "SELECT * FROM prodi";
  return $this->db->query($sql);
 }

  function ruangan()
 {
  $sql = "SELECT * FROM ruangan";
  return $this->db->query($sql);
 }

  function semester()
 {
  $sql = "SELECT * FROM semester";
  return $this->db->query($sql);
 }

  function setData($hari, $kelas, $jamawal, $jamakhir){
    $this->khari= $hari;
    $this->kelas = $kelas;
    $this->jamawal = $jamawal;
    $this->jamakhir = $jamakhir;
  }


  function insert($data)
  {
    $this->db->insert_batch('nilai', $data);
  }

  public function list($table)
  {
    return $this->db->get($table)->result();
  }

  public function list_tahunak()
  {
    return $this->db->get('tahunakademik');
  }


  public function insert_data($table, $data)    
  {
    return $this->db->insert($table,$data);
  }

  public function list_nilai()
  {
    $sql = "select * from nilai join matkul on matkul.idmatkul = nilai.idmatkul join mhs on mhs.npm = nilai.npm";
    return $this->db->query($sql)->result();

  }

  public function list_nilai_belum_ferivikasi()
  {
    $sql = "select * from nilai join matkul on matkul.idmatkul = nilai.idmatkul join mhs on mhs.npm = nilai.npm WHERE nilai.status = ''";
    return $this->db->query($sql)->result();

  }

  public function list_nilai_ferivikasi()
  {
    $sql = "select * from nilai join matkul on matkul.idmatkul = nilai.idmatkul join mhs on mhs.npm = nilai.npm WHERE nilai.status = 'selesai'";
    return $this->db->query($sql)->result();

  }
  
  function Getdatabyid($table, $where, $id)
  {
    return $this->db->get_where($table, array($where => $id));
  }
   function update_nilai($kelas)
  {
    $sql = "UPDATE nilai SET status = 'sudah' WHERE id_kelas = $kelas";
    return $this->db->query($sql);
  }

  public function update_dosen($where,$data,$table)
  {
    $this->db->where($where);
    $this->db->update($table,$data);
  }
  public function update_matkul($where,$data,$table)
  {
    $this->db->where($where);
    $this->db->update($table,$data);
  }
  public function viewBytahunakademik($tahunid, $nomor)
  {
    $sql = "select * from jakul join matkul on matkul.idmatkul = jakul.idmatkul join ruangan on ruangan.idruangan = jakul.idruangan join dosen on dosen.nik = jakul.nik join kelas on kelas.id_kelas = jakul.id_kelas join prodi on prodi.idprodi = jakul.idprodi WHERE jakul.tahunid = $tahunid AND jakul.nik = $nomor";
    return $this->db->query($sql)->result();
  }

  public function getjakulbyid($tahunid) {
   $sql = "SELECT * FROM jakul WHERE tahunid = $tahunid";
   return $this->db->query($sql);
  }

  public function aktifkansemester($tahunid) {
    $sql = "UPDATE tahunakademik SET status = 'aktif' WHERE tahunid = $tahunid";

    return $this->db->query($sql);
  }

  public function nonaktifkansemester($tahunid) {
    $sql = "UPDATE tahunakademik SET status = 'non aktif' WHERE tahunid = $tahunid";

    return $this->db->query($sql);
  }

  public function getSemesterbyid($tahunid) {
    $sql = "SELECT * FROM tahunakademik WHERE tahunid = $tahunid";

    return $this->db->query($sql)->row();
  }

  public function finalisasi_nilai($id_kelas) {
    $sql = "UPDATE nilai SET status = 'selesai' WHERE id_kelas = $id_kelas";

    return $this->db->query($sql);
  }

   public function finalisasi_nilai_dosen($id_nilai) {
    $sql = "UPDATE nilai SET status = 'selesai' WHERE id_nilai = $id_nilai";

    return $this->db->query($sql);
  }

  function laporan_nilai($tahunid)
  {
    $sql= "select * from nilai join tahunakademik on tahunakademik.tahunid = nilai.tahunid join matkul on matkul.idmatkul = nilai.idmatkul join mhs on mhs.npm = nilai.npm where nilai.tahunid = '$tahunid' and nilai.status = 'selesai'";
    return $this->db->query($sql)->result();
  }

  function mahasiswa($npm)
  {
    $this->db->join('kelas','kelas.id_kelas = mhs.id_kelas');
    $this->db->join('tahunakademik','tahunakademik.tahunid = mhs.tahunid');
    return $this->db->get_where('mhs',array('npm' => $npm))->row();
  }

  function nilai_mhs($npm)
  {
    $this->db->join('matkul','matkul.idmatkul = nilai.idmatkul');
    return $this->db->get_where('nilai',array('npm' => $npm))->result();

  }

  //function ambil_jam($nama_dokter)
  //{
    //$sql = "SELECT * FROM users WHERE nama = '$nama_dokter'";
    //return $this->db->query($sql);
  //}
}