@extends('layouts.app')

@section('content')
<div style="background: linear-gradient(135deg, #2575fc, #6a11cb); 
            padding: 20px; 
            min-height: 100vh; 
            color: white;">
    <div style="max-width: 1200px; margin: 0 auto;">

        <!-- Page Title -->
        <h1 style="text-align: center; color: white; margin-bottom: 20px;">Project Leader Dashboard</h1>

        <!-- Metrics Section -->
        <div style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: center;">
            <div style="flex: 1; min-width: 250px; background: rgba(255, 255, 255, 0.2); color: white; padding: 20px; border-radius: 10px; text-align: center;">
                <h2>{{ $activeProjects }}</h2>
                <p>Active Projects</p>
            </div>
            <div style="flex: 1; min-width: 250px; background: rgba(255, 255, 255, 0.2); color: white; padding: 20px; border-radius: 10px; text-align: center;">
                <h2>{{ $overdueMilestones }}</h2>
                <p>Overdue Milestones</p>
            </div>
        </div>

        <!-- Actions Section -->
        <div style="margin-top: 30px; text-align: center;">
            <a href="{{ route('research-grants.index') }}" style="margin-right: 10px; padding: 10px 20px; text-decoration: none; background: #ffffff; color: #2575fc; border-radius: 5px;">View Research Grants</a>
            <a href="{{ route('milestones.index') }}" style="padding: 10px 20px; text-decoration: none; background: #ffffff; color: #6a11cb; border-radius: 5px;">View Milestones</a>
        </div>
        
    </div>
</div>
@endsection
