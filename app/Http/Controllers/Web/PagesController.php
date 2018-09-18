<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
	public function index()
	{
		$data = 'this is data passed from controller';
		return view('pages.index', ['name'=>'hamad adel', 'age'=>25])->with('kalam', $data);
	}

	public function about()
	{
		return view('pages.about');
	}

	public function contact()
	{
		return view('pages.contact');
	}

	public function sendEmail(Request $request)
	{
		$request->validate([
			'name'=>'required|min:5|max:255',
			'email'=>'required|email|min:10|max:120',
			'subject'=>'required|min:5|max:100',
			'message'=>'required|min:10|max:255'
		]);

		$name = $request->input('name');
		$email = $request->input('email');
		$subject = $request->input('subject');
		$body = $request->input('message');

		Mail::to('hamadwebdeveloper@gmail.com')
			->send( new \App\Mail\ContactUsMail($name, $email, $subject, $body) );
		return redirect('contact')->with('success', 'thanks for contact us i will answer your message soon');
	}
}
