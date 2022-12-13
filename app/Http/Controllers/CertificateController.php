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
        $pdf::SetFont('', '', 10, '', false);
        $pdf::Image('C:/Users/Admin/Downloads/student-png.png', 160, 25, 25, 25, 'PNG');
        $pdf::MultiCell(0, 0, '<span><b>UNIVERSITY :</b> JNTUH, HYDERABAD</span>', 0, 'L', 0, 0, '10', '25', true, 0, true);
        $pdf::MultiCell(0, 0, '<span><b>PC No. :</b> 0PC1D540119P6</span>', 0, 'L', 0, 0, '10', '30', true, 0, true);
        $pdf::MultiCell(0, 0, '<span><b>HT No. :</b> 19P61D5401</span>', 0, 'L', 0, 0, '10', '35', true, 0, true);
        $pdf::MultiCell(0, 0, '<span><b>COLLEGE CODE :</b> P6</span>', 0, 'L', 0, 0, '85', '25', true, 0, true);
        $pdf::MultiCell(0, 0, '<span><b>SERIAL No. :</b> 202200054</span>', 0, 'L', 0, 0, '85', '30', true, 0, true);
        $style1Da = array(
            'position' => '',
            'align' => 'C',
            'stretch' => true,
            'fitwidth' => true,
            'cellfitalign' => '',
            'border' => false,
            'hpadding' => 'auto',
            'vpadding' => 'auto',
            'fgcolor' => array(0,0,0),
            'bgcolor' => false, //array(255,255,255),
            'text' => true,
            'font' => 'helvetica',
            'fontsize' => 9,
            'stretchtext' => 7
        );
        $barcodex = 125;
        $barcodey = 55;
        $barcodeWidth = 56;
        $barodeHeight = 13;
        $pdf::write1DBarcode('0123456', 'C39', $barcodex, $barcodey, $barcodeWidth, $barodeHeight, 0.4, $style1Da, 'N');
        $pdf::write2DBarcode('www.tcpdf.org', 'QRCODE,Q', 10, 50, 20, 20, $style1Da, 'N');
        $pdf::SetFont('', '', 12, '', false);

        $pdf::MultiCell(0, 0, '<span>This is to certify that Mr./Ms. ADDENKI AMANI</span>', 0, 'L', 0, 0, '18', '84', true, 0, true);
        $pdf::MultiCell(0, 0, '<span>Son / Daughter of ADDENKI RAMANA</span>', 0, 'L', 0, 0, '18', '94', true, 0, true);
        $pdf::MultiCell(0, 0, '<span>Passed M.Tech. POWER ELECTRONICS & ELECTRICAL DRIVES degree</span>', 0, 'L', 0, 0, '18', '104', true, 0, true);
        $pdf::MultiCell(0, 0, '<span>examination of this college (Autonomous) affiliated to JNTUH, Hyderabad,</span>', 0, 'L', 0, 0, '18', '114', true, 0, true);
        $pdf::MultiCell(0, 0, '<span>held in AUGUST,2021 and that he / she was placed in', 0, 'L', 0, 0, '18', '124', true, 0, true);
        $pdf::MultiCell(0, 0, '<span>FIRST CLASS WITH DISTINCTION</span>', 0, 'C', 0, 0, '18', '134', true, 0, true);
        $pdf::MultiCell(0, 0, '<span>He / She has satisfied all the requirements for the award of the degree.</span>', 0, 'L', 0, 0, '18', '144', true, 0, true);
        $style = array('width' => 0.5, 'cap' => 'round', 'join' => 'round', 'dash' => 0, 'color' => array(0, 0, 0));
        $pdf::Line(72, 89,160, 89, $style);  // x   y   x-till y-till
        $pdf::Line(55, 100,160, 100, $style);  // x   y   x-till y-till
        $pdf::Line(35, 110, 145, 110, $style);  // x   y   x-till y-till
        $pdf::Line(33, 129, 60, 129, $style);  // x   y   x-till y-till
        $pdf::Line(18, 139, 160, 139, $style);  // x   y   x-till y-till
        $pdf::MultiCell(0, 0, '<span><b>Place :</b> Hyderabad</span>', 0, 'L', 0, 0, '18', '160', true, 0, true);
        $pdf::MultiCell(0, 0, '<span><b>Date :</b> 03-06-2022</span>', 0, 'L', 0, 0, '18', '164', true, 0, true);
        $stylered = array('width' => 0.75, 'cap' => 'round', 'join' => 'round', 'dash' => 0, 'color' => array(231,80,157));
        $pdf::Line(75, 174, 103, 174, $stylered);  // x   y   x-till y-till
        $pdf::Line(105, 174, 140, 174, $stylered);  // x   y   x-till y-till
        $pdf::Line(145, 174, 180, 174, $stylered);  // x   y   x-till y-till
        $pdf::MultiCell(0, 0, '<span>VERIFIED BY</span>', 0, 'L', 0, 0, '75', '175', true, 0, true);
        $pdf::MultiCell(0, 0, '<span>CONTROLLER OF<br> EXAMINATION</span>', 0, 'L', 0, 0, '105', '175', true, 0, true);
        $pdf::MultiCell(0, 0, '<span>PRINCIPAL</span>', 0, 'L', 0, 0, '145', '175', true, 0, true);
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
