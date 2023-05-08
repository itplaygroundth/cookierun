<?php
namespace Easy\Controllers;
 

class Index extends Controller {
    public function index() {
        $data = ['title' => 'Welcome'];
        $this->view('index/index',$data);
    }
}