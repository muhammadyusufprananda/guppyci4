<?php

namespace App\Controllers;

class User extends BaseController
{
    protected $db, $builder, $builderKeranjang;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->builderKeranjang = $this->db->table('keranjang');
    }
	public function index()
	{
        $data['title'] = 'Profil';
        $data['nav'] = 'profil';
        $this->builder->where('users.id', user_id());
        $query = $this->builder->get();
        $data['user'] = $query->getRow();
		return view('user/profil', $data);
	}
    public function simpanedit()
    {
        $this->builder->where('users.id', user_id());
        $this->builder->update([
            'username' => $this->request->getVar('usernameUser'),
            'alamat' => $this->request->getVar('alamatUser'),
            'nohp' => $this->request->getVar('nohpUser'),
        ]);
        session()->setFlashdata('pesan-hijau', 'Data berhasil diubah.');
        return redirect()->to('/user');
    }
    public function keranjang()
    {
        $this->builderKeranjang->select('id_users, id_ikan, jumlah, nama, harga, total');
        $this->builderKeranjang->join('users', 'users.id = keranjang.id_users');
        $this->builderKeranjang->join('ikan', 'ikan.id = keranjang.id_ikan');
        $this->builderKeranjang->where('keranjang.id_users', user_id());
        $query = $this->builderKeranjang->get();
        $data['keranjang'] = $query->getResult();
        $data['title'] = 'Keranjang';
        $data['nav'] = 'keranjang';
        return view('user/keranjang', $data);
    }
}
