<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function store(Request $request)
    {
        // Validate and process the form data
        $validated = $request->validate([
            'store' => 'required|string',
            'operator' => 'required|string',
            'percent' => 'required|numeric',
            'alert_type' => 'required|string',
            'alert' => 'sometimes|accepted',
        ]);

        // Save the data to the database or perform other actions

        // Redirect or inform the user of successful submission
        return back()->with('success', 'Alert has been set!');
    }
}
