<?php

namespace App\Http\Controllers\Panel\Dashboard\Settings;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    /**
     * AccountsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:web');
        $this->entity = new BankAccount();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function save(Request $request)
    {
        $request->validate([
            'bank' => 'required|string',
            'name' => 'required|string',
            'number' => 'required|numeric',
            'logo' => 'nullable|mimes:png,jpg,jpeg|max:2048'
        ]);

        try{
            $imageName = time().'.'.$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('/uploads/banks/'), $imageName);

            $this->entity->create([
                'name' => $request->name,
                'number' => $request->number,
                'bank' => $request->bank,
                'logo' => '/uploads/banks/'.$imageName,
                'code' => generate_unique_uuid()
            ]);
        }
        catch(Exception $exception){
            session()->flash('danger', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('success', 'A new account has been added successfully');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'account' => 'required|string',
            'bank' => 'required|string',
            'name' => 'required|string',
            'number' => 'required|numeric',
            'logo' => 'nullable|mimes:png,jpg,jpeg|max:2048'
        ]);

        try{
            $account = $this->entity->where('code', $request->account)->first();
            if(is_null($account)){
                session()->flash('danger', 'The selected account does not exist');
                return redirect()->back()->withInput($request->all());
            }

            if($request->logo){
                @unlink($account->logo);

                $imageName = time().'.'.$request->logo->getClientOriginalExtension();
                $request->logo->move(public_path('/uploads/banks/'), $imageName);
            }

            $account->update([
                'name' => $request->name,
                'number' => $request->number,
                'bank' => $request->bank,
                'logo' => $request->logo ? '/uploads/banks/'.$imageName : $account->logo
            ]);
        }
        catch(Exception $exception){
            session()->flash('danger', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('info', 'A new team member has been updated successfully');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $request->validate([
            'account' => 'required|string'
        ]);

        try{
            $account = $this->entity->where('code', $request->account)->first();
            if(is_null($account)){
                session()->flash('danger', 'The selected account does not exist');
                return redirect()->back();
            }

            @unlink($account->logo);
            $account->delete();
        }
        catch(Exception $exception){
            session()->flash('danger', $exception->getMessage());
            return redirect()->back();
        }

        session()->flash('danger', 'Account number has been deleted successfully');
        return redirect()->back();
    }
}
