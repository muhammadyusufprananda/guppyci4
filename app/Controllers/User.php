<?php

namespace App\Controllers;

class User extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
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
}
