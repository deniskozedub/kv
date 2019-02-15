<?php

namespace App\Http\Controllers;

use App\Models\Compamy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LteController extends Controller
{
    public function __construct()
    {
        Auth::attempt(['email' => 'admin@admin.com', 'password' => 'password']);
    }

    public function index()
    {
        return view('lte')->with([
            'company' => Compamy::latest('id')->paginate(10)
        ]);
    }


    public function store(Request $request)
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
        return redirect()->back();
    }

    public function update(Request $request)
    {

        $company = Compamy::find($request->cat_id);


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

        return redirect()->back();
    }

    private function deleteIcon($link)
    {
        unlink(storage_path($link));
    }


    public function destroy(Request $request)
    {
         Compamy::find($request->cat_id)
            ->delete();

        return redirect()->back();
    }
}
