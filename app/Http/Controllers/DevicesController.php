<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Worksite;
use Illuminate\Http\Request;
use Exception;

/* Customized by Yuris *
 *
 */

class DevicesController extends Controller
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
     * Display a listing of the devices.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $org_id = auth()->user()->organisation_id;
        $is_super = auth()->user()->is_superuser;

        if ($is_super) {
            $devices = Device::with('worksite')->paginate(25);
        }
        else {
            # Only superusers are allowed to edit devices
            $devices = collect([]);
        }

        return view('devices.index', compact('devices'));
    }

    /**
     * Show the form for creating a new device.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Worksites = Worksite::pluck('Worksite_Name','Worksite_ID')->all();
        
        return view('devices.create', compact('Worksites'));
    }

    /**
     * Store a new device in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Device::create($data);

            return redirect()->route('devices.device.index')
                ->with('success_message', trans('devices.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('devices.unexpected_error')]);
        }
    }

    /**
     * Display the specified device.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $device = Device::with('worksite')->findOrFail($id);

        return view('devices.show', compact('device'));
    }

    /**
     * Show the form for editing the specified device.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $device = Device::findOrFail($id);
        $Worksites = Worksite::pluck('Worksite_Name','Worksite_ID')->all();

        return view('devices.edit', compact('device','Worksites'));
    }

    /**
     * Update the specified device in the storage.
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
            
            $device = Device::findOrFail($id);
            $device->update($data);

            return redirect()->route('devices.device.index')
                ->with('success_message', trans('devices.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('devices.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified device from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $device = Device::findOrFail($id);
            $device->delete();

            return redirect()->route('devices.device.index')
                ->with('success_message', trans('devices.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('devices.unexpected_error')]);
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
                'Tracker_Code' => 'required|string|min:15|max:25',
            'Worksite_ID' => 'nullable',
            'Is_Active' => 'boolean|nullable', 
        ];

        
        $data = $request->validate($rules);


        $data['Is_Active'] = $request->has('Is_Active');


        return $data;
    }

}
