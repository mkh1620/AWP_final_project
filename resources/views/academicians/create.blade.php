@extends('layouts.app')

@section('title', 'Add New Academician')

@section('content')
<div style="background-color: #f4f4f9; padding: 20px; min-height: 100vh;">
    <div style="max-width: 800px; margin: 0 auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <!-- Page Title -->
        <h2 style="text-align: center; color: #333; margin-bottom: 20px;">Add New Academician</h2>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Add Academician Form -->
        <form method="POST" action="{{ route('academicians.store') }}">
            @csrf

            <div style="margin-bottom: 15px;">
                <label for="name" style="display: block; color: #555; margin-bottom: 5px;">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter name" required
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="staff_number" style="display: block; color: #555; margin-bottom: 5px;">Staff Number</label>
                <input type="text" id="staff_number" name="staff_number" placeholder="Enter staff number" required
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="email" style="display: block; color: #555; margin-bottom: 5px;">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter email" required
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="college" style="display: block; color: #555; margin-bottom: 5px;">College</label>
                <input type="text" id="college" name="college" placeholder="Enter college" required
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="department" style="display: block; color: #555; margin-bottom: 5px;">Department</label>
                <input type="text" id="department" name="department" placeholder="Enter department" required
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="position" style="display: block; color: #555; margin-bottom: 5px;">Position</label>
                <select id="position" name="position" required
                        style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                    <option value="" disabled selected>Select Position</option>
                    <option value="Professor">Professor</option>
                    <option value="Associate Professor">Associate Professor</option>
                    <option value="Senior Lecturer">Senior Lecturer</option>
                    <option value="Lecturer">Lecturer</option>
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="role" style="display: block; color: #555; margin-bottom: 5px;">Role</label>
                <select id="role" name="role" required
                        style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                    <option value="project_member" selected>Project Member</option>
                    <option value="project_leader">Project Leader</option>
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="password" style="display: block; color: #555; margin-bottom: 5px;">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="password_confirmation" style="display: block; color: #555; margin-bottom: 5px;">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" required
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>

            <div style="text-align: center;">
                <button type="submit" style="background: #2575fc; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Add Academician</button>
                <a href="{{ route('academicians.index') }}" style="margin-left: 10px; padding: 10px 20px; background: #6a11cb; color: white; border-radius: 5px; text-decoration: none;">Back to List</a>
            </div>
        </form>
    </div>
</div>
@endsection
