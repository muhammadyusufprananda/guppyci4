<?php 
    namespace App\Models;

    use CodeIgniter\Model;

    class PagesModel extends Model
    {
        protected $table = 'ikan';
        protected $allowedFields = ['nama', 'slug', 'harga', 'gambar', 'stok', 'deskripsi'];
        
        public function getProdukBaru()
        {
            return $this->findAll();
        }
    }
?>