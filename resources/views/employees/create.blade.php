{{-- resources/views/employees/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight text-center" style="font-size: 2.5rem;">
            {{ __('Add New Employee') }}
        </h2>
    </x-slot>

    <div class="container py-6 ml-auto" style="max-width: 800px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="text-center text-white mb-4" style="font-size: 2.5rem;">Add New Employee</h3>

                        @if($errors->any())
                            <div class="alert alert-danger text-white">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <table class="table table-bordered text-center text-white">
                                <tbody>
                                    <tr>
                                        <td><label for="first_name" class="form-label">First Name</label></td>
                                        <td><input type="text" name="first_name" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="last_name" class="form-label">Last Name</label></td>
                                        <td><input type="text" name="last_name" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="company_id" class="form-label">Company</label></td>
                                        <td>
                                            <select name="company_id" class="form-control" required>
                                                @foreach($companies as $company)
                                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="email" class="form-label">Email</label></td>
                                        <td><input type="email" name="email" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="phone" class="form-label">Phone</label></td>
                                        <td><input type="text" name="phone" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="profile_picture" class="form-label">Profile Picture</label></td>
                                        <td><input type="file" name="profile_picture" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary mt-3 btn-box">Save Employee</button>
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

    /* Styling the textboxes (input fields) */
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

    /* Custom padding for file input field */
    .form-control[type="file"] {
        padding: 6px 12px;
    }

</style>
