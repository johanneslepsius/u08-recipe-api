<?php

namespace App\Http\Controllers;

use App\Models\Saved;
use App\Models\Recipelist;
use Illuminate\Http\Request;

class SavedController extends Controller
{
    public function store(Request $request) {
        $user = $request->user();
        $recipelist = Recipelist::where('name', $request['listname'])->firstOrFail();

        return Saved::create([
            'user_id' => $user['id'],
            'recipelist_id' => $recipelist['id'],
        ]);
    }
}
