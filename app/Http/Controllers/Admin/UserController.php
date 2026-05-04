<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    const globalTitle = 'Users';
    const routeTitle  = 'users';

    public function index()
    {
        $title = self::globalTitle;
        $route = self::routeTitle;
        $data  = [
            'title' => $title,
            'route' => $route,
            'users' => User::all(),
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
            'title' => $title,
            'route' => $route,
        ];
        return view('main.' . $route . '.' . $route . '-input', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $title = self::globalTitle . ' Create';
        $route = self::routeTitle;
        $data  = $request->validated();

        $slugService = new SlugService();

        $data['slug'] = $slugService->createSlug(
            User::class,
            $data['user_name']
        );

        User::create($data);
        return Redirect::route($route . '.index')->with('success', $route . '-stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $title = self::globalTitle;
        $route = self::routeTitle;
        $data  = [
            'title' => $title,
            'route' => $route,
            'user'  => $user,
        ];
        return view('main.' . $route . '.' . $route . '-input', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $title = self::globalTitle;
        $route = self::routeTitle;
        $data  = $request->validated();

        $user->update($data);
        return Redirect::route($route . '.index')->with('success', $route . '-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->forcedelete();
        return Redirect::route(self::routeTitle . '.index')->with('success', self::routeTitle . '-deleted');
    }
}
