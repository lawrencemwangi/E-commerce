<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function liveSearch(Request $request)
    {
        $query = $request->input('q');
        $model = $request->input('model');

        $results = collect();

        $map = [
            'user' => [\App\Models\User::class, ['name', 'email']],
            'collection' => [\App\Models\collection::class, ['title', 'description']],
            'invoice' => [\App\Models\quotation::class, ['invoice_number', 'client_name']],
        ];

        if ($query && $model && isset($map[$model])) {
            [$modelClass, $fields] = $map[$model];

            $results = $modelClass::where(function ($q) use ($query, $fields) {
                foreach ($fields as $field) {
                    $q->orWhere($field, 'like', "%{$query}%");
                }
            })->limit(10)->get();
        }

        return response()->json(['results' => $results]);
    }
}
