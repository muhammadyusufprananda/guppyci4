<?php 
    namespace App\Models;

    use CodeIgniter\Model;

    class ShopModel extends Model
    {
        protected $table = 'ikan';
        protected $allowedFields = ['nama', 'slug', 'harga', 'gambar', 'stok', 'deskripsi'];
        
        public function getIkan($slug=false)
        {
            if ($slug==false) {
                return $this->findAll();
            }
            return $this->where(['slug' => $slug])->first();
        }
    }
?>