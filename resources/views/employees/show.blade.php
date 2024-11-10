{{-- resources/views/employees/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight text-center" style="font-size: 2.5rem;">
            {{ __('Employee Details') }}
        </h2>
    </x-slot>

    <div class="container py-6 ml-auto" style="max-width: 1000px;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3>{{ $employee->first_name }} {{ $employee->last_name }}</h3>

                        <p><strong class="text-white">Company:</strong> {{ $employee->company->name }}</p>
                        <p><strong class="text-white">Email:</strong> {{ $employee->email }}</p>
                        <p><strong class="text-white">Phone:</strong> {{ $employee->phone }}</p>

                        <p>
                            <strong class="text-white">Profile Picture:</strong><br>
                            @if($employee->profile_picture)
                                <img src="{{ route('employees.profile_picture', $employee->id) }}" width="100" height="100" alt="Profile Picture">
                            @else
                                <span class="text-white">No profile picture uploaded.</span>
                            @endif
                        </p>
<br><br><br>
                        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back to Employees</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .card-body {
        color: #f7fafc; /* Light text color */
    }

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

    .container h3,
    .container p {
        color: #f7fafc; /* Light color for text */
    }
</style>
