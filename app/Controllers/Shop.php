<?php

namespace App\Controllers;

use App\Models\ShopModel;

use function PHPUnit\Framework\isNull;

class Shop extends BaseController
{
    protected $shopModel, $db, $builderKeranjang, $builderIkan, $builderCheckout;
    public function __construct()
    {
        $this->shopModel = new ShopModel();
        $this->db = \Config\Database::connect();
        $this->builderKeranjang = $this->db->table('keranjang');
        $this->builderIkan = $this->db->table('ikan');
        $this->builderCheckout = $this->db->table('checkout');
    }
    public function index()
    {
        $data = [
            'title' => 'Shoplist',
            'ikan' => $this->shopModel->getIkan(),
            'keranjang' => $this->queryKeranjang()
        ];
        return view('shop/index', $data);
    }
    public function queryKeranjang($x = true)
    {
        $this->builderKeranjang->select('id_users, id_ikan, jumlah, nama, harga, total, kode_checkout');
        $this->builderKeranjang->join('users', 'users.id = keranjang.id_users');
        $this->builderKeranjang->join('ikan', 'ikan.id = keranjang.id_ikan');
        if ($x == true) {
            $this->builderKeranjang->where("id_users = '" . user_id() . "' AND  kode_checkout IS NULL");
        } else {
            $this->builderKeranjang->where('keranjang.id_users', user_id());
        }
        $query = $this->builderKeranjang->get();
        $data['keranjang'] = $query->getResult();
        return $data['keranjang'];
    }
    public function detail($slug)
    {
        $ikan = $this->shopModel->getIkan($slug);
        $data = [
            'title' => 'Not Found',
            'ikan' => $ikan,
            'keranjang' => $this->queryKeranjang()
        ];
        if (empty($data['ikan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Ikan tidak ditemukan.');
        } else {
            $data['title'] = $ikan['nama'];
        }
        return view('shop/detail', $data);
    }
    public function beli($id)
    {
        if (user_id() == null) {
            return redirect()->to('/login');
        } elseif (empty($this->request->getVar())) {
            return redirect()->to('/shop');
        }
        $this->builderIkan->where('ikan.id', $id);
        $query = $this->builderIkan->get();
        $data['ikan'] = $query->getRow();
        $data['id_users'] = user_id();
        if ($data['ikan']->stok - $this->request->getVar('jumlahKeranjang') <= 0) {
            session()->setFlashdata('pesan-merah', 'Stok tidak mencukupi.');
            return redirect()->to('/shop/' . $data['ikan']->slug);
        } else {
            $this->builderKeranjang->insert([
                'id_ikan' => $data['ikan']->id,
                'id_users' => $data['id_users'],
                'jumlah' => $this->request->getVar('jumlahKeranjang'),
                'total' => $this->request->getVar('jumlahKeranjang') * $data['ikan']->harga
            ]);
            $this->builderIkan->where('ikan.id', $id)->update([
                'stok' => $data['ikan']->stok - $this->request->getVar('jumlahKeranjang'),
            ]);
            return redirect()->to('/shop');
        }
    }
    public function hapuskeranjang($id_users, $id_ikan)
    {
        $this->builderIkan->where('ikan.id', $id_ikan);
        $query = $this->builderIkan->get();
        $data['ikan'] = $query->getRow();
        $this->builderKeranjang->where("id_users = '" . $id_users . "' AND  id_ikan = '" . $id_ikan . "'");
        $data['keranjang'] = $this->builderKeranjang->get()->getRow();
        $this->builderIkan->where('ikan.id', $id_ikan)->update([
            'stok' => $data['ikan']->stok + $data['keranjang']->jumlah,
        ]);
        $this->builderKeranjang->where("id_users = '" . $id_users . "' AND  id_ikan = '" . $id_ikan . "'")->delete();
        return redirect()->to('shop/');
    }
    public function checkout()
    {
        $this->builderKeranjang->where("id_users = '" . user_id() . "' AND  kode_checkout IS NULL");
        $query = $this->builderKeranjang->get();
        $data['keranjang'] = $query->getResult();
        $random = random_string('alnum', 10);
        $total = 0;
        foreach ($data['keranjang'] as $k) {
            $total = $total + $k->total;
        }
        $this->builderCheckout->insert([
            'id_users' => user_id(),
            'kode' => $random,
            'total' => $total,
            'id_status' => 1
        ]);
        $this->builderKeranjang->where("id_users = '" . user_id() . "' AND  kode_checkout IS NULL")->update([
            'kode_checkout' => $random,
        ]);
        return redirect()->to('/user/pembelian');
    }
}
