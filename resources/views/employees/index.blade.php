{{-- resources/views/employees/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight text-center" style="font-size: 2.5rem;">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="container py-6 ml-auto" style="max-width: 1000px;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3 btn-box">Add New Employee</a>

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <table class="table table-bordered text-white">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Company</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employees as $employee)
                                <tr>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->company->name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>
                                        <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info btn-sm btn-box">View</a>
                                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm btn-box">Edit</a>
                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm btn-box" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $employees->links() }} <!-- Pagination links -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    /* Styling the table */
    table.table-bordered {
        border: 1px solid #ddd;
    }

    table th, table td {
        padding: 10px;
        text-align: center;
    }

    /* Adding custom padding and background color for the actions buttons */
    .btn {
        padding: 6px 12px;
    }

    .btn-sm {
        font-size: 0.875rem;
    }

    /* Adjusted pagination link style */
    .pagination {
        justify-content: center;
    }
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
</style>
