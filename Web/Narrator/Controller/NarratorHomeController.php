<?php

namespace Web\Narrator\Controller;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class NarratorHomeController extends Controller {
    public function index(): View {
        return view('narrator::home');
    }
}