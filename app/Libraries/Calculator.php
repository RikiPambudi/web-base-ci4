<?php
namespace App\Libraries;

class Calculator {
    public function calculate($num1, $num2, $operator) {
        switch ($operator) {
            case '+': return $num1 + $num2;
            case '-': return $num1 - $num2;
            case '*': return $num1 * $num2;
            case '/': return $num2 != 0 ? $num1 / $num2 : 'Error: Pembagi tidak boleh 0';
            default: return 'Operator Salah';
        }
    }
}
