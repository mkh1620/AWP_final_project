@extends('layouts.app')

@section('content')
<div style="padding: 20px; min-height: 100vh; background-color: #f4f4f9;">
    <div style="max-width: 800px; margin: 0 auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">

        <!-- Page Title -->
        <h1 style="text-align: center; color: #333; margin-bottom: 20px; font-weight: 700;">Edit Research Grant</h1>

        <!-- Form -->
        <form method="POST" action="{{ route('research-grants.update', $grant->id) }}">
            @csrf
            @method('PATCH')

            <div style="margin-bottom: 20px;">
                <label for="title" style="display: block; margin-bottom: 5px; font-weight: 600; color: #333;">Grant Title:</label>
                <input type="text" id="title" name="title" value="{{ $grant->title }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label for="project_leader_id" style="display: block; margin-bottom: 5px; font-weight: 600; color: #333;">Project Leader:</label>
                <select id="project_leader_id" name="project_leader_id" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
                    <option value="">Select a Project Leader</option>
                    @foreach ($academicians as $academician)
                        <option value="{{ $academician->id }}" {{ $grant->project_leader_id == $academician->id ? 'selected' : '' }}>
                            {{ $academician->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom: 20px;">
                <label for="amount" style="display: block; margin-bottom: 5px; font-weight: 600; color: #333;">Grant Amount:</label>
                <input type="number" id="amount" name="amount" value="{{ $grant->amount }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label for="provider" style="display: block; margin-bottom: 5px; font-weight: 600; color: #333;">Provider:</label>
                <input type="text" id="provider" name="provider" value="{{ $grant->provider }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label for="start_date" style="display: block; margin-bottom: 5px; font-weight: 600; color: #333;">Start Date:</label>
                <input type="date" id="start_date" name="start_date" value="{{ $grant->start_date }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label for="duration_months" style="display: block; margin-bottom: 5px; font-weight: 600; color: #333;">Duration (Months):</label>
                <input type="number" id="duration_months" name="duration_months" value="{{ $grant->duration_months }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
            </div>

            <div style="text-align: center;">
                <button type="submit" style="padding: 10px 20px; background: #2575fc; color: white; border: none; border-radius: 5px; font-weight: 600; cursor: pointer;">Update Research Grant</button>
            </div>
        </form>

    </div>
</div>
@endsection
