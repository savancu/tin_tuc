<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function Xinchao()
    {
    	echo "Xin chào các bạn";
    }
    public function Khoahoc($ten)
    {
    	echo "Khoa hoc ".$ten;
    	return redirect() -> route('MyRoute');
    }
}
