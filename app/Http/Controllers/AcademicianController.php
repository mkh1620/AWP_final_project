<?php
namespace App\Http\Controllers;

use App\Models\Academician;
use Illuminate\Http\Request;

class AcademicianController extends Controller
{
    public function index()
    {
        $academicians = Academician::all();
        return view('academicians.index', compact('academicians'));
    }

    public function create()
    {
        return view('academicians.create');
    }

    public function store(Request $request)
{
    // Check if the email already exists in the `users` table
    $existingUser = \App\Models\User::where('email', $request->email)->first();

    if ($existingUser) {
        return redirect()->back()->withErrors(['email' => 'The email is already in use. Please choose another email.']);
    }

    // Validate the input
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:academicians', // Check unique in academicians table
        'staff_number' => 'required|unique:academicians|max:10',
        'college' => 'required|string|max:255',
        'department' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'role' => 'required|in:project_leader,project_member',
        'password' => 'required|string|min:8|confirmed', // Admin provides a password
    ]);

    try {
        // Create the user in the `users` table
        $user = \App\Models\User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
        ]);

        // Create the academician in the `academicians` table
        \App\Models\Academician::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'staff_number' => $validated['staff_number'],
            'college' => $validated['college'],
            'department' => $validated['department'],
            'position' => $validated['position'],
        ]);

        return redirect()->route('academicians.index')->with('success', 'Academician added successfully.');
    } catch (\Exception $e) {
        // Handle any exception and provide feedback
        return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}



    public function show(Academician $academician)
    {
        return view('academicians.show', compact('academician'));
    }

    public function edit(Academician $academician)
    {
        return view('academicians.edit', compact('academician'));
    }

    public function update(Request $request, Academician $academician)
    {
        $request->validate([
            'name' => 'required',
            'staff_number' => 'required|unique:academicians,staff_number,' . $academician->id,
            'email' => 'required|email|unique:academicians,email,' . $academician->id,
            'college' => 'required',
            'department' => 'required',
            'position' => 'required',
        ]);

        $academician->update($request->all());
        return redirect()->route('academicians.index')->with('success', 'Academician updated successfully.');
    }

    public function destroy(Academician $academician)
    {
        $academician->delete();
        return redirect()->route('academicians.index')->with('success', 'Academician deleted successfully.');
    }
}
