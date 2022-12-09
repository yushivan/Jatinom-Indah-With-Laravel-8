<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Dashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct() {
        $this->Dashboard = new Dashboard();
        // $this->middleware('auth');
    }
    public function index(){
        return view('admin.beranda');
    }
}