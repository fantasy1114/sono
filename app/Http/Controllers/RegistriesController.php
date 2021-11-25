<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Key;
use App\Models\Registry;
use Illuminate\Http\Request;
use Exception;

# ALL EDITING FUNCTIONS HAVE BEEN DISABLED

class RegistriesController extends Controller
{
    # Added manually by Yuris
    public function __construct() {
        $this->middleware(['auth']);
    }
    
    /**
     * Display a listing of the registries.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $org_id = auth()->user()->organisation_id;
        $is_super = auth()->user()->is_superuser;

        if ($is_super) {
            # Show all keys
            $registries = Registry::sortable(['Action_Time' => 'desc'])->paginate(10000);
            $org_role = ''; #Managing all Organisations
        }
        elseif ($org_id) {
            # Records or keys that belongs to any employee
            #$employees = Employee::where('organisation_id',$org_id)->pluck('employee_id');
            #$keys = Key::whereIn('employee_id',$employees)->pluck('key_name');
            #$registries = Registry::whereIn('key_name', $keys)->sortable()->paginate(25);
            # Changed to adopt to the view instead of table
            $registries = Registry::where('organisation_id',$org_id)->sortable(['Action_Time' => 'desc'])->paginate(10000);
            $org_role = auth()->user()->org_name();
        }
        else {
            # None
            $registries = collect([]);
        }

        return view('registries.index', compact('registries'));
    }

    /**
     * Show the form for creating a new registry.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        //return view('registries.create');
        return null;
    }

    /**
     * Store a new registry in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        /*
        try {
            
            $data = $this->getData($request);
            
            Registry::create($data);

            return redirect()->route('registries.registry.index')
                ->with('success_message', trans('registries.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('registries.unexpected_error')]);
        }
        */
        return null;
    }

    /**
     * Display the specified registry.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $registry = Registry::findOrFail($id);

        return view('registries.show', compact('registry'));
    }

    /**
     * Show the form for editing the specified registry.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        /*
        $registry = Registry::findOrFail($id);
        

        return view('registries.edit', compact('registry'));
        */
        return null;
    }

    /**
     * Update the specified registry in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        /*
        try {
            
            $data = $this->getData($request);
            
            $registry = Registry::findOrFail($id);
            $registry->update($data);

            return redirect()->route('registries.registry.index')
                ->with('success_message', trans('registries.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('registries.unexpected_error')]);
        } 
        */
        return null;       
    }

    /**
     * Remove the specified registry from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        /*
        try {
            $registry = Registry::findOrFail($id);
            $registry->delete();

            return redirect()->route('registries.registry.index')
                ->with('success_message', trans('registries.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('registries.unexpected_error')]);
        }
        */
        return null;
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
                'Key_Name' => 'required|string|min:1|max:32',
            'Action' => 'required|numeric|min:-2147483648|max:2147483647',
            'Action_Time' => 'required|date_format:j/n/Y g:i A',
            'Battery_State' => 'required|numeric|min:-99999999.99|max:99999999.99', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
