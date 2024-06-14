<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        return view ('index');
    }

    public function confirm(Request $request) {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'areaNumber', 'localNumber', 'subscNumber', 'address', 'building', 'category', 'content']);
        return view('confirm', compact('contact'));
    }
}
