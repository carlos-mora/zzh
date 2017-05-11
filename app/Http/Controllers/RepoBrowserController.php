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
     * Generate CSV file for the repo list.
     *
     * @return \Illuminate\Http\Response
     */
    public function csv(GithubRepo $repo)
    {
        $headers = [
                'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
            ,   'Content-type'        => 'text/csv'
            ,   'Content-Disposition' => 'attachment; filename=repo.csv'
        ];

        $projects = $repo->getAll();

        $callback = function() use ($projects)
        {
            $file = fopen('php://output', 'w');

            fputcsv($file, ['Nombre', 'Propietario', 'Estrellas', 'Forks', 'Issues'], ';');

            foreach ($projects as $project) {
                fputcsv($file, [$project->name, $project->owner->login, $project->watchers, $project->forks, $project->open_issues_count], ';');
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

}
