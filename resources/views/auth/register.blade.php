@extends('layouts.app')

@section('content')
<div style="padding: 20px; max-width: 600px; margin: 0 auto;">
    <h1 style="text-align: center; margin-bottom: 20px;">Register</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="name" style="display: block; font-weight: 600;">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            @error('name') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; font-weight: 600;">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            @error('email') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password" style="display: block; font-weight: 600;">Password:</label>
            <input type="password" id="password" name="password" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            @error('password') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password_confirmation" style="display: block; font-weight: 600;">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="staff_number" style="display: block; font-weight: 600;">Staff Number:</label>
            <input type="text" id="staff_number" name="staff_number" value="{{ old('staff_number') }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            @error('staff_number') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="college" style="display: block; font-weight: 600;">College:</label>
            <input type="text" id="college" name="college" value="{{ old('college') }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            @error('college') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="department" style="display: block; font-weight: 600;">Department:</label>
            <input type="text" id="department" name="department" value="{{ old('department') }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            @error('department') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="position" style="display: block; font-weight: 600;">Position:</label>
            <input type="text" id="position" name="position" value="{{ old('position') }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            @error('position') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="role" style="display: block; font-weight: 600;">Role:</label>
            <select id="role" name="role" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                <option value="project_leader" {{ old('role') === 'project_leader' ? 'selected' : '' }}>Project Leader</option>
                <option value="project_member" {{ old('role') === 'project_member' ? 'selected' : '' }}>Project Member</option>
            </select>
            @error('role') <p style="color: red;">{{ $message }}</p> @enderror
        </div>

        <div style="text-align: center;">
            <button type="submit" style="padding: 10px 20px; background: #2575fc; color: white; border: none; border-radius: 5px; font-weight: 600; cursor: pointer;">Register</button>
        </div>
    </form>
</div>
@endsection
