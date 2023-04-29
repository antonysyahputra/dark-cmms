<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaintenanceController extends Controller
{
    public function index()
    {
        return view('maintenances.index', [
            "title" => "Maintenances",
            'slug' => 'maintenances',
            'inventories' => Inventory::latest()->get(),
            "maintenances" => Maintenance::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $maintenanceForm = $request->validate([
            'inventory_id' => 'required',
            'issue' => 'required',
        ]);
        $maintenanceForm['user_id'] = auth()->user()->id;
        $maintenanceForm['status'] = 1;
        Maintenance::create($maintenanceForm);
        return redirect('/maintenances')->with('message', 'Your request was sent successfully');
    }
}
