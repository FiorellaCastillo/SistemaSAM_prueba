<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use App\Models\Company;

class PdfController extends Controller
{
    public function export_users(){
        
        $users = User::join('roles', 'users.rol_id', '=', 'roles.id')
        ->select('users.*','roles.description')
        ->get();
        
        $pdf = PDF::loadView('users.PDFusers', compact('users'));
        return $pdf->download('Users.pdf'); 
    }

    public function export_companies(){
        
        $companies = Company::all(); 
        
        $pdf = PDF::loadView('companies.PDFcompanies', compact('companies'));
        return $pdf->download('Companies.pdf'); 
    }
}
