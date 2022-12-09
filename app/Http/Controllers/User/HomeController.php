<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\HomeModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct() {
        $this->HomeModel = new HomeModel();
    }
    public function index()
    {
        $data = [
            'slider' => $this->HomeModel->getSlider(),
            'anak_perusahaan' => $this->HomeModel->getAnakPerusahaan(),
            'produk' => $this->HomeModel->getProduk(),
            'expertise' => $this->HomeModel->getExpertise(),
            'ulasan' => $this->HomeModel->getUlasan(),
            'partner' => $this->HomeModel->getPartner()
        ];
        return view('user/v_home',$data);
    }
    public function getDetailAp($id){
        $data = [
            'anak_perusahaan' => $this->HomeModel->getDetailAp($id)
        ];
        return view('user/v_detail-anak-perusahaan', $data);

    }
}