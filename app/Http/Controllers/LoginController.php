<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    // Redirect user to Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle Google callback
    public function handleGoogleCallback()
{
    try {
        // Get user information from Google
        $googleUser = Socialite::driver('google')->user();
        
        // Debug: Check if Google user information is retrieved
        // dd($googleUser);  // This will show the Google user data for debugging

        // Save user information in session
        session([
            'google_name' => $googleUser->getName(),
            'google_email' => $googleUser->getEmail(),
            'google_avatar' => $googleUser->getAvatar(),
        ]);

        // Redirect to feedback form
        return redirect()->intended('/feed');
    } catch (\Exception $e) {
        // Debug: Display error message from exception
        // dd($e->getMessage());  // This will show any errors occurring

        return redirect('/web')->withErrors('Unable to login using Google.');
    }
}


    // Save feedback to the database
    public function submitFeedback(Request $request)
    {
        $request->validate([
            'feedback' => 'required|string|max:500',
        ]);

        DB::table('logins')->insert([
            'name' => session('google_name'),
            'email' => session('google_email'),
            'avatar' => session('google_avatar'),
            'feedback' => $request->feedback,
            'created_at' => now(),
        ]);

        return redirect('/form')->with('success', 'Thank you for your feedback!');
    }
}

?>