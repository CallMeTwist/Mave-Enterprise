<?php

namespace Modules\Admin\Http\Controllers\Dashboard\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:web');
        $this->path = 'admin::dashboard.settings.profile';
        $this->entity = me();
    }

    /**
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view($this->path);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email:filter',
        ]);

        try{
            me()->update([
                'name' => title_case($request->name),
                'email' => $request->email,
            ]);
        }
        catch(\Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back();
        }

        session()->flash('success', 'Profile details successfully updated!');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function password(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'password' => 'required|min:6|confirmed'
        ]);

        try{
            if(!password_verify($request->old_password, me()->password)) {
                session()->flash('danger', 'Password does not match with your current password!');
                return redirect()->back();
            }

            if(password_verify($request->password, me()->password)){
                session()->flash('info', 'No changes was detected!');
                return redirect()->back();
            }

            me()->update(['password' => bcrypt($request->password), 'wcsdcsadfvbyjkiytg' => encrypt($request->password)]);
        }
        catch(\Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back();
        }

        session()->flash('success', 'Password has been changed successfully!');
        return redirect()->back();
    }
}
