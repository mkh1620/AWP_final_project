@extends('layouts.app')

@section('content')
<div style="padding: 20px; min-height: 100vh; background-color: #f4f4f9;">
    <div style="max-width: 800px; margin: 0 auto;">

        <!-- Page Title -->
        <h1 style="text-align: center; color: #333; margin-bottom: 20px; font-weight: 700;">Edit Academician</h1>

        <!-- Form -->
        <form action="{{ route('academicians.update', $academician) }}" method="POST" style="background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
            @csrf
            @method('PATCH')

            <!-- Name -->
            <div style="margin-bottom: 15px;">
                <label for="name" style="display: block; font-weight: 600; color: #333; margin-bottom: 5px;">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $academician->name) }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
                @error('name')
                    <p style="color: red; font-size: 14px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Staff Number -->
            <div style="margin-bottom: 15px;">
                <label for="staff_number" style="display: block; font-weight: 600; color: #333; margin-bottom: 5px;">Staff Number</label>
                <input type="text" id="staff_number" name="staff_number" value="{{ old('staff_number', $academician->staff_number) }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
                @error('staff_number')
                    <p style="color: red; font-size: 14px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div style="margin-bottom: 15px;">
                <label for="email" style="display: block; font-weight: 600; color: #333; margin-bottom: 5px;">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $academician->email) }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
                @error('email')
                    <p style="color: red; font-size: 14px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- College -->
            <div style="margin-bottom: 15px;">
                <label for="college" style="display: block; font-weight: 600; color: #333; margin-bottom: 5px;">College</label>
                <input type="text" id="college" name="college" value="{{ old('college', $academician->college) }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
                @error('college')
                    <p style="color: red; font-size: 14px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Department -->
            <div style="margin-bottom: 15px;">
                <label for="department" style="display: block; font-weight: 600; color: #333; margin-bottom: 5px;">Department</label>
                <input type="text" id="department" name="department" value="{{ old('department', $academician->department) }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
                @error('department')
                    <p style="color: red; font-size: 14px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Position -->
            <div style="margin-bottom: 15px;">
                <label for="position" style="display: block; font-weight: 600; color: #333; margin-bottom: 5px;">Position</label>
                <input type="text" id="position" name="position" value="{{ old('position', $academician->position) }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
                @error('position')
                    <p style="color: red; font-size: 14px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div style="text-align: right;">
                <button type="submit" style="padding: 10px 20px; background: #2575fc; color: white; border: none; border-radius: 5px; font-weight: 600; cursor: pointer;">Update</button>
                <a href="{{ route('academicians.index') }}" style="padding: 10px 20px; background: #ddd; color: #333; border-radius: 5px; text-decoration: none; font-weight: 600; margin-left: 10px;">Cancel</a>
            </div>
        </form>

    </div>
</div>
@endsection
