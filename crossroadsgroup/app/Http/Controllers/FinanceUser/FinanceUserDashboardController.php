<?php

namespace App\Http\Controllers\FinanceUser;
use App\Http\Controllers\Controller;


class FinanceUserDashboardController extends Controller {


    public function index(){
        
        return view('FinanceUser.finance_user_dashboard');
    }


}






