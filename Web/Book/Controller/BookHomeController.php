<?php

namespace Web\Book\Controller;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class BookHomeController extends Controller {
    public function index(): View {
        return view('book::home');
    }
}