<?php

namespace App\Utilities;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ThrowException
{
    /**
     * @param $exception
     * @param null $request
     * @return RedirectResponse
     */
    public function throw(\Exception $exception, $request = null): RedirectResponse
    {
        \Log::critical($exception->getMessage() .': '. $exception->getFile() .': Line '. $exception->getLine());
        session()->flash('danger', $exception->getMessage());
        return isset($request) ? redirect()->back()->withInput($request->all()) : redirect()->back();
    }

    /**
     * @param $code
     * @return Application|Factory|View
     */
    public function abort($code)
    {
        return view('errors.'.$code);
    }
}
