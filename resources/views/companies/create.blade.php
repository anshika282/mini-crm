{{-- resources/views/companies/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Company</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Company Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="logo">Logo (min size: 100x100)</label>
            <input type="file" name="logo" class="form-control">
        </div>
        <div class="form-group">
            <label for="website">Website</label>
            <input type="url" name="website" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Save Company</button>
    </form>
</div>
@endsection
