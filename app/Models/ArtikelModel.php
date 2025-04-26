<?php
namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'judul',
        'slug',
        'isi',
        'tanggal_publikasi',
        'status',
        'author',
        'meta_deskripsi',
        'kata_kunci'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [
        'judul' => 'required|max_length[255]',
        'slug' => 'required|max_length[255]|is_unique[artikel.slug,id,{id}]',
        'isi' => 'required',
        'author' => 'required|max_length[20]',
        'status' => 'required|in_list[draft,publish,archive]'
    ];

    protected $validationMessages = [
        'author' => [
            'required' => 'Penulis artikel wajib diisi'
        ]
    ];

    // Get article by slug with multiple fallbacks
    public function getArtikelBySlug($slug)
    {
        // Try exact match first
        $artikel = $this->where('slug', $slug)
            ->where('is_deleted', '0')
            ->first();

        if (!$artikel) {
            // Try case insensitive
            $artikel = $this->where('LOWER(slug)', strtolower($slug))
                ->where('is_deleted', '0')
                ->first();
        }

        if (!$artikel) {
            // Try with URL decoded
            $decodedSlug = urldecode($slug);
            $artikel = $this->where('slug', $decodedSlug)
                ->where('is_deleted', '0')
                ->first();
        }

        return $artikel;
    }

    // Get published articles
    public function getPublishedArticles($startDate = null, $endDate = null)
    {
        $builder = $this->builder();
        $builder->where('status', 'publish')
            ->where('is_deleted', '0');

        if ($startDate) {
            $builder->where('DATE(tanggal_publikasi) >=', $startDate);
        }

        if ($endDate) {
            $builder->where('DATE(tanggal_publikasi) <=', $endDate);
        }

        return $builder->get()->getResultArray();
    }
}