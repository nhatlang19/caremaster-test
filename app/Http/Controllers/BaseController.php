<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

abstract class BaseController extends Controller
{
    protected $model;

    protected string $name;

    protected function model() {}

    public function __construct()
    {
        $this->model = app()->make(
            $this->model()
        );
    }

    public function index()
    {
        $data[$this->name] = $this->model->orderBy('id','desc')->paginate(10);
        return view($this->name .'.index', $data);
    }

    public function create()
    {
        return view($this->name . '.create');
    }

    public function store(Request $request)
    {
        $this->doStore($request->all());

        return redirect()->route($this->name . '.index')
        ->with('success', Str::ucfirst(Str::singular($this->name)) . ' has been created successfully.');
    }

    protected function doStore(array $data)
    {
        return $this->model->create($data);
    }

    public function show($id)
    {
        $name = Str::singular($this->name);
        $data[$name] = $this->model->where('id', $id)->first();
        return view($this->name . '.show', [$name => $data[$name]]);
    } 

    public function edit($id)
    {
        $name = Str::singular($this->name);
        $data[$name] = $this->model->where('id', $id)->first();
        return view($this->name . '.edit', [$name => $data[$name]]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token'], $data['_method']);

        $this->doUpdate($id, $data);
        
        return redirect()->route($this->name . '.index')
        ->with('success', Str::ucfirst(Str::singular($this->name)) . ' Has Been updated successfully');
    }

    protected function doUpdate($id, array $data)
    {
        return $this->model->where('id', $id)->update($data);
    }
   
    public function destroy($id)
    {
        $obj = $this->model->where('id', $id)->first();
        $obj->delete();
        return redirect()->route($this->name . '.index')
        ->with('success', Str::ucfirst(Str::singular($this->name)) . ' has been deleted successfully');
    }
}
