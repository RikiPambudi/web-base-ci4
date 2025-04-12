<?php
namespace App\Controllers;
use CodeIgniter\Controller;

use App\Models\BarangModel;

class Barang extends BaseController
{
    protected $model;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->model = new BarangModel();
    }

    // List all items
    public function index()
    {
        $data['title'] = 'Data Barang';
        $data['getBarang'] = $this->model->getBarang();
        echo view('header_view', $data);
        echo view('barang_view', $data);
        echo view('footer_view', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Barang Baru';
        echo view('header_view', $data);
        echo view('barang_create_view', $data);
        echo view('footer_view', $data);
    }

    // Store new item
    public function store()
    {
        $rules = [
            'nama_barang' => 'required|max_length[40]',
            'qty' => 'required|numeric',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'qty' => $this->request->getPost('qty'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'harga_jual' => $this->request->getPost('harga_jual')
        ];

        $this->model->insert($data);
        return redirect()->to('/barang')->with('message', 'Barang berhasil ditambahkan');
    }

    // Show edit form
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Barang',
            'barang' => $this->model->getBarang($id)
        ];

        if (empty($data['barang'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Barang dengan ID ' . $id . ' tidak ditemukan');
        }

        echo view('header_view', $data);
        echo view('barang_edit_view', $data);
        echo view('footer_view', $data);
    }

    // Update item
    public function update($id)
    {
        $rules = [
            'nama_barang' => 'required|max_length[40]',
            'qty' => 'required|numeric',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'qty' => $this->request->getPost('qty'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'harga_jual' => $this->request->getPost('harga_jual')
        ];

        $this->model->update($id, $data);
        return redirect()->to('/barang')->with('message', 'Barang berhasil diupdate');
    }

    // Delete item
    public function delete($id)
    {
        // First check if item exists
        $barang = $this->model->getBarang($id);

        if (!$barang) {
            return redirect()->to('/barang')->with('error', 'Barang tidak ditemukan');
        }

        // Perform the delete
        $deleted = $this->model->deleteBarang($id);

        if ($deleted) {
            return redirect()->to('/barang')->with('message', 'Barang berhasil dihapus');
        } else {
            return redirect()->to('/barang')->with('error', 'Gagal menghapus barang');
        }
    }

    // View single item
    public function show($id)
    {
        $data = [
            'title' => 'Detail Barang',
            'barang' => $this->model->getBarang($id)
        ];

        echo view('header_view', $data);
        echo view('barang_detail_view', $data);
        echo view('footer_view', $data);
    }
}