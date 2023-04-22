<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Dompdf\Dompdf;




class Password_Reset extends Controller
{


    public function requestReset(Request $request)
    {




        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('fail', 'Fail! Please enter a valid email address.');
        }

        $token = Str::random(32);
        $user->forgot_hash = $token;
        $user->save();

        // Generate the password reset link
        $resetLink = url('/password/reset', $token);

        // Create the PDF file
        $dompdf = new Dompdf();
        $dompdf->loadHtml("<p><center><h3>Password reset for Project Management system</h3></center></p><p>Dear user,</p><p>Please click the following link to reset your password:</p><p><a href='{$resetLink}'>{$resetLink}</a></p>");
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $pdfContent = $dompdf->output();

        // Save the PDF file to the public folder
        $filename = 'password-reset-' . $user->id . '.pdf';
        file_put_contents(public_path($filename), $pdfContent);

        return redirect()->back()->with('success', 'Suceess! Password reset link has been sent to your email successfully.');
    }



    public function showResetForm($token)
    {

        $user = User::where('forgot_hash', $token)->first();


        if (!$user) {
            abort(404);
        }

        return view('auth.forgot-password', ['token' => $user->forgot_hash, 'email' => $user->email]);
    }

    public function reset(Request $request)
    {
        // Validate the form data
        $request->validate([
            '_token' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);


        // Find the user by email
        $user = User::where('email', $request->email)->first();




        // Update the user's password and reset the token
        $user->password = Hash::make($request->password);
        $user->forgot_hash = null;
        $user->save();

        // Redirect to the home page
        return redirect('/crm_systems')->with('status', 'Your password has been reset successfully. Login with new password.');



    }

}

?>