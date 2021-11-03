<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Organisation;
use App\Models\Worksite;
use Illuminate\Http\Request;
use Exception;

class WorksitesController extends Controller
{
    # Added manually by Yuris
    public function __construct() {
        $this->middleware(['auth']);
    }
    /*
        public function index()
    {
        $org_id = auth()->user()->organisation_id;
        $is_super = auth()->user()->is_superuser;

        if ($is_super) {
            $managers = Manager::with('organisation')->paginate(25);
        }
        else {
            $managers = Manager::with('organisation')->where('organisation_id', $org_id)->paginate(25);
        }        

        return view('managers.index', compact('managers'));
    }
    */

    /**
     * Display a listing of the worksites.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $org_id = auth()->user()->organisation_id;
        $is_super = auth()->user()->is_superuser;

        if ($is_super) {
            $worksites = Worksite::with('organisation')->paginate(25);
        }
        else {
            $worksites = Worksite::with('organisation')->where('organisation_id', $org_id)->paginate(25);
        }
        return view('worksites.index', compact('worksites'));
    }

    /**
     * Show the form for creating a new worksite.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Organisations = Organisation::pluck('Organisation_Name','Organisation_ID')->all();
        
        return view('worksites.create', compact('Organisations'));
    }

    /**
     * Store a new worksite in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Worksite::create($data);

            return redirect()->route('worksites.worksite.index')
                ->with('success_message', trans('worksites.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('worksites.unexpected_error')]);
        }
    }

    /**
     * Display the specified worksite.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $worksite = Worksite::with('organisation')->findOrFail($id);

        return view('worksites.show', compact('worksite'));
    }

    /**
     * Show the form for editing the specified worksite.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $worksite = Worksite::findOrFail($id);
        $Organisations = Organisation::pluck('Organisation_Name','Organisation_ID')->all();

        return view('worksites.edit', compact('worksite','Organisations'));
    }

    /**
     * Update the specified worksite in the storage.
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
            
            $worksite = Worksite::findOrFail($id);
            $worksite->update($data);

            return redirect()->route('worksites.worksite.index')
                ->with('success_message', trans('worksites.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('worksites.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified worksite from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $worksite = Worksite::findOrFail($id);
            $worksite->delete();

            return redirect()->route('worksites.worksite.index')
                ->with('success_message', trans('worksites.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('worksites.unexpected_error')]);
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
                'Worksite_Name' => 'required|string|min:1|max:64',
            'Worksite_Address' => 'required|string|min:1|max:255',
            'Is_Active' => 'boolean|nullable',
            'Organisation_ID' => 'nullable',
            'Date_From' => 'nullable|date_format:j/n/Y', 
        ];

        
        $data = $request->validate($rules);


        $data['Is_Active'] = $request->has('Is_Active');


        return $data;
    }

}
