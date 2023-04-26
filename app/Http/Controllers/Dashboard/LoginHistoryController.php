<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoginHistory;


class LoginHistoryController extends Controller
{

    public function index()
    {
        return view('dashboard.loginHistory.index');
    }

    public function data()
    {

        $data = LoginHistory::query();

        $result = DataTables()->eloquent($data)
        ->toJson();
        return $result;
    }

}
