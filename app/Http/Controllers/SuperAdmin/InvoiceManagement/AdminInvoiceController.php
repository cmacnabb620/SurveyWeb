<?php

namespace App\Http\Controllers\SuperAdmin\InvoiceManagement;
use App\Http\Controllers\Controller;


class AdminInvoiceController extends Controller {


    public function index(){
        
        return view('Admin.Invoices.admin_invoice');
    }

    public function viewInvoice(){
        
        return view('Admin.Invoices.view_invoice');
    }


}






