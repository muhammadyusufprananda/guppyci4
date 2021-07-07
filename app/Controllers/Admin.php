<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin extends BaseController
{
    protected $adminModel, $db, $builderUsers, $builderCheckout, $builderKeranjang, $builderStatus;
    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->db = \Config\Database::connect();
        $this->builderUsers = $this->db->table('users');
        $this->builderCheckout = $this->db->table('checkout');
        $this->builderKeranjang = $this->db->table('keranjang');
        $this->builderStatus = $this->db->table('status');
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
        if (!$this->validate([
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
        } else {
            $rule = 'required|is_unique[ikan.nama]';
        }
        if (!$this->validate([
            'namaIkan' => $rule
        ])) {
            session()->setFlashdata('pesan-merah', 'Nama ikan sudah ada di Database.');
            return redirect()->to('/admin/edit/' . $this->request->getVar('namaIkan'));
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
    public function profil()
    {
        $data['title'] = 'Profil';
        $data['nav'] = 'profil';
        $this->builderUsers->where('users.id', user_id());
        $query = $this->builderUsers->get();
        $data['user'] = $query->getRow();
        return view('admin/profil', $data);
    }
    public function simpaneditprofil()
    {
        $this->builderUsers->where('users.id', user_id());
        $this->builderUsers->update([
            'username' => $this->request->getVar('usernameUser'),
            'namauser' => $this->request->getVar('namauserUser'),
            'alamat' => $this->request->getVar('alamatUser'),
            'nohp' => $this->request->getVar('nohpUser'),
        ]);
        session()->setFlashdata('pesan-hijau', 'Data berhasil diubah.');
        return redirect()->to('/admin/profil');
    }
    public function pembelian()
    {
        $data['title'] = 'Pembelian';
        $data['nav'] = 'pembelian';
        $this->builderCheckout->join('users', 'users.id = checkout.id_users');
        $this->builderCheckout->join('status', 'status.id = checkout.id_status');
        $query = $this->builderCheckout->get();
        $data['checkout'] = $query->getResult();
        $this->builderKeranjang->join('ikan', 'ikan.id = keranjang.id_ikan');
        $query = $this->builderKeranjang->get();
        $data['keranjang'] = $query->getResult();
        return view('admin/pembelian', $data);
    }
    public function hapuscheckout($kode)
    {
        $this->builderCheckout->where('checkout.kode', $kode)->delete();
        return redirect()->to('admin/pembelian');
    }
    public function pembeliandetail($kode)
    {
        $data['title'] = 'Pembelian';
        $data['nav'] = 'pembelian';
        $this->builderCheckout->join('users', 'users.id = checkout.id_users');
        $this->builderCheckout->join('status', 'status.id = checkout.id_status');
        $this->builderCheckout->where('checkout.kode', $kode);
        $query = $this->builderCheckout->get();
        $data['checkout'] = $query->getRow();
        $data['status'] = $this->builderStatus->get()->getResult();
        return view('admin/detail', $data);
    }
    public function updatecheckout($kode)
    {
        $this->builderCheckout->where('checkout.kode', $kode);
        $this->builderCheckout->update([
            'id_status' => $this->request->getVar('idStatus'),
        ]);
        session()->setFlashdata('pesan-hijau', 'Data berhasil diubah.');
        return redirect()->to('admin/pembelian');
    }
}
