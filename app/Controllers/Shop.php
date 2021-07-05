<?php

namespace App\Controllers;

use App\Models\ShopModel;

class Shop extends BaseController
{
    protected $shopModel, $db, $builder, $builderIkan;
    public function __construct()
    {
        $this->shopModel = new ShopModel(); 
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('keranjang');
        $this->builderIkan = $this->db->table('ikan');
    }
    public function index()
    {
        $this->builder->select('id_users, id_ikan, jumlah, nama, harga, total');
        $this->builder->join('users', 'users.id = keranjang.id_users');
        $this->builder->join('ikan', 'ikan.id = keranjang.id_ikan');
        $this->builder->where('keranjang.id_users', user_id());
        $query = $this->builder->get();
        $data = [
            'title' => 'Shoplist',
            'ikan' => $this->shopModel->getIkan(),
            'keranjang' => $query->getResult()
        ];
        return view('shop/index', $data);
    }
    public function detail($slug)
    {
        $ikan = $this->shopModel->getIkan($slug);
        $this->builder->select('id_users, id_ikan, jumlah, nama, harga, total');
        $this->builder->join('users', 'users.id = keranjang.id_users');
        $this->builder->join('ikan', 'ikan.id = keranjang.id_ikan');
        $this->builder->where('keranjang.id_users', user_id());
        $query = $this->builder->get();
        $data = [
            'title' => 'Not Found',
            'ikan' => $ikan,
            'keranjang' => $query->getResult()
        ];
        // dd($data['keranjang']);
        if (empty($data['ikan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Ikan tidak ditemukan.');
        }
        else {
            $data['title'] = $ikan['nama'];
        }
        return view('shop/detail', $data);
    }
    public function beli($id)
    {
        $this->builderIkan->where('ikan.id', $id);
        $query = $this->builderIkan->get();
        $data['ikan'] = $query->getRow();
        $data['id_users'] = user_id();
        $this->builder->insert([
            'id_ikan' => $data['ikan']->id,
            'id_users' => $data['id_users'],
            'jumlah' => $this->request->getVar('jumlahKeranjang'),
            'total' => $this->request->getVar('jumlahKeranjang') * $data['ikan']->harga
        ]);
        return redirect()->to('/shop');
    }
    public function hapuskeranjang($id_users, $id_ikan) {
        $this->builder->where("id_users = '" . $id_users ."' AND  id_ikan = '" . $id_ikan . "'")->delete();
        return redirect()->to('shop/');
    }
}