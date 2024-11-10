{{-- resources/views/companies/index.blade.php --}}
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight text-center" style="font-size: 2.5rem;">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="container py-6">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-body">
                       
                        <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3 btn-box">Add New Company</a>

                        @if(session('success'))
                            <div class="alert alert-success text-white">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-bordered text-center text-white">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Logo</th>
                                    <th>Website</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($companies as $company)
                                <tr>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>
                                        @if($company->logo)
                                            <img src="{{ asset('storage/logos/' . $company->logo) }}" width="50" height="50" alt="Logo">
                                        @endif
                                    </td>
                                    <td><a href="{{ $company->website }}" target="_blank" class="text-white">{{ $company->website }}</a></td>
                                    <td>
                                        <a href="{{ route('companies.show', $company->id) }}" class="btn btn-info btn-sm btn-box">View</a>
                                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning btn-sm btn-box">Edit</a>
                                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm btn-box" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $companies->links() }} <!-- Pagination links -->
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

    table.table-bordered {
        border: 1px solid #ddd;
    }

    table th, table td {
        padding: 10px;
        text-align: center;
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

