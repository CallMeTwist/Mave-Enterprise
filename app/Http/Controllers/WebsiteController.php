<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Gallery;
use App\Models\Team;
use App\Models\Testimonial;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * @return Factory|\Illuminate\View\View
     */
    public function home()
    {
        $testimonials = Testimonial::take(3)->get();
        $galleries = Gallery::where('image', true)->take(3)->get();
        return view('welcome')->with([
//            'teams' => $teams,
            'galleries' => $galleries,
            'testimonials' => $testimonials
        ]);;
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function about()
    {
        $teams = Team::all();
        $testimonials = Testimonial::all();
        return view('about')->with([
            'teams' => $teams,
            'testimonials' => $testimonials
        ]);
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function events()
    {
        $events = Event::where('past', false)->get();
        $past_events = Event::where('past', true)->get();
        return view('events.index')->with([
            'events' => $events,
            'past_events' => $past_events
        ]);
    }

    public function viewEvent($code)
    {
        try {
            $event = Event::where('code', $code)->first();
            if (!$event) {
                session()->flash('warning', 'The selected event does not exist');
                return redirect()->route('events');
            }
        } catch (Exception $exception) {
            session()->flash('danger', $exception->getMessage());
            return redirect()->back();
        }

        return view('events.view')->with('event', $event);
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function projects()
    {
        return view('projects');
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function faqs()
    {
        return view('faqs');
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function testimonials()
    {
        return view('testimonials');
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function volunteer()
    {
        return view('volunteer');
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function gallery()
    {
        $galleries = Gallery::where('image', true)->get();
        $videos = Gallery::where('image', false)->get();
        return view('gallery')->with([
            'galleries' => $galleries,
            'videos' => $videos
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function contact_send(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);

        $message = "$request->message\n\n".title_case($request->firstname .' '. $request->last_name)."\n$request->subject\n".strtolower($request->phone);

        // send email
        mail(config('app.email'), $request->email, $message);

        session()->flash('success', 'Message has been sent successfully.');
        return redirect()->back();
    }

    public function volunteer_send(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string'
        ]);

        $message = "$request->message\n\n".title_case($request->firstname .' '. $request->last_name)."\n".strtolower($request->phone);

        // send email
        mail(config('app.email'), $request->email, $message);

        session()->flash('success', 'Message has been sent successfully.');
        return redirect()->back();
    }
}
