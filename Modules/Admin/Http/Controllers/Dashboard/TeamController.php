<?php

namespace Modules\Admin\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * @var string
     */
    protected $uploadPath = 'uploads/teams/';

    /**
     * TeamController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:web');
        $this->path = 'admin::dashboard.team';
        $this->entity = new Team();
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return view($this->path)->withMembers($this->entity->all());
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'avatar' => 'required|mimes:png,jpg,jpeg'
        ]);

        try{
            $imageName = time().'.'.$request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path($this->uploadPath), $imageName);

            $this->entity->create([
                'name' => $request->name,
                'title' => $request->title,
                'avatar' => $this->uploadPath.$imageName,
                'code' => generate_unique_uuid()
            ]);
        }
        catch(Exception $exception){
            session()->flash('danger', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('success', 'A new team member has been added successfully');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'team' => 'required|string|exists:teams,code',
            'name' => 'required|string',
            'title' => 'required|string',
            'avatar' => 'nullable|mimes:png,jpg,jpeg',
        ]);

        try{
            $team = $this->entity->where('code', $request->team)->first();
            if(is_null($team)){
                session()->flash('danger', 'The selected team member does not exist');
                return redirect()->back()->withInput($request->all());
            }

            if($request->avatar){
                @unlink($team->avatar);
                $imageName = time().'.'.$request->avatar->getClientOriginalExtension();
                $request->avatar->move(public_path($this->uploadPath), $imageName);
            }

            $team->update([
                'name' => $request->name,
                'title' => $request->title,
                'avatar' => $request->avatar ? $this->uploadPath.$imageName : $team->avatar
            ]);
        }
        catch(Exception $exception){
            session()->flash('danger', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('info', 'Team member has been updated successfully');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $request->validate([
            'team' => 'required|string|exists:teams,code'
        ]);

        try{
            $team = $this->entity->where('code', $request->team)->first();
            if(is_null($team)){
                session()->flash('danger', 'The selected team member does not exist');
                return redirect()->back();
            }

            @unlink($team->avatar);
            $team->delete();
        }
        catch(Exception $exception){
            session()->flash('danger', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('danger', 'Team member has been deleted successfully');
        return redirect()->back();
    }
}
