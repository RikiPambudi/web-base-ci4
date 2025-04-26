<?php
namespace App\Controllers;

use App\Models\ArtikelModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Artikel extends BaseController
{
    protected $artikelModel;

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
    }

    // Index - List all articles
    public function index()
    {
        $startDate = $this->request->getGet('start_date');
        $endDate = $this->request->getGet('end_date');

        $data = [
            'title' => 'Daftar Artikel',
            'artikel' => $this->artikelModel->getPublishedArticles($startDate, $endDate),
            'startDate' => $startDate,
            'endDate' => $endDate
        ];

        return view('artikel/index', $data);
    }

    // Create form
    public function create()
    {
        $data = [
            'title' => 'Tambah Artikel Baru',
            'validation' => \Config\Services::validation()
        ];

        return view('artikel/create', $data);
    }

    // Store new article
    public function store()
    {
        $rules = [
            'judul' => 'required|max_length[255]',
            'slug' => 'required|max_length[255]|is_unique[artikel.slug]',
            'isi' => 'required',
            'author' => 'required|max_length[20]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'judul' => $this->request->getPost('judul'),
            'slug' => url_title($this->request->getPost('slug'), '-', true),
            'isi' => $this->request->getPost('isi'),
            'tanggal_publikasi' => $this->request->getPost('tanggal_publikasi'),
            'status' => $this->request->getPost('status'),
            'author' => $this->request->getPost('author'),
            'meta_deskripsi' => $this->request->getPost('meta_deskripsi'),
            'kata_kunci' => $this->request->getPost('kata_kunci')
        ];

        $this->artikelModel->save($data);

        return redirect()->to('/artikel')->with('message', 'Artikel berhasil ditambahkan');
    }

    // Show article detail
    public function detail($slug)
    {
        $artikel = $this->artikelModel->getArtikelBySlug($slug);

        // Check if $artikel is null or not an array
        if (is_null($artikel) || !is_array($artikel)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException(
                message: 'Artikel dengan slug "' . $slug . '" tidak ditemukan'
            );
        }

        // Check if the expected keys exist in the array
        if (!isset($artikel['slug'], $artikel['judul'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException(
                message: 'Artikel dengan slug "' . $slug . '" tidak ditemukan'
            );
        }

        // Proceed with setting up the data for the view
        $data = [
            'title' => $artikel['judul'],
            'artikel' => $artikel
        ];

        // Return the view with the article data
        return view('artikel/detail', $data);
    }




    // Edit form
    public function edit($id)
    {
        $artikel = $this->artikelModel->where('is_deleted', '0')->find($id);

        if (!$artikel) {
            // throw new PageNotFoundException('Artikel tidak ditemukan');
            echo $artikel;
        }

        $data = [
            'title' => 'Edit Artikel',
            'artikel' => $artikel,
            'validation' => \Config\Services::validation()
        ];

        return view('artikel/edit', $data);
    }

    // Update article
    public function update($id)
    {
        $artikel = $this->artikelModel->find($id);
        if (!$artikel) {
            throw new PageNotFoundException('Artikel tidak ditemukan');
        }

        $slugRules = 'required|max_length[255]|is_unique[artikel.slug,id,' . $id . ']';

        $rules = [
            'judul' => 'required|max_length[255]',
            'slug' => $slugRules,
            'isi' => 'required',
            'author' => 'required|max_length[20]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id' => $id,
            'judul' => $this->request->getPost('judul'),
            'slug' => url_title($this->request->getPost('slug'), '-', true),
            'isi' => $this->request->getPost('isi'),
            'tanggal_publikasi' => $this->request->getPost('tanggal_publikasi'),
            'status' => $this->request->getPost('status'),
            'author' => $this->request->getPost('author'),
            'meta_deskripsi' => $this->request->getPost('meta_deskripsi'),
            'kata_kunci' => $this->request->getPost('kata_kunci')
        ];

        $this->artikelModel->save($data);

        return redirect()->to('/artikel/detail/' . $data['slug'])->with('message', 'Artikel berhasil diperbarui');
    }

    // Update status
    public function updateStatus($id)
    {
        $artikel = $this->artikelModel->find($id);
        if (!$artikel) {
            throw new PageNotFoundException('Artikel tidak ditemukan');
        }

        $status = $this->request->getPost('status');
        $this->artikelModel->update($id, ['status' => $status]);

        return redirect()->back()->with('message', 'Status artikel berhasil diubah');
    }

    // Delete article
    public function delete($id)
    {
        $artikel = $this->artikelModel->find($id);
        if (!$artikel) {
            throw new PageNotFoundException('Artikel tidak ditemukan');
        }

        $this->artikelModel->delete($id);

        return redirect()->to('/artikel')->with('message', 'Artikel berhasil dihapus');
    }
}