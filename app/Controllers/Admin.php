<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin extends BaseController
{
    protected $adminModel, $db, $builder;
    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }
    public function index()
    {
        $data = [
            'title' => 'Admin Panel',
            'nav' => 'shoplist',
            'ikan' => $this->adminModel->getIkan()
        ];
        return view('admin/index', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data',
            'nav' => 'shoplist'
        ];
        return view('admin/tambah', $data);
    }
    public function simpan() 
    {
        if(!$this->validate([
            'namaIkan' => 'required|is_unique[ikan.nama]'
        ])) {
            session()->setFlashdata('pesan-merah', 'Nama ikan sudah ada di Database.');
            return redirect()->to('/admin/tambah');
        }
        $fileGambar = $this->request->getFile('gambarIkan');
        $namaGambar = $fileGambar->getRandomName();
        $fileGambar->move('img/fish', $namaGambar);
        $this->adminModel->save([
            'nama' => $this->request->getVar('namaIkan'),
            'slug' => $this->request->getVar('slugIkan'),
            'harga' => $this->request->getVar('hargaIkan'),
            'gambar' => $namaGambar,
            'stok' => $this->request->getVar('stokIkan'),
            'deskripsi' => $this->request->getVar('deskripsiIkan')
        ]);
        session()->setFlashdata('pesan-hijau', 'Data berhasil ditambahkan.');
        return redirect()->to('/admin');
    }
    public function hapus($id)
    {
        $this->adminModel->delete($id);
        session()->setFlashdata('pesan-merah', 'Data berhasil dihapus.');
        return redirect()->to('/admin');
    }
    public function edit($slug)
    {
        $ikan = $this->adminModel->getIkan($slug);
        $data = [
            'title' => 'Edit Data',
            'nav' => 'shoplist',
            'ikan' => $ikan
        ];
        return view('admin/edit', $data);
    }
    public function simpanedit($id)
    {
        $ikanLama = $this->adminModel->getIkanByID($id);
        if ($ikanLama['nama'] == $this->request->getVar('namaIkan')) {
            $rule = 'required';
        }
        else {
            $rule = 'required|is_unique[ikan.nama]';
        }
        if(!$this->validate([
            'namaIkan' => $rule
        ])) {
            session()->setFlashdata('pesan-merah', 'Nama ikan sudah ada di Database.');
            return redirect()->to('/admin/edit/'.$this->request->getVar('namaIkan'));
        }
        $fileGambar = $this->request->getFile('gambarIkan');
            if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img/fish', $namaGambar);
        }
        $this->adminModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('namaIkan'),
            'slug' => $this->request->getVar('slugIkan'),
            'harga' => $this->request->getVar('hargaIkan'),
            'gambar' => $namaGambar,
            'stok' => $this->request->getVar('stokIkan'),
            'deskripsi' => $this->request->getVar('deskripsiIkan')
        ]);
        session()->setFlashdata('pesan-hijau', 'Data berhasil diubah.');
        return redirect()->to('/admin');
    }
    public function profil() {
        $data['title'] = 'Profil';
        $data['nav'] = 'profil';
        $this->builder->where('users.id', user_id());
        $query = $this->builder->get();
        $data['user'] = $query->getRow();
        // dd($data['user']);
		return view('admin/profil', $data);
    }
    public function simpaneditprofil() {
        $this->builder->where('users.id', user_id());
        $this->builder->update([
            'username' => $this->request->getVar('usernameUser'),
            'alamat' => $this->request->getVar('alamatUser'),
            'nohp' => $this->request->getVar('nohpUser'),
        ]);
        session()->setFlashdata('pesan-hijau', 'Data berhasil diubah.');
        return redirect()->to('/admin/profil');
    }
}