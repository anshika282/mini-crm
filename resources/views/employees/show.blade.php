{{-- resources/views/employees/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employee Details</h1>
    <div class="card">
        <div class="card-body">
            <h3>{{ $employee->first_name }} {{ $employee->last_name }}</h3>
            <p><strong>Company:</strong> {{ $employee->company->name }}</p>
            <p><strong>Email:</strong> {{ $employee->email }}</p>
            <p><strong>Phone:</strong> {{ $employee->phone }}</p>
            <p>
                <strong>Profile Picture:</strong><br>
                @if($employee->profile_picture)
                    <img src="{{ route('employees.profile_picture', $employee->id) }}" width="100" height="100" alt="Profile Picture">
                @else
                    <span>No profile picture uploaded.</span>
                @endif
            </p>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back to Employees</a>
        </div>
    </div>
</div>
@endsection
