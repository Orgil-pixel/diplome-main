<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CRUD extends Controller
{
    /**
     * @var string
     */
    protected $rules;

    /**
     * @var string
     */
    protected $model;

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, $this->rules);
    }

    /**
     * Request parameters.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function requestParams(Request $request)
    {
        return $request->all();
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Search input
        $search = $request->query('search');
        // Pagination page length
        $rowsPerPage = (int)$request->query('rowsPerPage', 25);
        // Sort column
        $sortBy = Str::snake($request->query('sortBy', 'created_at'));
        // Sort direction
        $sortOrder = $request->query('sortOrder', 'desc');

        if ($search) {
            $query = $this->model::search($search);
        } else {
            $query = $this->model::query();
        }

        // $query->orderBy($sortBy, $sortOrder);

        if ($rowsPerPage === -1) {
            $rowsPerPage = $query->count();
        }

        return response()->json($query->paginate($rowsPerPage));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $data = new $this->model;
        $params = $this->requestParams($request);

        $data->fill($params);
        $data->save();

        return response()->json([
            'data' => $data,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $data = $this->model::findOrFail($id);

        return response()->json([
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();

        $data = $this->model::findOrFail($id);
        $params = $this->requestParams($request);

        $data->fill($params);
        $data->save();

        return response()->json([
            'data' => $data,
        ]);
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
        ]);

        $items = $this->model::whereIn('id', $request->input('ids'))
            ->get();

        foreach ($items as $item) {
            $item->delete();
        }

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->model::findOrFail($id);
        $data->delete();

        return response()->json([
            'success' => true,
        ]);
    }

}

