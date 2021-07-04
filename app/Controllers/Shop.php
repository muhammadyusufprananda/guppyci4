<?php

namespace App\Controllers;

use App\Models\ShopModel;

class Shop extends BaseController
{
    protected $shopModel;
    public function __construct()
    {
        $this->shopModel = new ShopModel(); 
    }
    public function index()
    {
        $data = [
            'title' => 'Shoplist',
            'ikan' => $this->shopModel->getIkan()
        ];
        return view('shop/index', $data);
    }
    public function detail($slug)
    {
        $ikan = $this->shopModel->getIkan($slug);
        $data = [
            'title' => 'Not Found',
            'ikan' => $ikan
        ];
        if (empty($data['ikan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Ikan tidak ditemukan.');
        }
        else {
            $data['title'] = $ikan['nama'];
        }
        return view('shop/detail', $data);
    }
}