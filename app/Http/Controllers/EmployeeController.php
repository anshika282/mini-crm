<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $employees = Employee::paginate(10);

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $companies = Company::all();

        return view('employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:15',
            'profile_picture' => 'nullable|image',
        ]);

        $employee = new Employee($request->all());
        $directory = 'profile_pictures'; // Remove the 'private' part here
        if (! Storage::disk('private')->exists($directory)) {
            Storage::disk('private')->makeDirectory($directory);
        }
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store($directory, 'private');
            $employee->profile_picture = basename($path);
        }

        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $employee = Employee::find($id);

        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $companies = Company::all();
        $employee = Employee::find($id);

        return view('employees.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $employee = Employee::find($id);
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:15',
            'profile_picture' => 'nullable|image',
        ]);

        $employee->fill($request->all());
        $directory = 'profile_pictures'; // Remove the 'private' part here

        // Ensure the 'profile_pictures' directory exists within 'private'
        if (! Storage::disk('private')->exists($directory)) {
            Storage::disk('private')->makeDirectory($directory);
        }
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store($directory, 'private');
            $employee->profile_picture = basename($path);
        }

        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }

    public function showProfilePicture(Employee $employee)
    {
        if (auth()->check()) {

            if ($employee->profile_picture) {
                $filePath = 'profile_pictures/'.$employee->profile_picture;

                if (Storage::disk('private')->exists($filePath)) {
                    return Storage::disk('private')->response($filePath);
                } else {
                    return response()->json(['error' => 'File not found'], 404);
                }
            }
        }

        return abort(404, 'Profile picture not found.');
    }
}
