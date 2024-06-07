<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Data extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('user_id')) {
			redirect(base_url('/authuser/login'));
		}
	}

	public function index()
	{
		$produk = $this->db->query('SELECT * FROM product')->result();
		$data['title_page'] = 'Data';
		$data['produk'] = $produk;
		$this->load->view('data/index', $data);
		// var_dump($produk);
	}

	public function add()
	{
		$data['title_page'] = 'Add Data';
		if (isset($_POST['save'])) {
			$nama_produk = $_POST['nama-produk'];
			$jenis_produk = $_POST['jenis-produk'];
			$jumlah = $_POST['jumlah'];
			$harga = $_POST['harga'];
			$query = $this->db->query('INSERT INTO product (id, nama_produk, jenis, jumlah, harga, created) VALUES (NULL, "' . $nama_produk . '", "' . $jenis_produk . '", "' . $jumlah . '", "' . $harga . '", CURRENT_TIMESTAMP)');
			if ($query) {
				$this->session->set_flashdata('success', 'berhasil menambahkan item');
				redirect(base_url('data'));
			} else {
				$this->session->set_flashdata('failed', 'gagal menambahkan item');
			}
		}
		$this->load->view('data/add', $data);
	}

	public function export()
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Nama Barang');
		$sheet->setCellValue('C1', 'Jenis Barang');
		$sheet->setCellValue('D1', 'Jumlah');
		$sheet->setCellValue('E1', 'Harga');
		$writer = new Xlsx($spreadsheet);
		$filename = 'export-data-barang';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
