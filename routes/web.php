<?php
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

// GET Route: Display the list
Route::get('/formtest', function(){
    // Use 'emails' instead of '$emails'
    $emails = session()->get('emails', []);

    return view('formtest', [
        'emails' => $emails,
    ]);
});

// POST Route: Add email (Tasks 2, 3, 5, 6)
Route::post('/formtest', function(Request $request){
    // Task 2: Validation (Email format and required)
    $request->validate([
        'email' => 'required|email',
    ]);

    $email = request('email');
    $emails = session()->get('emails', []);

    // Task 3: Prevent Duplicate Emails
    if (in_array($email, $emails)) {
        return redirect('/formtest')->with('error', 'This email is already in the list.');
    }

    // Task 6: Limit Entries to 5
    if (count($emails) >= 5) {
        return redirect('/formtest')->with('error', 'Limit reached! You can only store 5 emails.');
    }

    // Task 5: Success Message
    session()->push('emails', $email);
    return redirect('/formtest')->with('success', 'Email added successfully!');
});

// Task 4: Delete Single Email
Route::post('/delete-email/{index}', function($index){
    $emails = session()->get('emails', []);

    if (isset($emails[$index])) {
        unset($emails[$index]);
        // array_values resets the keys (0, 1, 2...) so the next delete works correctly
        session()->put('emails', array_values($emails));
    }

    return redirect('/formtest')->with('success', 'Email removed.');
});

// Original Delete All (Optional)
Route::get('/delete-all', function(){
    session()->forget('emails');
    return redirect('/formtest');
});