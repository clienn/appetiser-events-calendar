<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \Response::json(Event::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event = new Event();
        $event->description = request('description');
        $event->days = request('days');
        $event->start_date = request('start_date');
        $event->end_date = request('end_date');
        $event->save();

        return \Response::json($event);
    }
}
