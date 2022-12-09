<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
    // Extend the TCPDF class to create custom Header and Footer
    class MYPDF extends PDF {

        //Page header
        public function Header() {
            // Logo
            $image_file = 'C:/Users/Admin/Downloads/banner_black.jpg';
            $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
            // Set font
            $this->SetFont('helvetica', 'B', 20);
            // Title
            $this->Cell(0, 15, '<< TCPDF PDF >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        }

        // Page footer
        public function Footer() {
            // Position at 15 mm from bottom
            $this->SetY(-15);
            // Set font
            $this->SetFont('helvetica', 'I', 8);
            // Page number
            $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        }
    }

    class PdfController extends Controller
    {
        public function index()
        {
            // $html = 'welcome';
            $pdf = new PDF();
            $pdf::SetTitle('Result');
            // set default header data
            $pdf::SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
            $pdf::setFooterData(array(0,64,0), array(0,64,128));
            $pdf::SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'VIGNANA BHARATHI INSTITUTE OF TECHNOLOGY','Aushapur(v), Ghstkesar(M), Medchal-Malkajgiri (Dist.) Telangana-501301,INDIA');
            $pdf::setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf::setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf::AddPage();
            // $pdf::Image('C:/xampp/htdocs/core-php/tcpdf/TCPDF-main/examples/images/tcpdf_signature.png', 40, 260, 15, 15, 'PNG');
            // $pdf::writeHTML($html, true, false, true, false, '');
            $pdf::Output('hello_world.pdf');
        }
        public function custom()
        {

            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // set document information
            // $pdf::SetCreator(PDF_CREATOR);
            $pdf::SetAuthor('Nicola Asuni');
            $pdf::SetTitle('GALGOTIAS UNIVERSITY');
            $pdf::SetSubject('Grade card');
            // $pdf::SetKeywords('TCPDF, PDF, example, test, guide');

            // set default header data
            $pdf::SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

            // set header and footer fonts
            $pdf::setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf::setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

            // set default monospaced font
            $pdf::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // set margins
            $pdf::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf::SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf::SetFooterMargin(PDF_MARGIN_FOOTER);

            // set auto page breaks
            $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


            $pdf::setImageScale(PDF_IMAGE_SCALE_RATIO);  // set image scale factor

            // set some language-dependent strings (optional)
            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf::setLanguageArray($l);
            }

            $pdf::SetFont('times', 'A', 9.6); // set font

            $pdf::AddPage(); // add a page

            //Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
            $pdf::Cell(0, 0, "Student's Name: ", 1, 1, 'L', 0, '', 0);
            $pdf::Cell(0, 0, "Mother's Name : ", 1, 1, 'L', 0, '', 0);
            $pdf::Cell(0, 0, "Enrollment No.: ", 1, 1, 'L', 0, '', 0);
            $pdf::Cell(0, 0, "School Name   : ", 1, 1, 'L', 0, '', 0);
            $pdf::Cell(0, 0, "Programme      : ", 1, 1, 'L', 0, '', 0);
            $pdf::Cell(0, 0, "Examination    : ", 1, 1, 'L', 0, '', 0);

            // MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
             // set cell padding
             $pdf::setCellPaddings(1, 1, 1, 1);

             // set cell margins
             $pdf::setCellMargins(1, 1, 1, 1);

             // set color for background
            $pdf::SetFillColor(255, 255, 255);
            $pdf::MultiCell(179, 110," ", 1, 'J', 1, 1, '' ,'', true);
            $pdf::MultiCell(25, 5,"Course Code", 1, 'C', 1, 1, '15' ,'54.01');
            $pdf::MultiCell(25, 0,"Course Name", 1, 'C', 1, 1, '40' ,'54.01');

            $pdf::MultiCell(100, 5, "  Semester Grade Point Average  (SGPA) ", 1, 1, 'C', 0, '15','171');
            $pdf::MultiCell(27.9, 5, "Exam Registration (Credits)", 1, 1, 'C', 0, '15','178');
            $pdf::MultiCell(20, 10.5, "Earn Credits", 1, 1, 'C', 0, '42','178');
            $pdf::MultiCell(22, 5, "Earned Grade Points", 1, 1, 'C', 0, '61','178');
            $pdf::MultiCell(17, 10.5, "SGPA", 1, 1, 'C', 0, '83','178');
            // $pdf::MultiCell(20, 20, "SGPA", 1, 1, 'C', 0, '151','178');
            // $pdf::MultiCell(100, 5, "  Semester Grade Point Average  (SGPA)    : ", 1, 1, 'C', 0, '15','171', 5);

            $pdf::MultiCell(94, 5, "  Cumulative Grade Point Average (CGPA)    : ", 1, 1, 'C', 0, '100','171');
            $pdf::MultiCell(30.9, 5, "Cumulative Credits Earned", 1, 1, 'C', 0, '100','178');
            $pdf::MultiCell(30, 10.5, "Grade Points Earned", 1, 1, 'C', 0, '131','178');
            $pdf::MultiCell(22, 10.5, "CGPA", 1, 1, 'C', 0, '151','178');


            // --- Rotation --------------------------------------------
            $pdf::SetTextColor(120);
            $pdf::Text(70, 96, 'Deepali');
            $pdf::SetTextColor(0);
            $pdf::StartTransform();
            // Rotate 20 degrees counter-clockwise centered by (70,110) which is the lower left corner of the rectangle
            $pdf::Rotate(90, 70, 110);
            $pdf::Text(70, 96, 'Deepali');
            // Stop Transformation
            $pdf::StopTransform();

            $pdf::Output('Marksheet.pdf', 'I');
        }
    }
