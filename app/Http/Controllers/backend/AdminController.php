<?php
namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;

use App\Models\admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('backend.pages.index');
    }
}
