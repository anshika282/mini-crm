{{-- resources/views/companies/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight text-center" style="font-size: 2.5rem;">
            {{ __('Company Details') }}
        </h2>
    </x-slot>

    <div class="container py-6 ml-auto" style="max-width: 800px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="text-center text-white mb-4" style="font-size: 2.5rem;">{{ $company->name }}</h3>
                        
                        <p class="text-white">
                            <strong>Email:</strong> {{ $company->email }}
                        </p>
                        <p class="text-white">
                            <strong>Website:</strong> <a href="{{ $company->website }}" target="_blank" class="text-info">{{ $company->website }}</a>
                        </p>
                        <p class="text-white">
                            <strong>Logo:</strong><br>
                            @if($company->logo)
                                <img src="{{ asset('storage/logos/' . $company->logo) }}" width="100" height="100" alt="Company Logo">
                            @else
                                <span>No logo uploaded.</span>
                            @endif
                        </p>

                        <div class="text-center">
                            <a href="{{ route('companies.index') }}" class="btn btn-secondary mt-3 btn-box">Back to Companies</a>
                        </div>
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
</style>
