<?php

class Internal extends Controller
{
    public function index()
    {
        $this->view('Internal/dashboard');
    }

    public function petaBersama()
    {
        $this->view('Internal/petaBersama');
    }

    public function perawatan()
    {
        $this->view('Internal/perawatan');
    }

    public function FormPerawatan()
    {
        $this->view('Internal/Form-Perawatan');
    }
}
