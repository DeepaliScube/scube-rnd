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
            $pdf::AddPage(); // add a page
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
            $pdf::Text('20' ,'270', $student[89] );
            $pdf::Text('40' ,'270', $student[90] );
            $pdf::Text('60' ,'270', $student[91] );
            $pdf::Text('80' ,'270', $student[92] );
            $pdf::Text('100' ,'270', $student[93] );
            $pdf::Text('120' ,'270', $student[94] );
            $pdf::Text('140' ,'270', $student[95] );
            $pdf::SetTextColor(0);
            $pdf::SetFillColor(255, 255, 255);

            $pdf::SetXY(10,47.9);
            $pdf::MultiCell(20, 5,"Course Code", 1, 'L',0,0);
            $pdf::MultiCell(120, 5,"Course Name", 1, 'L',0,0);
            $pdf::MultiCell(30, 5,"Credit (Earned)", 1, 'L',0,0);
            $pdf::MultiCell(20, 5,"Grade", 1, 'L',0,0);
            $pdf::SetXY(10,53);
            $pdf::MultiCell(20, 210,"", 1, 'L',0,0);
            $pdf::MultiCell(120, 210,"", 1, 'L',0,0);
            $pdf::MultiCell(30, 210,"", 1, 'L',0,0);
            $pdf::MultiCell(20, 210,"", 1, 'L',0,0);

            $pdf::Text('10' ,'269', $student[89] );
            $pdf::Text('30' ,'269', $student[90] );
            $pdf::Text('50' ,'269', $student[91] );
            $pdf::Text('70' ,'269', $student[92] );
            $pdf::Text('90' ,'269', $student[93] );
            $pdf::Text('110' ,'269', $student[94] );
            $pdf::Text('130' ,'269', $student[95] );
            $pdf::Text('40' ,'272.5', 'Date: '.$student[96] );
        }
        $pdf::Output('Marksheet.pdf', 'I');
    }
}
