{{-- resources/views/companies/edit.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight text-center" style="font-size: 2.5rem;">
            {{ __('Edit Company') }}
        </h2>
    </x-slot>

    <div class="container py-6">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        

                        @if($errors->any())
                            <div class="alert alert-danger text-white">
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
                            <table class="table table-bordered text-center text-white">
                                <tbody>
                                    <tr>
                                        <td><label for="name" class="form-label">Company Name</label></td>
                                        <td><input type="text" name="name" class="form-control" value="{{ $company->name }}" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="email" class="form-label">Email</label></td>
                                        <td><input type="email" name="email" class="form-control" value="{{ $company->email }}"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="logo" class="form-label">Logo (min size: 100x100)</label></td>
                                        <td>
                                            @if($company->logo)
                                                <img src="{{ asset('storage/logos/' . $company->logo) }}" width="100" height="100" alt="Company Logo"><br><br>
                                            @endif
                                            <input type="file" name="logo" style="padding: 6px 0px 12px 60px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="website" class="form-label">Website</label></td>
                                        <td><input type="url" name="website" class="form-control" value="{{ $company->website }}"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary mt-3 btn-box">Update Company</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    /* Button Style */
    .btn-box {
        display: inline-block;
        padding: 12px 24px;
        background-color: #007bff;
        color: white;
        border: 2px solid #007bff;
        border-radius: 8px;
        font-size: 16px;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-box:hover {
        background-color: transparent;
        color: #007bff;
        border-color: #007bff;
        box-shadow: 0 4px 8px rgba(0, 123, 255, 0.2);
    }

    .btn-box:focus {
        outline: none;
        box-shadow: 0 0 0 4px rgba(0, 123, 255, 0.4);
    }

    /* Styling the table */
    .table {
        color: white;
    }

    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }

    .table-bordered {
        border-color: #ddd;
    }

    .table-bordered th, .table-bordered td {
        border-color: #ddd;
    }

    /* Text styling */
    .text-white {
        color: #ffffff !important;
    }

    .table a {
        color: #007bff;
        text-decoration: none;
    }

    .table a:hover {
        text-decoration: underline;
    }

    /* Styling for the 'Edit Company' header */
    .card-body h1 {
        font-size: 2.5rem; /* Larger size for Edit Company header */
        font-weight: bold;
    }

    /* Background for header */
    .card-body h1, .btn {
        background-color: #f1f5f8;
        color: #2d3748;
        padding: 10px;
        border-radius: 5px;
    }

    /* Styling the input fields */
    .form-control {
        color: #2d3748; /* Dark text color for inputs */
        background-color: #f7fafc; /* Light background for the input fields */
        border: 1px solid #ddd; /* Border for input fields */
    }

    .form-control:focus {
        color: #2d3748; /* Dark text color on focus */
        background-color: #fff; /* White background on focus */
        border-color: #007bff; /* Blue border on focus */
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
</style>
