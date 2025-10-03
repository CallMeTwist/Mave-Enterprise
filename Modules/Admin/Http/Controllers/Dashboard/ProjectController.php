<?php

namespace Modules\Admin\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * @var string
     */
    protected $uploadPath = 'uploads/projects/';

    /**
     * ProjectController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:web');
        $this->path = 'admin::dashboard.projects';
        $this->entity = new Project();
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return view($this->path)->withProjects($this->entity->all());
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'client' => 'required|string',
            'pricing' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'location' => 'required|string',
            'map' => 'required|string',
        ]);

        try{
            $imageName = 'flyer-'.time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path($this->uploadPath), $imageName);

            $this->entity->create([
                'name' => $request->name,
                'client' => $request->client,
                'pricing' => $request->pricing,
                'image' => $this->uploadPath.$imageName,
                'location' => $request->location,
                'map' => $request->map,
                'code' => generate_unique_uuid()
            ]);
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('success', 'A new project has been added successfully!');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'project' => 'required|string',
            'name' => 'required|string',
            'client' => 'required|string',
            'pricing' => 'required|string',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'location' => 'required|string',
            'map' => 'required|string',
        ]);

        try{
            $project = $this->entity->where('code', $request->project)->first();
            if(is_null($project)){
                session()->flash('danger', 'The selected project does not exist');
                return redirect()->back()->withInput($request->all());
            }

            if($request->image) {
                @unlink($project->image);
                $imageName = 'flyer-' . time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path($this->uploadPath), $imageName);
            }else{
                $imageName = $project->image;
            }

            $project->update([
                'name' => $request->name,
                'client' => $request->client,
                'pricing' => $request->pricing,
                'image' => $request->image ? $this->uploadPath.$imageName : $imageName,
                'location' => $request->location,
                'map' => $request->map
            ]);
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('info', 'Project has been updated successfully');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $request->validate([
            'project' => 'required|string'
        ]);

        try{
            $project = $this->entity->where('code', $request->project)->first();
            if(is_null($project)){
                session()->flash('danger', 'The selected project does not exist');
                return redirect()->back();
            }

            @unlink($project->image);
            $project->delete();
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back();
        }

        session()->flash('danger', 'Project has been deleted successfully!');
        return redirect()->back();
    }
}
