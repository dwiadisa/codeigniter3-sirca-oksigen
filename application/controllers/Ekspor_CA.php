<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ekspor_CA extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();



        if (!is_login()) redirect('auth?alert=belum_login');
        $this->load->model('m_data');
        // load datam model untuk distinc tahunan
        $this->load->model('ekspor_tahun_model');
        // load datam model untuk distinc tahunan
        // batasi akses ke calon anggota
        $this->load->model('Access_block_model');
        $this->Access_block_model->ca_akses();
    }

    public function index()
    {
        $data['title'] = "Ekspor Data Calon Anggota - Sistem Informasi Registrasi Calon Anggota UKM Teater Oksigen";
        // query ambil tahunan dari model
        $data['tahunan'] = $this->ekspor_tahun_model->ekspor_tahunan();

        // foreach ($data['tahunan'] as $tahun) {
        //     var_dump($tahun);
        // }
        // query ambil tahunan dari model
        $this->load->view('templates/header_sidebar', $data);
        $this->load->view('partial/ekspor_ca/index', $data);
        $this->load->view('templates/footer');
    }

    public function Ekspor_Aksi()
    {

        $tahunan = $this->input->post('tahun');

        // load PHP EXCEL


        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('UKM Teater Oksigen')
            ->setLastModifiedBy('UKM Teater Oksigen')
            ->setTitle("Data Calon Anggota")
            ->setSubject("Calon Anggota")
            ->setDescription("Laporan Semua Data Calon Anggota")
            ->setKeywords("Data calon anggota");
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
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA Calon Anggota"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A1:R1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "NO INDUK CA"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "NIM"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "FAKULTAS"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "PRODI"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "JENIS KELAMIN"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "TEMPAT LAHIR"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('I3', "TANGGAL LAHIR"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('J3', "ALAMAT RUMAH"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('K3', "ALAMAT KOST"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('L3', "INSTAGRAM"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('M3', "NO HP"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('N3', "HOBI"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('O3', "DIVISI"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('P3', "ALASAN"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('Q3', "PENGALAMAN ORGANISASI"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('R3', "FOTO"); // Set kolom E3 dengan tulisan "ALAMAT"
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
        $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $calon_anggota = $this->db->query("SELECT * FROM data_ca, data_prodi, data_fakultas WHERE data_ca.fakultas = id_fakultas and data_ca.prodi=id_prodi and tahun_submit = $tahunan")->result();
        // $siswa = $this->SiswaModel->view();
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($calon_anggota as $data) { // Lakukan looping pada variabel siswa
            // $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no++);
            $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->no_induk_CA);
            $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->pengguna_nama);
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->nim);
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->nama_fakultas);
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->nama_prodi);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->jenis_kelamin);
            $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->tempat_lahir);
            $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data->tanggal_lahir);
            $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data->alamat_rumah);
            $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data->alamat_kost);
            $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $data->instagram);
            $excel->setActiveSheetIndex(0)->setCellValue('M' . $numrow, $data->no_hp);
            $excel->setActiveSheetIndex(0)->setCellValue('N' . $numrow, $data->hobi);
            // pengisian value untuk setiap divisi 
            if ($data->div_drama == 1) {
                $drama = "Drama";
            } else {
                $drama = "";
            }
            if ($data->div_tari == 1) {
                $tari = " Tari";
            } else {
                $tari = "";
            }
            if ($data->div_rupa == 1) {
                $rupa =  " Rupa";
            } else {
                $rupa = "";
            }
            if ($data->div_sinema == 1) {
                $sinema =  " Sinematografi";
            } else {
                $sinema = "";
            }
            // pengisian value untuk setiap divisi 
            $excel->setActiveSheetIndex(0)->setCellValue('O' . $numrow, $drama . $tari . $rupa . $sinema);
            $excel->setActiveSheetIndex(0)->setCellValue('P' . $numrow, $data->alasan);
            $excel->setActiveSheetIndex(0)->setCellValue('Q' . $numrow, $data->riwayat_organisasi);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('K' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('L' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('M' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('N' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('O' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('P' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('Q' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('R' . $numrow)->applyFromArray($style_row);

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('L')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('M')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('N')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('O')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('P')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('R')->setWidth(30); // Set width kolom E

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data calon anggotas");
        $excel->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data calon anggota UKM Teater OKsigen.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        ob_end_clean();
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }
}

/* End of file Ekspor_CA.php and path \application\controllers\Ekspor_CA.php */
