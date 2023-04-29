<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function index()
    {
        return view('rooms.index', [
            'title' => 'Room',
            'slug' => 'rooms',
            'rooms' => Room::latest()->orderBy('id')->paginate(5),
            'departments' => Department::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        
        $roomForm = $request->validate([
            'department_id' => 'required',
            'name' => 'required|unique:rooms',
            'floor' => 'required',
        ]);

        Room::create($roomForm);
        return redirect('/rooms');
    }
}
