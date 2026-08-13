<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\IdeaStatus;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ideas = Auth::user()
        ->ideas()
        ->when($request->status, fn($query, $status) => $query->where('status', $status))
        ->get();

        //get status coutns SELECT status, COUNT(*) as count FROM ideas WHERE user_id = ? GROUP BY status
        $statusCounts = Auth::user()->ideas()
            ->selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        $finalStatusCounts = collect(IdeaStatus::cases())
        ->mapWithKeys(fn($status) => 
        [
            $status->value => $statusCounts->get($status->value, 0)
        ])
        ->put('all', Auth::user()->ideas()->count());
            // dd($statusCounts);
        
        // return $finalStatusCounts;
        return view('idea.index', [
            'ideas' => $ideas,
            'statusCounts' => $finalStatusCounts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIdeaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIdeaRequest $request, Idea $idea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        //
    }
}
