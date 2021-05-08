<?php

namespace App\Http\Controllers\Admin\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminApprovalController extends Controller
{
    public function approval()
    {
        return view('Admin.approval.index');
    }

    public function admin()
    {
        return view('Admin.dashboard');
    }
}
