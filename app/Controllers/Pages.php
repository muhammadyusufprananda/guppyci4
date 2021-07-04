<?php

namespace App\Controllers;

use App\Models\PagesModel;

class Pages extends BaseController
{
    protected $pagesModel;
    public function __construct()
    {
        $this->pagesModel = new PagesModel(); 
    }
	public function index()
	{
        $data = [
            'title' => 'Home',
            'ikan' => $this->pagesModel->getProdukBaru()
        ];
        // dd($this->pagesModel->getProdukBaru());
		return view('pages/home', $data);
	}
    public function about_us()
    {
        $data = [
            'title' => 'About Us'
        ];
		return view('pages/about_us', $data);
    }
}
