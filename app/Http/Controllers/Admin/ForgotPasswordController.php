<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Mail;


class ForgotPasswordController extends Controller
{
    public function showForgotForm()
    {
        return view('admin.auth.forgot_password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email'=> 'required|email|exists:admin,email',
        ]);

        // 🚧 Simulasi: Belum ada sistem kirim email, maka munculkan pesan
        return redirect()->back()->with('toast', [
            'icon'  => 'info',
            'title' => 'Coming Soon!',
            'text'  => 'Fitur lupa password masih dalam tahap pengembangan.',
        ]);
    }
}
