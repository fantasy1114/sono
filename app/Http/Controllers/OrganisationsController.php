<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Organisation;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrganisationsController extends Controller
{
    # Added manually by Yuris
    public function __construct() {
        $this->middleware(['auth']);
    }

    
    /**
     * Display a listing of the organisations.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $org_id = auth()->user()->organisation_id;
        $is_super = auth()->user()->is_superuser;

        if ($is_super) {
            $organisations = Organisation::paginate(25);
        }
        else {
            # Handling disabled per Mantis#12 -- Managers who are not superusers will not see their own org
            #$organisations = Organisation::where('organisation_id', $org_id)->paginate(25);
            $organisations = collect([]);
        }
        return view('organisations.index', compact('organisations'));
    }

    /**
     * Show the form for creating a new organisation.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('organisations.create');
    }

    /**
     * Store a new organisation in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);


            Organisation::create($data);

            return redirect()->route('organisations.organisation.index')
                ->with('success_message', trans('organisations.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('organisations.unexpected_error')]);
        }
    }

    /**
     * Display the specified organisation.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $organisation = Organisation::findOrFail($id);

        return view('organisations.show', compact('organisation'));
    }

    /**
     * Show the form for editing the specified organisation.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $organisation = Organisation::findOrFail($id);
        

        return view('organisations.edit', compact('organisation'));
    }

    /**
     * Update the specified organisation in the storage.
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

            #dd($data);
            
            $organisation = Organisation::findOrFail($id);
            $organisation->update($data);

            return redirect()->route('organisations.organisation.index')
                ->with('success_message', trans('organisations.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('organisations.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified organisation from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $organisation = Organisation::findOrFail($id);
            $organisation->delete();

            return redirect()->route('organisations.organisation.index')
                ->with('success_message', trans('organisations.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('organisations.unexpected_error')]);
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
                'Organisation_Name' => 'required|string|min:1|max:64',
                #'Login_Token' => 'required|string|min:1|max:255',  
        ];

        
        $data = $request->validate($rules);
        $token = $request->input('Login_Token');
        #dd($token);

        #Added by Yuris: Generate Login Token if not present
        if (!isset($token)) {
            $data['Login_Token'] = Str::random(32); # Crypt::encrypt($data['Organisation_Name']);
        }
        #dd($data);
                    
        return $data;
    }

}
