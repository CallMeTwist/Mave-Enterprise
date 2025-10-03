<?php

namespace App\Http\Controllers\Panel\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * @var string
     */
    protected $uploadPath = 'uploads/events/';

    /**
     * EventsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:web');
        $this->path = 'panel.dashboard.events';
        $this->entity = new Event();
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return view($this->path)->withEvents($this->entity->all());
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'intro' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'venue' => 'required|string',
            'date' => 'required|date'
        ]);

        try{
            $imageName = 'flyer-'.time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path($this->uploadPath), $imageName);

            $this->entity->create([
                'title' => $request->title,
                'intro' => $request->intro,
                'description' => $request->description,
                'image' => $this->uploadPath.$imageName,
                'venue' => $request->venue,
                'date' => $request->date,
                'code' => generate_unique_uuid()
            ]);
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('success', 'A new Event has been added successfully!');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'event' => 'required|string',
            'title' => 'required|string',
            'intro' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'venue' => 'required|string',
            'date' => 'required|date',
            'past' => 'sometimes|boolean'
        ]);

        try{
            $event = $this->entity->where('code', $request->event)->first();
            if(is_null($event)){
                session()->flash('danger', 'The selected event does not exist');
                return redirect()->back()->withInput($request->all());
            }

            if($request->image) {
                @unlink($event->image);
                $imageName = 'flyer-' . time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path($this->uploadPath), $imageName);
            }else{
                $imageName = $event->image;
            }

            $event->update([
                'title' => $request->title,
                'intro' => $request->intro,
                'description' => $request->description,
                'image' => $request->image ? $this->uploadPath.$imageName : $imageName,
                'venue' => $request->venue,
                'date' => $request->date,
                'past' => $request->past ?? false,
            ]);
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('info', 'Event has been updated successfully');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $request->validate([
            'event' => 'required|string'
        ]);

        try{
            $event = $this->entity->where('code', $request->event)->first();
            if(is_null($event)){
                session()->flash('danger', 'The selected event does not exist');
                return redirect()->back();
            }

            @unlink($event->image);
            $event->delete();
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back();
        }

        session()->flash('danger', 'Event has been deleted successfully!');
        return redirect()->back();
    }
}
