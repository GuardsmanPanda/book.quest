<?php

namespace Web\Series\Controller;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class SeriesHomeController extends Controller {
    public function index(): View {
        return view('series::home');
    }
}