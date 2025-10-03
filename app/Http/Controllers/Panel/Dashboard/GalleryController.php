<?php

namespace App\Http\Controllers\Panel\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * @var string
     */
    protected $uploadPath = 'uploads/gallery/';

    /**
     * TeamController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:web');
        $this->path = 'panel.dashboard.gallery';
        $this->entity = new Gallery();
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return view($this->path)->withGallerys($this->entity->all());
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function save(Request $request)
    {
        $request->validate([
            'link' => 'nullable|string',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ]);

        try{
            if ($request->image){
                $imageName = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path($this->uploadPath), $imageName);

                $link = $this->uploadPath.$imageName;
            }

            if($request->link){
                $link = $request->link;
            }

            $this->entity->create([
                'link' => $link,
                'image' => $request->has('image'),
                'code' => generate_unique_uuid()
            ]);
        }
        catch(Exception $exception){
            session()->flash('danger', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('success', 'A new gallery file has been added successfully');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'gallery' => 'required|string|exists:gallery,code',
            'link' => 'required|string',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048'
        ]);

        try{
            $gallery = $this->entity->where('code', $request->gallery)->first();
            if(is_null($gallery)){
                session()->flash('danger', 'The selected file does not exist');
                return redirect()->back()->withInput($request->all());
            }

            if($request->image){
                @unlink($gallery->avatar);
                $imageName = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path($this->uploadPath), $imageName);
            }

            $gallery->update([
                'link' => $request->link,
                'image' => $request->image ? $this->uploadPath.$imageName : $gallery->image
            ]);
        }
        catch(Exception $exception){
            session()->flash('danger', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('info', 'Gallery File has been updated successfully');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $request->validate([
            'gallery' => 'required|string|exists:gallery,code'
        ]);

        try{
            $gallery = $this->entity->where('code', $request->gallery)->first();
            if(is_null($gallery)){
                session()->flash('danger', 'The selected gallery file does not exist');
                return redirect()->back();
            }

            @unlink($gallery->image);
            $gallery->delete();
        }
        catch(Exception $exception){
            session()->flash('danger', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('danger', 'Gallery file has been deleted successfully');
        return redirect()->back();
    }
}
