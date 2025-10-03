<?php

namespace App\Http\Controllers\Panel\Dashboard;

use Exception;
use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    /**
     * FaqsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:web');
        $this->path = 'panel.dashboard.faqs';
        $this->entity = new Faq();
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return view($this->path)->withFaqs($this->entity->all());
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function save(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        try{
            $this->entity->create([
                'question' => $request->question,
                'answer' => $request->answer,
                'code' => generate_unique_uuid()
            ]);
        }
        catch (Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('success', 'Question was successfully created!');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'faq' => 'required|string',
            'question' => 'required|string',
            'answer' => 'required|string'
        ]);

        try{
            $faq = $this->entity->where('code', $request->faq)->first();
            if(!$faq){
                session()->flash('danger', 'The selected question does not exist');
                return redirect()->back()->withInput($request->all());
            }

            $faq->update([
                'question' => $request->question,
                'answer' => $request->answer
            ]);
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('info', 'Question was successfully updated');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $request->validate([
            'faq' => 'required|string'
        ]);

        try{
            $faq = $this->entity->where('code', $request->faq)->first();
            if(!$faq){
                session()->flash('danger', 'The selected question does not exist');
                return redirect()->back();
            }

            $faq->delete();
        }
        catch(Exception $exception){
            session()->flash('warning', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        session()->flash('danger', 'Question was successfully deleted');
        return redirect()->back();
    }
}
