@extends('layouts.app')

@section('title', 'Academician Details')

@section('content')
<h1>Academician Details</h1>
<p><strong>Name:</strong> {{ $academician->name }}</p>
<p><strong>Staff Number:</strong> {{ $academician->staff_number }}</p>
<p><strong>Email:</strong> {{ $academician->email }}</p>
<p><strong>College:</strong> {{ $academician->college }}</p>
<p><strong>Department:</strong> {{ $academician->department }}</p>
<p><strong>Position:</strong> {{ $academician->position }}</p>
<a href="{{ route('academicians.index') }}">Back to List</a>
@endsection
