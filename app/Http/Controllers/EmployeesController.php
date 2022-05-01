<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeesController extends BaseController
{
    protected string $name = 'employees';

    protected function model()
    {
        return Employee::class;
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'first_name' => 'required|max:255',
            'company_id' => 'required|integer',
            'email' => 'email|unique:employees',
        ]);
        return parent::store($request);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'first_name' => 'required|max:255',
            'company_id' => 'required|integer',
            'email' => 'email|unique:employees,email,'.$id,
        ]);
        return parent::update($request, $id);
    }
}
