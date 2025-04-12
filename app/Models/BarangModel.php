<?php
namespace App\Models;
use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'm_barang';
    protected $primaryKey = 'id_barang';
    protected $allowedFields = ['nama_barang', 'qty', 'harga_beli', 'harga_jual'];
    protected $useTimestamps = false; // Set to true if you have created_at, updated_at fields

    public function getBarang($id = false)
    {
        if ($id === false) {
            return $this->findAll(); // Returns array of arrays
        } else {
            return $this->where(['id_barang' => $id])->first(); // Returns single array
        }
    }

    public function insertBarang($data)
    {
        return $this->insert($data);
    }

    public function updateBarang($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteBarang($id)
    {
        return $this->where('id_barang', $id)->delete();
    }
}