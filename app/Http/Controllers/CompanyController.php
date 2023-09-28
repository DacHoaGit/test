<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function store(CompanyRequest $request)
    {
        $name = $request->input('name');
        $total = Company::count();

        $data = [
            'name' => $name,
            'count' => $total + 1
        ];

        Company::create($data);

        return response()->json([
            'success' => true
        ], 200);
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return response()->json([
            'success' => true
        ], 200);
    }
}
