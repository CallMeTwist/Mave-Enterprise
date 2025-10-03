<?php

namespace App\Http\Controllers\Panel\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:web');
        $this->path = 'panel.dashboard.';
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        return view($this->path.'index');
    }

    /**
     * @return Factory|View
     */
    public function website()
    {
        return view($this->path.'website.index');
    }
}
