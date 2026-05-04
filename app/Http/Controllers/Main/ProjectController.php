<?php
namespace App\Http\Controllers\Main;

use App\Enums\ProjectStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Main\ProjectRequest;
use App\Models\Project;
use App\Services\SlugService;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    const globalTitle = 'Projects';
    const routeTitle  = 'projects';

    public function index()
    {
        $title = self::globalTitle;
        $route = self::routeTitle;
        $data  = [
            'title'    => $title,
            'route'    => $route,
            'projects' => Project::all(),
        ];
        return view('main.' . $route . '.' . $route, $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = self::globalTitle . ' Create';
        $route = self::routeTitle;
        $data  = [
            'title'          => $title,
            'route'          => $route,
            'project_status' => ProjectStatus::cases(),
        ];
        return view('main.' . $route . '.' . $route . '-input', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $title = self::globalTitle . ' Create';
        $route = self::routeTitle;
        $data  = $request->validated();

        $slugService = new SlugService();

        $data['slug'] = $slugService->createSlug(
            Project::class,
            $data['project_name']
        );

        Project::create($data);
        return Redirect::route($route . '.index')->with('success', $route . '-stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $title = self::globalTitle;
        $route = self::routeTitle;
        $data  = [
            'title'          => $title,
            'route'          => $route,
            'project'        => $project,
            'project_status' => ProjectStatus::cases(),
        ];
        return view('main.' . $route . '.' . $route . '-input', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $title = self::globalTitle;
        $route = self::routeTitle;
        $data  = $request->validated();

        if ($project->project_name !== $data['project_name']) {
            $slugService  = new SlugService();
            $data['slug'] = $slugService->createSlug(
                Project::class,
                $data['project_name']
            );
        }

        $project->update($data);
        return Redirect::route($route . '.index')->with('success', $route . '-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->forcedelete();
        return Redirect::route(self::routeTitle . '.index')->with('success', self::routeTitle . '-deleted');
    }
}
