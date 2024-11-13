<?php

class HomeController extends Controller {
    public function index() {
        // Muat tampilan beranda
        $this->view('templates/header');
        $this->view('home/index');
        $this->view('templates/footer');
    }
}

?>