<?php

namespace Modules\Admin\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    /**
     * @var string
     */
    protected $uploadPath = 'uploads/brands/';

    /**
     * PartnersController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:web');
        $this->path = 'admin::dashboard.website.brands';
        $this->entity = new Partner();
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return view($this->path)->withBrands($this->entity->get());
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function save(Request $request)
    {
        $request->validate([
            'logo' => 'required|mimes:png,jpg,jpeg|max:2048',
            'name' => 'required|string'
        ]);

        try{
            $logoName = 'logo-'.time().'.'.$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path($this->uploadPath), $logoName);

            $this->entity->create([
                'logo' => $this->uploadPath.$logoName,
                'name' => $request->name,
                'code' => generate_unique_uuid()
            ]);
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('success', 'A new brand has been added successfully!');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'brand' => 'required|string',
            'logo' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'name' => 'required|string'
        ]);

        try{
            $brand = $this->entity->where('code', $request->brand)->first();
            if(!$brand){
                session()->flash('warning', 'The selected brand does not exist.');
                return redirect()->back()->withInput($request->all());
            }

            if($request->logo) {
                @unlink($brand->logo);
                $logoName = 'logo-' . time() . '.' . $request->logo->getClientOriginalExtension();
                $request->logo->move(public_path($this->uploadPath), $logoName);
            }else{
                $logoName = $brand->icon;
            }

            $brand->update([
                'logo' => $request->logo ? $logoName : $this->uploadPath.$logoName,
                'name' => $request->name
            ]);
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('info', 'Brand has been updated successfully!');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $request->validate([
            'brand' => 'required|string',
        ]);

        try{
            $brand = $this->entity->where('code', $request->brand)->first();
            if(!$brand){
                session()->flash('warning', 'The selected brand does not exist.');
                return redirect()->back()->withInput($request->all());
            }

            @unlink($brand->logo);
            $brand->delete();
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('danger', 'Brand has been deleted successfully!');
        return redirect()->back();
    }
}
