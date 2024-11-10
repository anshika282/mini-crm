{{-- resources/views/employees/edit.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight text-center" style="font-size: 2.5rem;">
            {{ __('Edit Employee') }}
        </h2>
    </x-slot>

    <div class="container py-6 ml-auto" style="max-width: 1000px;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="first_name" class="text-white">First Name</label>
                                <input type="text" name="first_name" class="form-control" value="{{ $employee->first_name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="last_name" class="text-white">Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="{{ $employee->last_name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="company_id" class="text-white">Company</label>
                                <select name="company_id" class="form-control" required>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}" {{ $employee->company_id == $company->id ? 'selected' : '' }}>
                                            {{ $company->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="email" class="text-white">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $employee->email }}">
                            </div>

                            <div class="form-group">
                                <label for="phone" class="text-white">Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ $employee->phone }}">
                            </div>

                            <div class="form-group">
                                <label for="profile_picture" class="text-white">Profile Picture</label><br>
                                @if($employee->profile_picture)
                                    <img src="{{ asset('storage/app/private/private/profile_pictures/' . $employee->profile_picture) }}" width="100" height="100" alt="Profile Picture">
                                @endif
                                <input type="file" name="profile_picture" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Update Employee</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        color: #2d3748; /* Dark text color for inputs */
        background-color: #f7fafc; /* Light background for input fields */
        border: 1px solid #ddd; /* Border for input fields */
    }

    .form-control:focus {
        color: #2d3748;
        background-color: #fff;
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    /* Custom padding for file input field */
    .form-control[type="file"] {
        padding: 6px 12px;
    }

    /* Styling the button */
    .btn {
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

    .btn:hover {
        background-color: transparent;
        color: #007bff;
        border-color: #007bff;
        box-shadow: 0 4px 8px rgba(0, 123, 255, 0.2);
    }

    .btn:focus {
        outline: none;
        box-shadow: 0 0 0 4px rgba(0, 123, 255, 0.4);
    }

    label {
        color: #f7fafc; /* Light text color for labels */
    }
</style>
