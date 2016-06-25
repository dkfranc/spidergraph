<?php
namespace App\Http\Controllers;

class AdminController extends Controller
{
    /**
     * Show QuickAdmin dashboard page
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }
}