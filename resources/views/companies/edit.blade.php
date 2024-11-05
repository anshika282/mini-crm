{{-- resources/views/companies/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Company</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Company Name</label>
            <input type="text" name="name" class="form-control" value="{{ $company->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $company->email }}">
        </div>
        <div class="form-group">
            <label for="logo">Logo (min size: 100x100)</label><br>
            @if($company->logo)
                <img src="{{ asset('storage/logos/' . $company->logo) }}" width="100" height="100" alt="Company Logo"><br><br>
            @endif
            <input type="file" name="logo" class="form-control">
        </div>
        <div class="form-group">
            <label for="website">Website</label>
            <input type="url" name="website" class="form-control" value="{{ $company->website }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Company</button>
    </form>
</div>
@endsection
