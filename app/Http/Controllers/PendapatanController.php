<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pendapatan;

class PendapatanController extends Controller
{
    public function index()
    {
        return view('dashboard.keuangan', [
            "title" => "pendapatan",
            "pendapatan" => Pendapatan::all()
        ]);
    }
}
