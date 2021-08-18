<?php

namespace App\Http\Controllers;

use App\Models\Saved;
use App\Models\Recipe;
use App\Models\Recipelist;
use Illuminate\Http\Request;

class SavedController extends Controller
{
    public function store(Request $request) {
        $recipelist = Recipelist::where('id', $request['recipelist'])->firstOrFail();
        $recipe = Recipe::firstOrCreate(
            ['url' => $request['recipe_url']],
            [
                'url' => $request['recipe_url'], 
                'label' => $request['recipe_label']
            ]
        );

        return Saved::firstOrCreate(
            [
                'recipe_id' => $recipe['id'],
                'recipelist_id' => $recipelist['id']
            ]
        );
    }

    public function index(Request $request) {
        $saved = Saved::where('recipelist_id', $request['recipelist_id'])->get();
        $recipeIds = [];

        foreach($saved as $singlesaved) {
            array_push($recipeIds, $singlesaved['recipe_id']);
        }

        return Recipe::find($recipeIds);
    }

    public function destroy($id) {
        return Saved::where('id', $id)->delete();
    }
}
