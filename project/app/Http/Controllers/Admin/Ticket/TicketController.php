<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\TicketRequest;
use App\Models\Ticket\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function newTickets()
    {
        $tickets = Ticket::where('seen', 0)->get();
        foreach ($tickets as $ticket) {
            $ticket->update(['seen' => 1]);
        }
        return view('admin.ticket.index', compact('tickets'));
    }

    public function openTickets()
    {
        $tickets = Ticket::where('status', 0)->get();
        return view('admin.ticket.index', compact('tickets'));
    }

    public function closeTickets()
    {
        $tickets = Ticket::where('status', 1)->get();
        return view('admin.ticket.index', compact('tickets'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('admin.ticket.index', compact('tickets'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {

        return view('admin.ticket.show',compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function answer(TicketRequest $request,Ticket $ticket)
    {
        $inputs=$request->all();
        $inputs['subject']=$ticket->subject;
        $inputs['description']=$request->description;
        $inputs['seen']=1;
        $inputs['reference_id']=$ticket->reference_id;
        $inputs['user_id']=3;
        $inputs['priority_id']=$ticket->priority_id;
        $inputs['category_id']=$ticket->category_id;
        $inputs['ticket_id']=$ticket->ticket_id;
        $inputs['status']=1;
        $comment=Ticket::create($inputs);
        return redirect()->route('admin.ticket.admin.ticket')->with('swal-success','پاسخ شما با موفقیت ثبت شد');

}


    public function change(Ticket $ticket)
    {
        $ticket->status == 1 ? $ticket->update(['status' => 0]) : $ticket->update(['status' => 1]);
        return redirect()->route('admin.ticket')->with('swal-success','وضعیت با موفقیت تغییر یافت.');
    }
}
