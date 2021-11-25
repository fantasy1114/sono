<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use App\Models\Organisation;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Hash;

/*
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
*/

class ManagersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	public function __construct()
	{
	    $this->middleware('auth');
	}
	
    /**
     * Display a listing of the managers.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $org_id = auth()->user()->organisation_id;
        $is_super = auth()->user()->is_superuser;
        if ($is_super) {
            $managers = Manager::with('organisation')->paginate(25);
            $org_role = ''; #Managing all Organisations
        }
        elseif ($org_id) {
            # Show Managers of the same org
            $managers = Manager::with('organisation')->where('organisation_id', $org_id)->paginate(25);
            #dd($managers);
        }
        else {
            # Show only your own record
            $managers = Manager::with('organisation')->where('id',auth()->user()->id)->paginate(25);
            #dd($managers);
        }

        return view('managers.index', compact('managers'));
    }

    /**
     * Show the form for creating a new manager.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {

        $Organisations = Organisation::pluck('Organisation_Name','Organisation_ID')->all();
        
        return view('managers.create', compact('Organisations'));
    }

    /**
     * Store a new manager in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        #dd($request);

        try {
            
            $data = $this->getData($request);
            
            # Added by Yuris: Convert new password to hash before storing the data
            $data['password'] = Hash::make($data['password']);
            #dd($data);
            
            Manager::create($data);

            return redirect()->route('managers.manager.index')
                ->with('success_message', trans('managers.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('managers.unexpected_error')]);
        }
    }

    /**
     * Display the specified manager.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $manager = Manager::with('organisation')->findOrFail($id);

        return view('managers.show', compact('manager'));
    }

    /**
     * Show the form for editing the specified manager.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $manager = Manager::findOrFail($id);
        $Organisations = Organisation::pluck('Organisation_Name','Organisation_ID')->all();

        return view('managers.edit', compact('manager','Organisations'));
    }

    /**
     * Update the specified manager in the storage.
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
            
            $manager = Manager::findOrFail($id);
            $manager->update($data);

            return redirect()->route('managers.manager.index')
                ->with('success_message', trans('managers.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('managers.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified manager from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $manager = Manager::findOrFail($id);
            $manager->delete();

            return redirect()->route('managers.manager.index')
                ->with('success_message', trans('managers.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('managers.unexpected_error')]);
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
            'name' => 'required|string|min:1|max:255',
            'email' => 'required',
            'organisation_id' => 'nullable',
            'password' => 'required',
            'phone' => 'nullable|string|min:0|max:255',
            'is_superuser' => 'boolean|nullable',
            'is_active' => 'boolean|nullable', 
        ];

        
        $data = $request->validate($rules);


        // $data['is_superuser'] = $request->has('is_superuser');
        // $data['is_active'] = $request->has('is_active');


        return $data;
    }

}
