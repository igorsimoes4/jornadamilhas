<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class HomeController extends Controller
{
    public function boot(): void {
        Blade::component('package-alert', Alert::class);
    }

    public function index() {
        $dados = $this->boot();
        return view('welcome', $dados);
    }
}
