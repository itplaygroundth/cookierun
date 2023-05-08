<?php 

namespace Easy\Controllers;

class Home extends Controller {
    public function index() {
        $data = ['title' => 'Welcome'];
        $this->view('home/index',$data);
    }
}