<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        session()->forget('auth');
        $categories = Category::get();
        return view('presentation', ['categories' => $categories]);
    }

    public function userIndex()
    {
        return view('admin.users');
    }
    public function partnerIndex()
    {
        return view('admin.partners');

    }

}


