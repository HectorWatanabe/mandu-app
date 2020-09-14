<?php

namespace App\Http\Controllers;

use App\Models\Division;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use ManduApp\Helper;
use ManduApp\Support\Controller\DivisionControllerSupport as supportFunctions;

class DivisionController extends Controller
{
    use supportFunctions;

    public function index(Request $request)
    {
        $request->validate([
            'pagination_count' => Rule::in([
                Helper::PAGE_RESULTS_SHORT, Helper::PAGE_RESULTS_MEDIUM, Helper::PAGE_RESULTS_HIGH
            ])
        ]);

        $search           = $request->input('search') ?? Helper::STRING_EMPTY;
        $pagination_count = $request->input('pagination_count') ?? Helper::PAGE_RESULTS_SHORT;

        $divisions = Division::query();

        if ($search != Helper::STRING_EMPTY) {
            $divisions = $divisions->where('name', 'like', "%{$search}%");
        }

        $divisions = $divisions->orderBy('id', 'desc')->paginate($pagination_count);

        return response()->json([
            'divisions' => $divisions,
            'search' => $search
        ], 200);
    }

    public function store(Request $request)
    {
        $arrayValidation         = $this->validationForm();
        $arrayValidation['name'] = ['required', 'max:45', 'unique:divisions,name'];

        $request->validate($arrayValidation);

        $division = new Division();
        $division->setAttribute('name', $request->input('name'));
        $division->setAttribute('upper_division', $request->input('upper_division'));
        $division->setAttribute('collaborators', $request->input('collaborators'));
        $division->setAttribute('ambassador', $request->input('ambassador'));
        $division->save();

        return response()->json([
            'message' => 'division created'
        ], 200);
    }

    public function show(Division $division)
    {
        return response()->json([
            'division' => $division
        ], 200);
    }

    public function update(Request $request, Division $division)
    {
        $arrayValidation         = $this->validationForm();
        $arrayValidation['name'] = ['required', 'max:45', 'unique:divisions,name,' . $division->getAttribute('id')];

        $request->validate($arrayValidation);

        $division->setAttribute('name', $request->input('name'));
        $division->setAttribute('upper_division', $request->input('upper_division'));
        $division->setAttribute('collaborators', $request->input('collaborators'));
        $division->setAttribute('ambassador', $request->input('ambassador'));
        $division->save();

        return response()->json([
            'message' => 'division updated'
        ], 200);
    }

    public function destroy(Division $division)
    {
        $division->delete();

        return response()->json([
            'message' => 'division deleted'
        ], 200);
    }

}
