<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Key;
use Illuminate\Http\Request;
use Exception;

class KeysController extends Controller
{

    /**
     * Display a listing of the keys.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $keys = Key::with('employee')->paginate(25);

        return view('keys.index', compact('keys'));
    }

    /**
     * Show the form for creating a new key.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Employees = Employee::pluck('Employee_Name','Employee_ID')->all();
        
        return view('keys.create', compact('Employees'));
    }

    /**
     * Store a new key in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Key::create($data);

            return redirect()->route('keys.key.index')
                ->with('success_message', trans('keys.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('keys.unexpected_error')]);
        }
    }

    /**
     * Display the specified key.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $key = Key::with('employee')->findOrFail($id);

        return view('keys.show', compact('key'));
    }

    /**
     * Show the form for editing the specified key.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $key = Key::findOrFail($id);
        $Employees = Employee::pluck('Employee_Name','Employee_ID')->all();

        return view('keys.edit', compact('key','Employees'));
    }

    /**
     * Update the specified key in the storage.
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
            
            $key = Key::findOrFail($id);
            $key->update($data);

            return redirect()->route('keys.key.index')
                ->with('success_message', trans('keys.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('keys.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified key from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $key = Key::findOrFail($id);
            $key->delete();

            return redirect()->route('keys.key.index')
                ->with('success_message', trans('keys.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('keys.unexpected_error')]);
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
                'Key_Name' => 'required|string|min:1|max:32',
            'Employee_ID' => 'nullable',
            'Is_Active' => 'boolean|nullable', 
        ];

        
        $data = $request->validate($rules);


        $data['Is_Active'] = $request->has('Is_Active');


        return $data;
    }

}
