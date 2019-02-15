<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Compamy;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CompamyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('index-company')->with([
            'company' => Compamy::latest('id')->paginate(10)
        ]);
    }

    public function indexData()
    {
        return view('datatables.index');
    }

    public function anyData()
    {
        return Datatables::of(User::query())->make(true);
    }


    public function indexCmp()
    {
        return view('datatables.cmp');
    }

    public function anyDatacmp()
    {
        return Datatables::of(Compamy::query())->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-company');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {



        $fileName = null;

        $max_id = rand(100, 10000);
        $forderName = str_random('5');
        if (isset($_SERVER['HTTPS']) &&
            ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
            isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
            $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
            $protocol = 'https://';
        } else {
            $protocol = 'http://';
        }

        $host = $_SERVER['SERVER_NAME'];

        if ($request->logo) {
            $fileName = $max_id . '_' . $request->logo->getClientOriginalName();
            $request->logo->move(storage_path("app/public/company/" . "{$forderName}_$max_id"), $fileName);

            $url = $protocol . $host . '/storage/company/' . $forderName . '_' . $max_id . '/' . $fileName;

        }

        Compamy::create([
            'name' => $request->name,
            'email' => $request->email ?? null,
            'logo' => $url ?? null,
            'link' => $request->logo ? "app/public/company/" . "{$forderName}_$max_id/{$fileName}" : null,
        ]);

        return redirect('company');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compamy $compamy
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('show-company')->with([
            'company' => Compamy::find($id)
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compamy $compamy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Compamy::find($id);

        return view('edit-company')->with([
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Compamy $compamy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fileName = null;
        $company = Compamy::where('id', $id)->first();

        $max_id = rand(100, 10000);
        $forderName = str_random('5');
        if (isset($_SERVER['HTTPS']) &&
            ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
            isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
            $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
            $protocol = 'https://';
        } else {
            $protocol = 'http://';
        }

        $host = $_SERVER['SERVER_NAME'];

        if ($request->logo) {
            if ($company->link) {
                $this->deleteIcon($company->link);
            }
            $fileName = $max_id . '_' . $request->logo->getClientOriginalName();
            $request->logo->move(storage_path("app/public/company/" . "{$forderName}_$max_id"), $fileName);

            $url = $protocol . $host . '/storage/company/' . $forderName . '_' . $max_id . '/' . $fileName;

        }


        $company->update([
            'name' => $request->name ?? $company->name,
            'email' => $request->email ?? $company->name,
            'logo' => $url ?? $company->logo,
            'link' => $request->logo ? "app/public/company/" . "{$forderName}_$max_id/{$fileName}" : null
        ]);

        return redirect('company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compamy $compamy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Compamy::find($id);
        if ($company->link) {
            $this->deleteIcon($company->link);
        }
        $company->delete();

        return redirect('company');

    }


    private function deleteIcon($link)
    {
        unlink(storage_path($link));
    }

}
