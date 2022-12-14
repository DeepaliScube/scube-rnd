<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ExcelController extends Controller
{
    public function index(){
        $inputFileName = 'C:/Users/Admin/Downloads/Deepali/data.xlsx';
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        $spreadsheet = $reader->load($inputFileName);
        $worksheet = $spreadsheet->getActiveSheet();
        $no_row = $spreadsheet->getSheet(0)->toArray(); //GET ROW in integer
        $col= $spreadsheet->setActiveSheetIndex(0)->getHighestColumn();
        $no_col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($col); //Get column in integer
        $sheet = $spreadsheet->getSheet($spreadsheet->getFirstSheetIndex());
        $data = $sheet->toArray();
        unset($data[0]);
        $pdf = new PDF();
        $pdf::SetTitle('Result');
        // set default header data
        $pdf::SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf::setFooterData(array(0,64,0), array(0,64,128));
        $pdf::SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'VIGNANA BHARATHI INSTITUTE OF TECHNOLOGY','Aushapur(v), Ghstkesar(M), Medchal-Malkajgiri (Dist.) Telangana-501301,INDIA');
        $pdf::setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf::setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf::SetFont('times', 'A', 9.6); // set font
        foreach($data as $student){
            $pdf::AddPage();
            $pdf::setCellPadding(0, 0, 0, 0);
            $pdf::Cell(0, 0, "Serail No.        : ".$student[0], 1, 1, 'L', 0, '', 0);
            $pdf::Cell(0, 0, "Student's Name: ".$student[1], 1, 1, 'L', 0, '', 0);
            $pdf::Cell(0, 0, "Mother's Name : ".$student[2], 1, 1, 'L', 0, '', 0);
            $pdf::Cell(0, 0, "Enrollment No.: ".$student[3], 1, 1, 'L', 0, '', 0);
            $pdf::Cell(0, 0, "School Name   : ".$student[5], 1, 1, 'L', 0, '', 0);
            $pdf::Cell(0, 0, "Programme      : ".$student[6], 1, 1, 'L', 0, '', 0);
            $pdf::Cell(0, 0, "Examination    : ".$student[7], 1, 1, 'L', 0, '', 0);
            $pdf::Cell(0, 0, "Semester          : ".$student[8], 1, 1, 'L', 0, '', 0);
            $pdf::SetTextColor(0, 0, 110, 0);
            $pdf::Text(85, 14.6, $student[1]);
            $pdf::Text(85, 23.8, $student[3]);
            $pdf::Text('20' ,'247', $student[89] );
            $pdf::Text('43' ,'247', $student[90] );
            $pdf::Text('65' ,'247', $student[91] );
            $pdf::Text('93' ,'247', $student[92] );
            $pdf::Text('120' ,'247', $student[93] );
            $pdf::Text('150' ,'247', $student[94] );
            $pdf::Text('180' ,'247', $student[95] );
            $pdf::SetTextColor(0);
            $pdf::SetFillColor(255, 255, 255);

            $pdf::SetXY(10,47.9);
            //For layout
            $pdf::MultiCell(20, 180,"", 1, 'C',0,0);
            $pdf::MultiCell(120, 180,"", 1, 'C',0,0);
            $pdf::MultiCell(30, 180,"", 1, 'C',0,0);
            $pdf::MultiCell(20, 180,"", 1, 'C',0,0);

            $pdf::SetXY(10,47.9);
            $pdf::MultiCell(20, 5,"Course Code", 1, 'C',0,0);
            $pdf::MultiCell(120, 5,"Course Name", 1, 'C',0,0);
            $pdf::MultiCell(30, 5,"Credit (Earned)", 1, 'C',0,0);
            $pdf::MultiCell(20, 5,"Grade", 1, 'C',0,0);
            $pdf::SetXY(10,53);
            $pdf::setCellPadding(1, 1, 1, 1);
            $x = 10;
            $y = 53;
            for ($i=9; $i < 53; ) {
                $pdf::MultiCell(20, 5, $student[$i], 0, 'L',0,0);
                $i++;
                $pdf::MultiCell(120, 5,$student[$i], 0, 'L',0,0);
                $i++;
                $pdf::MultiCell(30, 5,$student[$i], 0, 'L',0,0);
                $i++;
                $pdf::MultiCell(20, 5,$student[$i], 0, 'L',0,0);
                $i++;
                // $x+= 3;
                $y+= 5;
                $pdf::SetXY($x,$y);
            }
            $pdf::MultiCell(100, 5, "  Semester Grade Point Average  (SGPA) ", 1, 'C',0, 0, '10','230');
            $pdf::MultiCell(27.9, 5, "Exam Registration (Credits)",1,'C',0,0,'10','236.6');
            $pdf::MultiCell(30, 10.5, "Earn Credits",1,'C',0,0,'36.9','236.6');
            $pdf::MultiCell(40, 10.5, "Earned Grade Points",1,'C',0,0,'55.9','236.6');
            $pdf::MultiCell(20, 10.5, "SGPA",1,'C',0,0,'90','236.6');
            $pdf::MultiCell(27.9, 5, $student[89],1,'C',0,0,'10','246');
            $pdf::MultiCell(30, 5, $student[90],1,'C',0,0,'36.9','246');
            $pdf::MultiCell(40, 5, $student[92],1,'C',0,0,'55.9','246');
            $pdf::MultiCell(20, 5, $student[93],1,'C',0,0,'90','246');
            // $pdf::MultiCell(90, 5,"fdf",1, 1, 'C', 0, '95','230');
            // $pdf::MultiCell(89, 5, "  Cumulative Grade Point Average (CGPA)    : ",1,'C',0,0,'111','230');
            // $pdf::MultiCell(30.9, 5, "Cumulative Credits Earned",1,'C',0,0,'111','236.6');
            // $pdf::MultiCell(30, 5, "Grade Points Earned",1,'C',0,0,'141','236.6');
            // $pdf::MultiCell(39, 10.5, "CGPA",1,'C',0,0,'161','236.6');
            // $pdf::MultiCell(30.9, 5, $student[93],1,'C',0,0,'111','246');
            // $pdf::MultiCell(30, 5, $student[94],1,'C',0,0,'141','246');
            // $pdf::MultiCell(39, 5, $student[95],1,'C',0,0,'161','246');

            $pdf::Text('10' ,'260', 'Date: '.$student[96] );

        }
        $pdf::Output('Marksheet.pdf', 'I');
    }
}
