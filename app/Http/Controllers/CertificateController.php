<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pdf = new PDF();
        $pdf::SetTitle('Certificate');
        // set default header data
        $pdf::SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf::setFooterData(array(0,64,0), array(0,64,128));
        $pdf::SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'VIGNANA BHARATHI INSTITUTE OF TECHNOLOGY','Aushapur(v), Ghstkesar(M), Medchal-Malkajgiri (Dist.) Telangana-501301,INDIA');
        $pdf::setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf::setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf::AddPage();
        $pdf::Image('C:/Users/Admin/Downloads/Deepali/bg.png', 40, 260, 15, 15, 'PNG');
        // $html = view('certificate');
        // $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::Output('certificate.pdf');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return /Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
