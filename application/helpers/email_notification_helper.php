<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('notif_approval_status'))
{
  function notif_approval_status($id) {
    // Notifikasi status approval untuk staff

    // Inisiasi tabel detail pengajuan
    $data_table = '';
    $data_table .= '<table border="1" cellpadding="10">
    <tr>
      <th colspan="6">Detail Pengajuan Anggaran</th>
    </tr>
    <tr>
      <th>No.</th>
      <th>Deskripsi Item</th>
      <th>Kategori</th>
      <th>Sub Kategori</th>
      <th>Harga</th>
      <th>Status</th>
    </tr>';

    // Populated Table Data
    $list_item_pengajuan = $this->pengajuans->find_item_where($id);
    $counter = 0;
    $total_nilai = 0;
    foreach ($list_item_pengajuan as $row) {
      $counter++;
      $total_nilai += $row['harga'];

      $find_kategori  = $this->kategoris->find($row['id_kategori']);
      $kategori       = $find_kategori[0]['name'];

      $find_sub_kategori  = $this->sub_kategoris->find($row['id_sub_kategori']);
      $sub_kategori       = $find_sub_kategori[0]['name'];

      $find_status    = $this->status_pengajuans->find($row['status']);
      $status         = $find_status[0]['name'];

      $data_table .= '<tr>';
      $data_table .= '<td>' . $counter . ' </td>';
      $data_table .= '<td>' . $row['deskripsi'] . '</td>';
      $data_table .= '<td>' . $kategori . '</td>';
      $data_table .= '<td>' . $sub_kategori . '</td>';
      $data_table .= '<td>' . number_format($row['harga'], 0, "" ,".") . '</td>';
      $data_table .= '<td>' . $status . '</td>';
      $data_table .= '</tr>';
    }
    $data_table .= '</table>';

    $pengajuan      = $this->pengajuans->find($id);
    $id_pemohon     = $pengajuan[0]['user_id'];
    $find_pemohon   = $this->users->find($id_pemohon);

    // Get Username
    $nama_pemohon   = $find_pemohon[0]['name'];

    // Get Email to
    $email_to       = $find_pemohon[0]['email'];

    $find_perusahaan  = $this->companies->find($find_pemohon[0]['company_id']);
    // Get Perusahaan Pemohon
    $perusahaan       = $find_perusahaan[0]['name'];

    $judul            = $pengajuan[0]['judul'];
    $date_time        = $pengajuan[0]['timestamp'];
    $catatan_staff    = $pengajuan[0]['catatan_staff'];
    $catatan_direktur = $pengajuan[0]['catatan_direktur'];
    $catatan_ga       = $pengajuan[0]['catatan_ga'];
    $total_harga      = number_format($total_nilai, 0, "" ,".");

    $find_status    = $this->status_pengajuans->find($pengajuan[0]['status']);
    $status         = $find_status[0]['name'];

    $this->email->from('noreply@Aegis.co.id', 'Notifikasi Status Approval');
    $this->email->to($email_to);

    $this->email->subject('Notifikasi Status Approval');
    $mailContent = "";

    //Data for email content
    $mailContent = <<< EOT
    Hi, $nama_pemohon <br><br>

    Berikut status pengajuan anggaran anda :

    <table>
      <tr>
        <td>Judul Pengajuan</td><td>: $judul </td>
      <tr>
      <tr>
        <td>Tanggal</td><td>: $date_time </td>
      <tr>
      <tr>
        <td>Total Nilai</td><td>: Rp $total_harga </td>
      <tr>
    </table>
    <br><br>
    
    Dengan rincian sebagai berikut : <br><br>
    $data_table
    <br><br>

    Catatan Staff : <br>

    $catatan_staff
    <br><br>

    Catatan Direktur : <br>

    $catatan_direktur
    <br><br>

    Catatan General Affair : <br>

    $catatan_ga
    <br><br>

    Mohon login ke aplikasi pengajuan anggaran dan manajemen inventori untuk memproses pengajuan ini.<br><br>

    Terima kasih.<br><br>

    Admin.
EOT;

    $this->email->message($mailContent);
    $this->email->send();
  }
}

if (!function_exists('notif_pengajuan_baru'))
{
  function notif_pengajuan_baru($id, $ga_dirut) {
    // Notifikasi status pengajuan baru untuk direktur atau ga

    // Inisiasi tabel detail pengajuan
    $data_table = '';
    $data_table .= '<table border="1" cellpadding="10">
    <tr>
      <th colspan="6">Detail Pengajuan Anggaran</th>
    </tr>
    <tr>
      <th>No.</th>
      <th>Deskripsi Item</th>
      <th>Kategori</th>
      <th>Sub Kategori</th>
      <th>Harga</th>
      <th>Status</th>
    </tr>';

    // Populated Table Data
    $list_item_pengajuan = $this->pengajuans->find_item_where($id);
    $counter = 0;
    $total_nilai = 0;
    foreach ($list_item_pengajuan as $row) {
      $counter++;
      $total_nilai += $row['harga'];

      $find_kategori  = $this->kategoris->find($row['id_kategori']);
      $kategori       = $find_kategori[0]['name'];

      $find_sub_kategori  = $this->sub_kategoris->find($row['id_sub_kategori']);
      $sub_kategori       = $find_sub_kategori[0]['name'];

      $find_status    = $this->status_pengajuans->find($row['status']);
      $status         = $find_status[0]['name'];

      $data_table .= '<tr>';
      $data_table .= '<td>' . $counter . ' </td>';
      $data_table .= '<td>' . $row['deskripsi'] . '</td>';
      $data_table .= '<td>' . $kategori . '</td>';
      $data_table .= '<td>' . $sub_kategori . '</td>';
      $data_table .= '<td>' . number_format($row['harga'], 0, "" ,".") . '</td>';
      $data_table .= '<td>' . $status . '</td>';
      $data_table .= '</tr>';
    }
    $data_table .= '</table>';

    $pengajuan      = $this->pengajuans->find($id);
    $id_pemohon     = $pengajuan[0]['user_id'];
    $find_pemohon   = $this->users->find($id_pemohon);

    // Get Username
    $nama_pemohon   = $find_pemohon[0]['name'];

    // Get Email to
    $email_to       = $find_pemohon[0]['email'];

    $find_perusahaan  = $this->companies->find($find_pemohon[0]['company_id']);
    
    // Get Perusahaan Pemohon
    $perusahaan       = $find_perusahaan[0]['name'];

    $judul            = $pengajuan[0]['judul'];
    $date_time        = $pengajuan[0]['timestamp'];
    $catatan_staff    = $pengajuan[0]['catatan_staff'];
    $catatan_direktur = $pengajuan[0]['catatan_direktur'];
    $catatan_ga       = $pengajuan[0]['catatan_ga'];
    $total_harga      = number_format($total_nilai, 0, "" ,".");

    $find_status    = $this->status_pengajuans->find($pengajuan[0]['status']);
    $status         = $find_status[0]['name'];

    // Inisiasi data penerima
    $email_penerima = $nama_penerima = 0;

    // Find Direktur or GA
    if($ga_dirut == 2) {
      // For GA
      $id_penerima      = $this->users->find_ga();
      $email_penerima   = $id_penerima['email'];
      $nama_penerima    = $id_penerima['name'];
    } else if($ga_dirut == 3) {
      // For Dirut
      $id_penerima      = $this->users->find_direktur($find_pemohon[0]['company_id']);
      $email_penerima   = $id_penerima['email'];
      $nama_penerima    = $id_penerima['name'];
    }

    $this->email->from('noreply@Aegis.co.id', 'Notifikasi Pengajuan Anggaran Baru');
    $this->email->to($email_penerima);

    $this->email->subject('Notifikasi Status Approval');
    $mailContent = "";

    //Data for email content
    $mailContent = <<< EOT
    Hi, $nama_penerima <br><br>

    Terdapat pengajuan anggaran baru yang di ajukan oleh $nama_pemohon dari $perusahaan.<br><br>

    Berikut data pengajuannya : 

    <table>
      <tr>
        <td>Judul Pengajuan</td><td>: $judul </td>
      <tr>
      <tr>
        <td>Tanggal</td><td>: $date_time </td>
      <tr>
      <tr>
        <td>Total Nilai</td><td>: Rp $total_harga </td>
      <tr>
    </table>
    <br><br>
    
    Dengan rincian sebagai berikut : <br><br>
    $data_table
    <br><br>

    Catatan Staff : <br>

    $catatan_staff
    <br><br>

    Catatan Direktur : <br>

    $catatan_direktur
    <br><br>

    Catatan General Affair : <br>

    $catatan_ga
    <br><br>

    Mohon login ke aplikasi pengajuan anggaran dan manajemen inventori untuk memproses pengajuan ini.<br><br>

    Terima kasih.<br><br>

    Admin.
EOT;

    $this->email->message($mailContent);
    $this->email->send();    
  }
}


/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */