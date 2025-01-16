<?php

use Illuminate\Support\Facades\Route;
use App\Models\Academician;
use App\Models\ResearchGrant;
use App\Models\Milestone;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisterController;


// Home and Authentication Routes
Route::get('/', function () {
    return view('welcome');
});

// Admin Dashboard Route
Route::get('/dashboard/admin', function () {
    $totalAcademicians = Academician::count();
    $ongoingGrants = ResearchGrant::where('status', 'ongoing')->count();
    $upcomingMilestones = Milestone::where('target_date', '>=', now())->count();
    $overdueMilestones = Milestone::where('target_date', '<', now())->where('status', 'pending')->count();

    return view('dashboard.admin', compact('totalAcademicians', 'ongoingGrants', 'upcomingMilestones', 'overdueMilestones'));
})->middleware(['auth'])->name('dashboard.admin');

// Project Leader Dashboard Route
Route::get('/dashboard/leader', function () {
    $user = auth()->user();
    $activeProjects = ResearchGrant::where('project_leader_id', $user->staff_id)->count();
    $overdueMilestones = Milestone::whereHas('grant', function ($query) use ($user) {
        $query->where('project_leader_id', $user->staff_id);
    })->where('status', 'pending')
    ->where('target_date', '<', now())->count();

    return view('dashboard.leader', compact('activeProjects', 'overdueMilestones'));
})->middleware(['auth'])->name('dashboard.leader');

// Generic Dashboard Route
Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->role === 'admin') {
        return redirect()->route('dashboard.admin');
    } elseif ($user->role === 'project_leader') {
        return redirect()->route('dashboard.leader');
    }

    abort(403, 'Unauthorized');
})->middleware('auth')->name('dashboard');


Route::get('/test-register-controller', function () {
    return app(\App\Http\Controllers\Auth\RegisterController::class) ? 'Controller exists' : 'Controller does not exist';
});


// Admin Routes
Route::middleware(['auth'])->group(function () {
    
    
    
    // Academicians Management
    Route::get('/academicians', function () {
        $academicians = Academician::all();
        return view('academicians.index', compact('academicians'));
    })->name('academicians.index');

    Route::get('/academicians/create', function () {
        return view('academicians.create');
    })->name('academicians.create');

    Route::post('/academicians', function (\Illuminate\Http\Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'staff_number' => 'required|unique:academicians',
            'email' => 'required|email|unique:academicians',
            'college' => 'required',
            'department' => 'required',
            'position' => 'required',
            'role' => 'required|in:project_leader,project_member',
        ]);
    
        Academician::create($validated);
    
        // If the role is project_leader, create a user account for login
        if ($validated['role'] === 'project_leader') {
            \App\Models\User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt('default_password'), // Set a default password; admin can reset it later
                'role' => 'project_leader',
            ]);
        }
    
        return redirect()->route('academicians.index')->with('success', 'Academician added successfully.');
    })->name('academicians.store');
    

    Route::get('/academicians/{academician}/edit', function (Academician $academician) {
        return view('academicians.edit', compact('academician'));
    })->name('academicians.edit');

    Route::patch('/academicians/{academician}', function (\Illuminate\Http\Request $request, Academician $academician) {
        $validated = $request->validate([
            'name' => 'required',
            'staff_number' => 'required|unique:academicians,staff_number,' . $academician->id,
            'email' => 'required|email|unique:academicians,email,' . $academician->id,
            'college' => 'required',
            'department' => 'required',
            'position' => 'required',
        ]);

        $academician->update($validated);
        return redirect()->route('academicians.index')->with('success', 'Academician updated successfully.');
    })->name('academicians.update');

    Route::delete('/academicians/{academician}', function (Academician $academician) {
        $academician->delete();
        return redirect()->route('academicians.index')->with('success', 'Academician deleted successfully.');
    })->name('academicians.destroy');

    // Research Grants Management
    Route::get('/research-grants', function () {
        $user = auth()->user();

        if ($user->isProjectLeader()) {
            $researchGrants = ResearchGrant::where('project_leader_id', $user->staff_id)->with('leader', 'members')->get();
        } else {
            $researchGrants = ResearchGrant::with('leader', 'members')->get();
        }

        return view('research-grants.index', compact('researchGrants'));
    })->middleware(['auth'])->name('research-grants.index');

    Route::get('/research-grants/create', function () {
        $academicians = Academician::all();
        return view('research-grants.create', compact('academicians'));
    })->name('research-grants.create');

    Route::post('/research-grants', function (\Illuminate\Http\Request $request) {
        $validated = $request->validate([
            'title' => 'required',
            'project_leader_id' => 'required|exists:academicians,id',
            'amount' => 'required|numeric',
            'provider' => 'required',
            'start_date' => 'required|date',
            'duration_months' => 'required|integer',
        ]);

        $grant = ResearchGrant::create($validated);
        $grant->members()->sync($request->input('members', []));

        return redirect()->route('research-grants.index')->with('success', 'Research Grant added successfully.');
    })->name('research-grants.store');

    Route::get('/research-grants/{grant}/edit', function (ResearchGrant $grant) {
        $academicians = Academician::all();
        return view('research-grants.edit', compact('grant', 'academicians'));
    })->name('research-grants.edit');
    

    Route::patch('/research-grants/{grant}', function (\Illuminate\Http\Request $request, ResearchGrant $grant) {
        $validated = $request->validate([
            'title' => 'required',
            'project_leader_id' => 'required|exists:academicians,id',
            'amount' => 'required|numeric',
            'provider' => 'required',
            'start_date' => 'required|date',
            'duration_months' => 'required|integer',
        ]);

        $grant->update($validated);
        $grant->members()->sync($request->input('members', []));

        return redirect()->route('research-grants.index')->with('success', 'Research Grant updated successfully.');
    })->name('research-grants.update');

    Route::delete('/research-grants/{grant}', function (ResearchGrant $grant) {
        $grant->delete();
        return redirect()->route('research-grants.index')->with('success', 'Research Grant deleted successfully.');
    })->name('research-grants.destroy');

    // Milestones Management
    Route::get('/milestones', function () {
        $user = auth()->user();

        if ($user->isProjectLeader()) {
            $milestones = Milestone::whereHas('grant', function ($query) use ($user) {
                $query->where('project_leader_id', $user->staff_id);
            })->with('grant')->get();
        } else {
            $milestones = Milestone::with('grant')->get();
        }

        return view('milestones.index', compact('milestones'));
    })->middleware(['auth'])->name('milestones.index');

    Route::get('/milestones/create', function () {
        $user = auth()->user();
        $grants = $user->isProjectLeader()
            ? ResearchGrant::where('project_leader_id', $user->staff_id)->get()
            : ResearchGrant::all();

        return view('milestones.create', compact('grants'));
    })->middleware(['auth'])->name('milestones.create');

    Route::post('/milestones', function (\Illuminate\Http\Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'target_date' => 'required|date',
            'status' => 'required',
            'deliverable' => 'required',
            'research_grant_id' => 'required|exists:research_grants,id',
        ]);

        Milestone::create($validated);

        return redirect()->route('milestones.index')->with('success', 'Milestone created successfully.');
    })->middleware(['auth'])->name('milestones.store');

    Route::get('/milestones/{milestone}/edit', function (Milestone $milestone) {
        $user = auth()->user();

        if ($user->isProjectLeader() && $milestone->grant->project_leader_id !== $user->staff_id) {
            abort(403, 'Unauthorized');
        }

        $grants = $user->isProjectLeader()
            ? ResearchGrant::where('project_leader_id', $user->staff_id)->get()
            : ResearchGrant::all();

        return view('milestones.edit', compact('milestone', 'grants'));
    })->middleware(['auth'])->name('milestones.edit');

    Route::patch('/milestones/{milestone}', function (\Illuminate\Http\Request $request, Milestone $milestone) {
        $validated = $request->validate([
            'name' => 'required',
            'target_date' => 'required|date',
            'status' => 'required',
            'deliverable' => 'required',
            'research_grant_id' => 'required|exists:research_grants,id',
        ]);
    
        $milestone->update($validated);
    
        return redirect()->route('milestones.index')->with('success', 'Milestone updated successfully.');
    })->name('milestones.update');
    

    Route::delete('/milestones/{milestone}', function (Milestone $milestone) {
        $user = auth()->user();

        if ($user->isProjectLeader() && $milestone->grant->project_leader_id !== $user->staff_id) {
            abort(403, 'Unauthorized');
        }

        $milestone->delete();

        return redirect()->route('milestones.index')->with('success', 'Milestone deleted successfully.');
    })->middleware(['auth'])->name('milestones.destroy');

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
    
    Route::post('/register', function (\Illuminate\Http\Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|confirmed|min:8',
            'staff_number' => 'required|unique:academicians|max:10',
            'college' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'role' => 'required|in:project_leader,project_member',
        ]);
    
        $user = \App\Models\User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
        ]);
    
        \App\Models\Academician::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'staff_number' => $validated['staff_number'],
            'college' => $validated['college'],
            'department' => $validated['department'],
            'position' => $validated['position'],
        ]);
    
        auth()->login($user);
    
        return redirect()->route('dashboard');
    });
   
});

// Authentication Routes
Auth::routes();
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
