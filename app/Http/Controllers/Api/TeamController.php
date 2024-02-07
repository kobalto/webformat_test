<?php

namespace App\Http\Controllers\Api;

use App\Models\Team;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Team::all();
    }

}
