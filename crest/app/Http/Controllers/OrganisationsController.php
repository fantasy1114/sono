<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Organisation;
use Illuminate\Http\Request;
use Exception;

class OrganisationsController extends Controller
{

    /**
     * Display a listing of the organisations.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $organisations = Organisation::paginate(25);

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
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
