<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Organisation;
use Illuminate\Http\Request;
use Exception;

class EmployeesController extends Controller
{

    # Added manually by Yuris
    public function __construct() {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the employees.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $org_id = auth()->user()->organisation_id;
        $is_super = auth()->user()->is_superuser;
        #dd($org_id);
        if ($is_super) {
            $employees = Employee::with('organisation')->paginate(25);
            $org_role = ''; #Managing all Organisations
        }
        else {
            $employees = Employee::with('organisation')->where('organisation_id', $org_id)->paginate(25);
            $org_role = auth()->user()->org_name();
        }
        #$employees = Employee::get();

        return view('employees.index', compact('employees'), ['org_role' => $org_role]);
    }

    /**
     * Show the form for creating a new employee.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Organisations = Organisation::pluck('Organisation_Name','Organisation_ID')->all();
        
        return view('employees.create', compact('Organisations'));
    }

    /**
     * Store a new employee in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Employee::create($data);

            return redirect()->route('employees.employee.index')
                ->with('success_message', trans('employees.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('employees.unexpected_error')]);
        }
    }

    /**
     * Display the specified employee.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $employee = Employee::with('organisation')->findOrFail($id);

        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified employee.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $Organisations = Organisation::pluck('Organisation_Name','Organisation_ID')->all();

        return view('employees.edit', compact('employee','Organisations'));
    }

    /**
     * Update the specified employee in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $employee = Employee::findOrFail($id);
            $employee->update($data);

            return redirect()->route('employees.employee.index')
                ->with('success_message', trans('employees.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('employees.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified employee from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $employee = Employee::findOrFail($id);
            $employee->delete();

            return redirect()->route('employees.employee.index')
                ->with('success_message', trans('employees.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('employees.unexpected_error')]);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'Employee_Name' => 'required|string|min:4|max:255',
            'Employee_Phone' => 'required|string|min:1|max:50',
            'Is_Active' => 'boolean|nullable',
            'Organisation_ID' => 'nullable', 
        ];

        
        $data = $request->validate($rules);


        $data['Is_Active'] = $request->has('Is_Active');


        return $data;
    }

}
