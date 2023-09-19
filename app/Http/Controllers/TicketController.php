<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\Shows;
use App\Models\User;
use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller{

    public function bookticket($id, $show_id){

        $movie = Movies::find($id);
        $show = Shows::find($show_id);
        $user = Auth::user();

        return view('/bookTickets', compact('movie', 'user', 'show'));
    }

    public function addticket(Request $request, $id, $m_id, $show_id){

        $ticket = new Tickets();
        $movie = Movies::find($m_id);
        $show = Shows::find($show_id);

        $remainingseats = $show->movie_seats;
        $seats = $request->input('no_of_seats');

        $newseats = $remainingseats - $seats;

        $ticket->user_id = $id;
        $ticket->movie_id = $m_id;
        $ticket->no_of_seats = $seats;
        $ticket->movie_seats = $newseats;
        $ticket->show_id = $show_id;
        $ticket->total_bill = $request->input('totalbill');

        $show->movie_seats = $newseats;

        $show->update();

        $ticket->save();



        return redirect('/home')->with('status', 'Ticket Added Successfully');
    }
}

?>
