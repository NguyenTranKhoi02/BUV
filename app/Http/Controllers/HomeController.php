<?php

namespace App\Http\Controllers;

use App\Helpers\LoggerHelpers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $zone;
    protected $redisPipeLine;
    protected $news;

    public function __construct() {
    }

    public function index()
    {
        $data = [
        ];

        return view('home.index', $data);
    }

    public function stories()
    {
        $data = [
        ];

        return view('home.stories', $data);
    }
}
