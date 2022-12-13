<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class imtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pdfBig = new PDF('P', 'mm', array('210', '297'), true, 'UTF-8', false);
        // $pdfBig::SetCreator(PDF_CREATOR); //ErrorException Use of undefined constant PDF_CREATOR - assumed 'PDF_CREATOR' (this will throw an Error in a future version of PHP)
        $pdfBig::SetAuthor('TCPDF');
        $pdfBig::SetTitle('Certificate');
        $pdfBig::SetSubject('');

        // remove default header/footer
        $pdfBig::setPrintHeader(false);
        $pdfBig::setPrintFooter(false);
        $pdfBig::SetAutoPageBreak(false, 0);


        // add spot colors
        $pdfBig::AddSpotColor('Spot Red', 30, 100, 90, 10);        // For Invisible
        $pdfBig::AddSpotColor('Spot Dark Green', 100, 50, 80, 45); // clear text on bottom red and in clear text logo
        $pdfBig::AddSpotColor('Spot Light Yellow', 0, 0, 100, 0);

        // $arial = TCPDF_FONTS::addTTFfont(public_path().'\\'.$subdomain[0].'\backend\canvas\fonts\Arial.TTF', 'TrueTypeUnicode', '', 96);
        //set background image
		$template_img_generate = 'C:/Users/Admin/Downloads/Deepali/bg.png';
        $pdfBig::AddPage();
        $pdfBig::SetFont('', '', 10, '', false);
        $pdfBig::SetFont('aealarabiya', '', 10);
        $pdfBig::Image($template_img_generate, 0, 0, '210', '297', "PNG", '', 'R', true);
        // $pdfBig::SetXY(10, 111);
        //$pdfBig::Cell(190, 0, 'He/She has been placed in '.$division.' Division.', 0, false, 'C');

		$pdfBig::MultiCell(0, 0, '<span style="font-size:10;">MAGACA<br>Name	الاسم</span>', 0, 'L', 0, 0, '15', '111', true, 0, true);
        $pdfBig::MultiCell(0, 0, '<span style="font-size:10;">TAARIIKHDA DHALASHADA<br>	Date of Birth	تاريخ الميلاد</span>', 0, 'L', 0, 0, '15', '122', true, 0, true);
        $pdfBig::MultiCell(0, 0, '<span style="font-size:10;">GOOBTA DHALASHADA<br>	Place of Birth	مكان الميلاد</span>', 0, 'L', 0, 0, '15', '133', true, 0, true);
        $pdfBig::MultiCell(0, 0, '<span style="font-size:10;">LAMBARKA KAARKA AQOONSIGA<br>	ID Card Number	رقم بطاقة الهوية</span>', 0, 'L', 0, 0, '15', '145', true, 0, true);
        $pdfBig::MultiCell(0, 0, '<span style="font-size:10;">JINSI<br>	Sex	الجنس</span>', 0, 'L', 0, 0, '15', '156', true, 0, true);
        $pdfBig::MultiCell(0, 0, '<span style="font-size:10;">XAALADDA GUURKA<br>Marital Status	الحالة الزوجية</span>', 0, 'L', 0, 0, '15', '167', true, 0, true);
        $pdfBig::MultiCell(0, 0, '<span style="font-size:10;">DEGGAN<br>Place of Residence	مكان الاقامة</span>', 0, 'L', 0, 0, '15', '178', true, 0, true);
        $pdfBig::MultiCell(0, 0, '<span style="font-size:10;">MAGACA HOOYADA<br>Name of Mother	اسم الأم</span>', 0, 'L', 0, 0, '15', '189', true, 0, true);
        $pdfBig::MultiCell(0, 0, '<span style="font-size:10;">TAARIIKHDA LA BIXIYAY<br>Date of Issue	تاريخ الاصدار</span>', 0, 'L', 0, 0, '15', '200', true, 0, true);
        $pdfBig::MultiCell(0, 0, '<span style="font-size:10;">SHAQADA<br>Occupation	المهنة</span>', 0, 'L', 0, 0, '15', '211', true, 0, true);

        $pdfBig::SetTextColor(255,255, 0);
        $pdfBig::Text(150, 152, 'XASAN GEELL YOONIS');
        $pdfBig::Text(158, 163, '123456');
        $pdfBig::SetTextColor(0);
        $pdfBig::MultiCell(0, 0, '<span style="font-size:10;color:blue;">XASAN GEELL YOONIS</span>', 0, 'L', 0, 0, '80', '111.9', true, 0, true);
        $pdfBig::MultiCell(0, 0, '<span style="font-size:10;color:blue;">30-12-1969</span>', 0, 'L', 0, 0, '80', '122.9', true, 0, true);
        $pdfBig::MultiCell(0, 0, '<span style="font-size:10;color:blue;">MUQDISHO</span>', 0, 'L', 0, 0, '80', '133.9', true, 0, true);
        $pdfBig::MultiCell(0, 0, '<span style="font-size:10;color:blue;">123456</span>', 0, 'L', 0, 0, '80', '145.9', true, 0, true);
        $pdfBig::MultiCell(0, 0, '<span style="font-size:10;color:blue;">LAB</span>', 0, 'L', 0, 0, '80', '156.9', true, 0, true);
        $pdfBig::MultiCell(0, 0, '<span style="font-size:10;color:blue;">XAASLE</span>', 0, 'L', 0, 0, '80', '167.9', true, 0, true);
        $pdfBig::MultiCell(0, 0, '<span style="font-size:10;color:blue;">WADAJIR</span>', 0, 'L', 0, 0, '80', '178.9', true, 0, true);
        $pdfBig::MultiCell(0, 0, '<span style="font-size:10;color:blue;">MVMA XASAN CADDAAWA</span>', 0, 'L', 0, 0, '80', '189.9', true, 0, true);
        $pdfBig::MultiCell(0, 0, '<span style="font-size:10;color:blue;">05-12-2022</span>', 0, 'L', 0, 0, '80', '200.9', true, 0, true);
        $pdfBig::MultiCell(0, 0, '<span style="font-size:10;color:blue;">GANACSADE</span>', 0, 'L', 0, 0, '80', '211.9', true, 0, true);
        $pdfBig::Image('C:/Users/Admin/Downloads/student-png.png', 155, 115, 35, 35, 'PNG');
        $pdfBig::Image('C:/Users/Admin/Downloads/fingerprint-png.jpg', 155, 175, 28, 28, 'JPG');

        $pdfBig::MultiCell(0, 0, '<span style="font-size:10;font-weight: 10px;"><b>Duqa Magaalada<br>The Mayor		الجنس</b></span>', 0, 'C', 0, 0, '10', '225', true, 0, true);
        $pdfBig::MultiCell(0, 0, '<span style="font-size:10;font-weight: 10px;"><b>Yuusuf Xvseen Jimcaale<br>Signature</b></span>', 0, 'C', 0, 0, '10', '235', true, 0, true);


        //1D Barcode
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
        $barcodex = 12;
        $barcodey = 257;
        $barcodeWidth = 56;
        $barodeHeight = 13;
        // $pdf->SetAlpha(1);
        // $pdf->write1DBarcode(trim($print_serial_no), 'C39', $barcodex, $barcodey, $barcodeWidth, $barodeHeight, 0.4, $style1Da, 'N');
        $pdfBig::SetAlpha(1);
        $pdfBig::write1DBarcode('0123456', 'C39', $barcodex, $barcodey, $barcodeWidth, $barodeHeight, 0.4, $style1Da, 'N');

        $pdfBig::write2DBarcode('www.tcpdf.org', 'QRCODE,Q', 155, 210, 30, 200, $style1Da, 'N');
        $pdfBig::Output('certificate.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
