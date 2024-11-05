{{-- resources/views/companies/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Company Details</h1>
    <div class="card">
        <div class="card-body">
            <h3>{{ $company->name }}</h3>
            <p><strong>Email:</strong> {{ $company->email }}</p>
            <p><strong>Website:</strong> <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></p>
            <p>
                <strong>Logo:</strong><br>
                @if($company->logo)
                    <img src="{{ asset('storage/logos/' . $company->logo) }}" width="100" height="100" alt="Company Logo">
                @else
                    <span>No logo uploaded.</span>
                @endif
            </p>
            <a href="{{ route('companies.index') }}" class="btn btn-secondary">Back to Companies</a>
        </div>
    </div>
</div>
@endsection
