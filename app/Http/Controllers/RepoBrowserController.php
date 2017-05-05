<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\GithubRepo;

class RepoBrowserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GithubRepo $repo)
    {
        $projects = $repo->getAll();
        return view( 'repo.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function csv(GithubRepo $repo)
    {
        $projects = $repo->getAll();
        return response()
            ->download($pathToFile, $name, $headers)
            ->header('Content-Type', 'text/csv')
            ->header('Cache-Control','max-age=0, must-revalidate, no-cache, no-store, private');
            ->deleteFileAfterSend(true);
        return response(view('repo.csv', compact('projects')))
        
    }

}
