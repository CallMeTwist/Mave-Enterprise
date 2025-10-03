<?php

namespace App\Http\Controllers\Panel\Dashboard\Settings;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\Setting;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * SettingsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:web');
        $this->path = 'panel.dashboard.settings';
        $this->entity = new Setting();
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view($this->path.'.settings')->with([
            'accounts' => BankAccount::all()
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function save(Request $request)
    {
        $request->validate([
            'phone' => 'nullable|string',
            'help_line' => 'nullable|string',
            'email' => 'nullable|string',
            'currency' => 'required|string',
            'facebook' => 'nullable|string',
            'twitter' => 'nullable|string',
            'instagram' => 'nullable|string',
            'youtube' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'telegram' => 'nullable|string'
        ]);

        try{
            $this->entity->updateOrCreate(
                ['id' => 1],
                [
                    'phone' => $request->phone,
                    'help_line' => $request->help_line,
                    'email' => $request->email,
                    'address' => $request->address,
                    'currency' => $request->currency,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'instagram' => $request->instagram,
                    'youtube' => $request->youtube,
                    'linkedin' => $request->linkedin,
                    'telegram' => $request->telegram,
                    'tiktok' => $request->tiktok
                ]
            );
        }
        catch(Exception $exception){
            session()->flash('danger', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('success', 'Settings has been updated successfully');
        return redirect()->back();
    }
}
