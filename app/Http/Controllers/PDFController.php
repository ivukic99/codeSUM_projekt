<?php
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use PDF;
use App\User;
  
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($user_id)
    {
        $user = User::find($user_id);
        $pdf = PDF::loadView('myPDF', compact('user'));
  
        return $pdf->download('certifikat.pdf');
    }
}