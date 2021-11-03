<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use App\Models\Organisation;
use Illuminate\Http\Request;
use Exception;

class ManagersController extends Controller
{

    /**
     * Display a listing of the managers.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $managers = Manager::with('organisation')->paginate(25);

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
        try {
            
            $data = $this->getData($request);
            
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
                'Manager_Name' => 'required|string|min:4|max:255',
            'Manager_Email' => 'required|string|min:4|max:64',
            'Manager_Phone' => 'required|string|min:4|max:64',
            'Is_Active' => 'boolean',
            'Organisation_ID' => 'nullable',
            'Manager_Password' => 'required|string|min:4|max:128', 
        ];

        
        $data = $request->validate($rules);


        $data['Is_Active'] = $request->has('Is_Active');


        return $data;
    }

}
