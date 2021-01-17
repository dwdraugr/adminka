<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Gamer\BulkDestroyGamer;
use App\Http\Requests\Admin\Gamer\DestroyGamer;
use App\Http\Requests\Admin\Gamer\IndexGamer;
use App\Http\Requests\Admin\Gamer\StoreGamer;
use App\Http\Requests\Admin\Gamer\UpdateGamer;
use App\Models\Gamer;
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

class GamersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexGamer $request
     * @return array|Factory|View
     */
    public function index(IndexGamer $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Gamer::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['donate_value', 'energy', 'id', 'in_game_value', 'nickname'],

            // set columns to searchIn
            ['id', 'nickname']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.gamer.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.gamer.create');

        return view('admin.gamer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreGamer $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreGamer $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Gamer
        $gamer = Gamer::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/gamers'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/gamers');
    }

    /**
     * Display the specified resource.
     *
     * @param Gamer $gamer
     * @throws AuthorizationException
     * @return void
     */
    public function show(Gamer $gamer)
    {
        $this->authorize('admin.gamer.show', $gamer);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Gamer $gamer
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Gamer $gamer)
    {
        $this->authorize('admin.gamer.edit', $gamer);


        return view('admin.gamer.edit', [
            'gamer' => $gamer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGamer $request
     * @param Gamer $gamer
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateGamer $request, Gamer $gamer)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Gamer
        $gamer->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/gamers'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/gamers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyGamer $request
     * @param Gamer $gamer
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyGamer $request, Gamer $gamer)
    {
        $gamer->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyGamer $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyGamer $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Gamer::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
