<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeCreateRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Company;
use App\Models\Employee;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(): View 
    {
        return view('employees.index');
    }

    /**
     * Initializes the employees creation form view
     *
     * @return View
     */
    public function create(): View 
    {
        
        $companies = Company::all(['id', 'name']);

        return view('employees.create', [
            'companies' => $companies
        ]);
    }

    /**
     * Stores the created employee
     *
     * @param EmployeeCreateRequest $request
     * @return RedirectResponse
     */
    public function store(EmployeeCreateRequest $request): RedirectResponse
    {

        $request->validated();

        $employee = Employee::create([
            'first_name'  => $request->get('first_name'),
            'last_name'   => $request->get('last_name'),
            'email'       => $request->get('email', ''),
            'phone'       => $request->get('phone', ''),
            'company_id'  => $request->get('company_id', '')
        ]);
        
        $employee->save();

        return redirect('employees')->with('status', 'employee-created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Initializes the update form view
     *
     * @param Employee $employee
     * @return View
     */
    public function edit(Employee $employee): View
    {
        
        $companies = Company::all(['id', 'name']);

        return view('employees.update', [
            'employee'  => $employee,
            'companies' => $companies
        ]);
    }

    /**
     * Updates the employee row
     *
     * @param EmployeeUpdateRequest $request
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function update(EmployeeUpdateRequest $request, Employee $employee): RedirectResponse 
    {

        $request->validated();

        try {
            

            $employee->update([
                'first_name'  => $request->get('first_name'),
                'last_name'   => $request->get('last_name'),
                'email'       => $request->get('email', ''),
                'phone'       => $request->get('phone', ''),
                'company_id'  => $request->get('company_id', '')
            ]);

            $employee->save();

            return redirect('employees')->with('status', 'employee-updated');
        }
        catch (Exception $e) {
            return redirect('employees')->with('status', 'employee-not-found');
        }

    }

    /**
     * Deletes the requested employee row
     *
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function destroy(Employee $employee): RedirectResponse 
    {
        try {
            $employee->delete();

            return redirect('employees')->with('status', 'employee-deleted');
        }
        catch (Exception $e) {
            return redirect('employees')->with('status', 'employee-not-found');
        }
    }

}
