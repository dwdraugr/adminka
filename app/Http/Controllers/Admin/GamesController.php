<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Game\BulkDestroyGame;
use App\Http\Requests\Admin\Game\DestroyGame;
use App\Http\Requests\Admin\Game\IndexGame;
use App\Http\Requests\Admin\Game\StoreGame;
use App\Http\Requests\Admin\Game\UpdateGame;
use App\Models\Game;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class GamesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexGame $request
     * @return array|Factory|View
     */
    public function index(IndexGame $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Game::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'is_active', 'name', 'owner_id', 'start_player_attempts', 'start_player_hp'],

            // set columns to searchIn
            ['id', 'name']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.game.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.game.create');

        return view('admin.game.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreGame $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreGame $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Game
        $game = Game::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/games'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/games');
    }

    /**
     * Display the specified resource.
     *
     * @param Game $game
     * @throws AuthorizationException
     * @return void
     */
    public function show(Game $game)
    {
        $this->authorize('admin.game.show', $game);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Game $game
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Game $game)
    {
        $this->authorize('admin.game.edit', $game);


        return view('admin.game.edit', [
            'game' => $game,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGame $request
     * @param Game $game
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateGame $request, Game $game)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Game
        $game->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/games'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/games');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyGame $request
     * @param Game $game
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyGame $request, Game $game)
    {
        $game->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyGame $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyGame $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Game::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
