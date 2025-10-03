<?php

namespace App\Http\Controllers\Panel\Dashboard;

use Exception;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    /**
     * @var string
     */
    protected $uploadPath = 'uploads/testimonials/';

    /**
     * TestimonialsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:web');
        $this->path = 'panel.dashboard.testimonials';
        $this->entity = new Testimonial();
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view($this->path)->withTestimonials($this->entity->all());
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'title' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,png|max:2000',
            'message' => 'required|string',
        ]);

        try{
            if($request->image) {
                $imageName = 'testimonial-' . time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path($this->uploadPath), $imageName);
            }

            $this->entity->create([
                'name' => $request->name,
                'title' => $request->title,
                'image' => $request->image ? $this->uploadPath.$imageName : null,
                'message' => $request->message,
                'code' => generate_unique_uuid()
            ]);
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('success', 'Testimonial message has been added successfully!');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'testimonial' => 'required|string',
            'name' => 'required|string',
            'title' => 'nullable|string',
            'image' => 'nullable|image|max:2000',
            'message' => 'required|string'
        ]);

        try{
            $testimonial = $this->entity->where('code', $request->testimonial)->first();
            if(!$testimonial){
                session()->flash('warning', 'The selected testimonial does not exist.');
                return redirect()->back()->withInput($request->all());
            }

            if($request->image){
                @unlink($testimonial->image);
                $imageName = 'testimonial-'.time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path($this->uploadPath), $imageName);
            }

            $testimonial->update([
                'name' => $request->name,
                'title' => $request->title,
                'image' => $request->image ? $this->uploadPath.$imageName : $testimonial->image,
                'message' => $request->message,
            ]);
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('info', 'Testimonial message has been updated successfully!');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $request->validate([
            'testimonial' => 'required|string'
        ]);

        try{
            $testimonial = $this->entity->where('code', $request->testimonial)->first();
            if(!$testimonial){
                session()->flash('warning', 'The selected testimonial does not exist.');
                return redirect()->back()->withInput($request->all());
            }

            @unlink($testimonial->image);
            $testimonial->forceDelete();
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('danger', 'Testimonial has been deleted successfully!');
        return redirect()->back();
    }
}
