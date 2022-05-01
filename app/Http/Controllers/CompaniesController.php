<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CompaniesController extends BaseController
{
    protected string $name = 'companies';

    protected function model()
    {
        return Company::class;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'email|unique:companies',
        ]);

        if ($request->hasFile('logoFile')) {
            $path = $request->file('logoFile')->store('public/logo');
            
            $request->merge([
                'logo' => $path,
            ]);
        }
        return parent::store($request);
    }

    protected function doStore(array $data)
    {
        if (!empty($data['logoFile'])) {
            unset($data['logoFile']);
        }
       
        return parent::doStore($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'email|unique:companies,email,'.$id,
        ]);

        if ($request->hasFile('logoFile')) {
            $path = $request->file('logoFile')->store('public/logo');
            $request->merge([
                'logo' => $path,
            ]);
        }

        return parent::update($request, $id);
    }

    protected function doUpdate($id, array $data)
    {
        if (!empty($data['logoFile'])) {
            unset($data['logoFile']);
        }
       
        return parent::doUpdate($id, $data);
    }
}
