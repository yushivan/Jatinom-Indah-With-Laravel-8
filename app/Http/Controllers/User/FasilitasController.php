<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\FasilitasModel;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function __construct() {
        $this->FasilitasModel = new FasilitasModel();
    }
    public function index()
    {
        $data = [
            'fasilitas' => $this->FasilitasModel->getFasilitas()
        ];
        return view('user/v_fasilitas',$data);
    }
}