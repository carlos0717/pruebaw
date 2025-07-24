<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use Illuminate\Http\Request;

class DireccionesController extends Controller
{
    public function index()
    {
        return view('livewire.direccion-table');
    }
}
