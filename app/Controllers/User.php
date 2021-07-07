<?php

namespace App\Controllers;

use App\Controllers\Shop;

class User extends BaseController
{
    protected $db, $builderUsers, $builderKeranjang, $builderCheckout;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builderUsers = $this->db->table('users');
        $this->builderKeranjang = $this->db->table('keranjang');
        $this->builderCheckout = $this->db->table('checkout');
        $this->shop = new Shop();
    }
    public function index()
    {
        $data['title'] = 'Profil';
        $data['nav'] = 'profil';
        $this->builderUsers->where('users.id', user_id());
        $query = $this->builderUsers->get();
        $data['user'] = $query->getRow();
        return view('user/profil', $data);
    }
    public function simpanedit()
    {
        $this->builderUsers->where('users.id', user_id());
        $this->builderUsers->update([
            'username' => $this->request->getVar('usernameUser'),
            'namauser' => $this->request->getVar('namauserUser'),
            'alamat' => $this->request->getVar('alamatUser'),
            'nohp' => $this->request->getVar('nohpUser'),
        ]);
        session()->setFlashdata('pesan-hijau', 'Data berhasil diubah.');
        return redirect()->to('/user');
    }
    public function keranjang()
    {
        $data['title'] = 'Keranjang';
        $data['nav'] = 'keranjang';
        $data['keranjang'] = $this->shop->queryKeranjang();
        return view('user/keranjang', $data);
    }
    public function pembelian()
    {
        $this->builderCheckout->join('status', 'status.id = checkout.id_status');
        $this->builderCheckout->where('checkout.id_users', user_id());
        $query = $this->builderCheckout->get();
        $data['checkout'] = $query->getResult();
        $this->builderUsers->where('users.id', user_id());
        $data['user'] = $this->builderUsers->get()->getRow();
        $data['keranjang'] = $this->shop->queryKeranjang(false);
        $data['title'] = 'Pembelian';
        $data['nav'] = 'pembelian';
        return view('user/pembelian', $data);
    }
}
