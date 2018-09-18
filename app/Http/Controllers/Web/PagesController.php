<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
	public function index()
	{
		$data = 'this is data passed from controller';
		return view('pages.index', ['name'=>'hamad adel', 'age'=>25])->with('kalam', $data);
	}
}
