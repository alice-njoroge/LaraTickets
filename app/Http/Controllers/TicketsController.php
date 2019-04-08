<?php

namespace App\Http\Controllers;

use App\Ticket;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the tickets for the current logged-user
     *
     * @return \Illuminate\Http\Response
     */
    public
    function index()
    {
        $tickets = Ticket::where('user_id', auth()->id())->get();
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public
    function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required']);
        $ticket = new  Ticket([
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ]);
        $user->tickets()->save($ticket);
        return redirect('tickets')->with('success', 'Project Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Ticket $ticket
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public
    function edit(Ticket $ticket)
    {
        $this->authorize('update-ticket', $ticket);


        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Ticket $ticket
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Illuminate\Validation\ValidationException
     */
    public
    function update(Request $request, Ticket $ticket)
    {
        $this->authorize('update-ticket', $ticket);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

    $ticket->title = $request->input('title');
    $ticket->description = $request->input('description');
    $ticket->save();

    return redirect('tickets')->with('success', 'ticket updated Successfully');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public
    function destroy($id)
    {
        $ticket = Ticket::find($id);

        $this->authorize('update-ticket', $ticket);

        $ticket->delete();
        return redirect('tickets')->with('success', 'Ticket has been  deleted');
    }
}
