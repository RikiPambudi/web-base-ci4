<?php

namespace App\Controllers;
use App\Libraries\Calculator;
use CodeIgniter\Controller;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home');
    }

    public function setPesan($tipe)
    {
        return redirect()->to(base_url('/'))->with($tipe, 'Pesan ' . $tipe);
    }

    public function calculate()
    {
        $num1 = $this->request->getPost('num1');
        $num2 = $this->request->getPost('num2');
        $operator = $this->request->getPost('operator');

        // Panggil class Calculator
        $calculator = new Calculator();
        $result = $calculator->calculate($num1, $num2, $operator);

        return view('home', ['result' => $result]);
    }
}
