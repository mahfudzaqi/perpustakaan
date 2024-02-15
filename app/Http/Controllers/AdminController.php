<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index() {
        return view('admin');
    }

    function administrator() {
        return view('book.buku');
    }

    function petugas() {
        return view('admin');
    }

    function peminjam() {
        return view('admin');
    }

}
