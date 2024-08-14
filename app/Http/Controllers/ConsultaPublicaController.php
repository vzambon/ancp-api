<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultaPublicaSearchRequest;
use App\Models\ConsultaPublica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ConsultaPublicaController extends Controller
{
    public function index(ConsultaPublicaSearchRequest $request)
    {
        $pagination = $request->input('pagination');

        $select = $request->input('select');

        $validatedData = $request->except(['select', 'pagination', 'dt_nasc', 'dt_nasc_final']);

        $dtNascRange = $request->only(['dt_nasc', 'dt_nasc_final']);

        $query = ConsultaPublica::query();

        if ($select) {
            $query->select(explode(',', $select));
        }

        $searchTermKeys = [];
        foreach (array_keys($validatedData) as $searchKey) {
            $query->when($request->input($searchKey), function ($query, $value) use ($searchKey, &$searchTermKeys) {
                if (collect(ConsultaPublica::getSearchable())->contains($searchKey)) {
                    $searchTermKeys[] = $searchKey;

                    return $query;
                }

                return $query->where($searchKey, $value);
            });
        }

        if (! empty($dtNascRange['dt_nasc']) && ! empty($dtNascRange['dt_nasc_final'])) {
            $query->whereBetween('dt_nasc', [$dtNascRange['dt_nasc'], $dtNascRange['dt_nasc_final']]);
        }

        if (! empty($searchTermKeys)) {
            $query->searchByFields($searchTermKeys, collect($searchTermKeys)->map(fn ($el) => $request->input($el))->toArray());
        }

        if ($pagination['sortBy'] ?? false) {
            $desc = filter_var($pagination['descending'], FILTER_VALIDATE_BOOLEAN) ?? false;
            $query->orderBy($pagination['sortBy'], $desc ? 'desc' : 'asc');
        }

        $response = $query->paginate($pagination['rowsPerPage'] ?? null, ['*'], 'page', $pagination['page'] ?? null)->toArray();

        if ($pagination['sortBy'] ?? false) {
            $response['sortBy'] = $pagination['sortBy'] ?? 'id';
            $response['descending'] = filter_var($pagination['descending'] ?? 'false', FILTER_VALIDATE_BOOLEAN);
        }

        return $response;
    }

    public function show(ConsultaPublica $consultaPublica)
    {
        return $consultaPublica;
    }

    public function listSelect($select)
    {
        return Cache::remember('select_'.$select, 86400, fn() => 
            ConsultaPublica::select($select)
                ->distinct()
                ->pluck($select)
                ->filter(fn ($el) => $el != '')
                ->values()
        );
    }

    /**
     * listGadoBy
     *
     * Search by a specific field in Scout(MeiliSearch)
     *
     * @param  mixed  $request
     * @return void
     */
    public function listGadoBy(Request $request)
    {
        $request->validate([
            'field' => ['required', 'string', function ($attribute, $value, $fail) {
                collect(ConsultaPublica::getSearchable())->contains($value) || $fail('The '.$attribute.' is invalid.');
            }],
            'per_page' => 'integer|min:1|max:100',
        ]);

        $field = $request->input('field');
        $query = $request->input('query');

        return response()->json(ConsultaPublica::searchByFields([$field], [$query], false));
    }
}
