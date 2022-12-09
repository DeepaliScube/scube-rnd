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
        $Sr = $StudentsName = $MothersName = $EnrolmentNumber = $AdmissionNumber = $SchoolName = $ProgrammeName = $Examination = $TermSemester = $CourseCode1 = $CourseName1 = $Credits1 = $Grade1 = $CourseCode2 = $CourseName2 = $Credits2 = $Grade2 = $CourseCode3 = $CourseName3 = $Credits3 = $Grade3 = $CourseCode4 = $CourseName4 = $Credits4 = $Grade4 = $CourseCode5 = $CourseName5 = $Credits5 = $Grade5 = $CourseCode6 = $CourseName6 = $Credits6 = $Grade6 = $CourseCode7 = $CourseName7 = $Credits7 = $Grade7 = $CourseCode8 = $CourseName8 = $Credits8 = $Grade8 = $CourseCode9 = $CourseName9 = $Credits9 = $Grade9 = $CourseCode10 = $CourseName10 = $Credits10 = $Grade10 = $CourseCode11 = $CourseName11 = $Credits11 = $Grade11 = $CourseCode12 = $CourseName12 = $Credits12 = $Grade12 = $CourseCode13 = $CourseName13 = $Credits13 = $Grade13 = $CourseCode14 = $CourseName14 = $Credits14 = $Grade14 = $CourseCode15 = $CourseName15 = $Credits15 = $Grade15 = $CourseCode16 = $CourseName16 = $Credits16 = $Grade16 = $CourseCode17 = $CourseName17 = $Credits17 = $Grade17 = $CourseCode18 = $CourseName18 = $Credits18 = $Grade18 = $CourseCode19 = $CourseName19 = $Credits19 = $Grade19 = $CourseCode20 = $CourseName20 = $Credits20 = $Grade20 = $ExamRegistrationCredits = $EarnCredits = $EarnedGradePoints1 = $SGPA = $CumulativeCreditsEarned = $EarnedGradePoints2 = $CGPA = $Date = 0;
        $items = count($data);
        $pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf::SetTitle('Result');

        // set default header data
        $pdf::SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 004', PDF_HEADER_STRING);

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

        // set image scale factor
        $pdf::setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf::setLanguageArray($l);
        }
        // ---------------------------------------------------------
        // set font
        $pdf::SetFont('times', '', 11);
        // add a page
        foreach($data as $stud){
            $pdf::AddPage();
            $pdf::setCellPaddings(1, 1, 1, 1);

            // set cell margins
            $pdf::setCellMargins(1, 1, 1, 1);

            // set color for background
            $pdf::SetFillColor(255, 255, 255);
            // define barcode style
            $style = array(
                'position' => '',
                'align' => 'C',
                'stretch' => false,
                'fitwidth' => true,
                'cellfitalign' => '',
                'border' => true,
                'hpadding' => 'auto',
                'vpadding' => 'auto',
                'fgcolor' => array(0,0,0),
                'bgcolor' => false, //array(255,255,255),
                'text' => true,
                'font' => 'helvetica',
                'fontsize' => 8,
                'stretchtext' => 4
            );

            $pdf::Cell(0,0, 'Serial No.'.$stud[0],0,1,'R',0,'',0);
            // $pdf::MultiCell(0,0, 'Serial No.'.$stud[0],'','','R');
            // MultiCell(   $w,$h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
            $pdf::SetTextColor(0, 0, 110, 0);
            $pdf::Text(85, 15, $stud[1]);
            $pdf::Text(85, 20, $stud[3]);
            $pdf::Text('20' ,'180', $stud[89] );
            $pdf::Text('30' ,'180', $stud[90] );
            $pdf::Text('40' ,'180', $stud[91] );
            $pdf::Text('50' ,'180', $stud[92] );
            $pdf::Text('60' ,'180', $stud[93] );
            $pdf::Text('70' ,'180', $stud[94] );
            $pdf::Text('80' ,'180', $stud[95] );
            $pdf::SetTextColor(0);

            $pdf::MultiCell(0, 0, $stud[1], 0, 'L', 0, 1, '50' ,'10');
            $pdf::MultiCell(0, 0, $stud[2], 0, 'L', 0, 1, '50' ,'15');
            $pdf::MultiCell(0, 0, $stud[3], 0, 'L', 0, 1, '50' ,'20');
            $pdf::MultiCell(0, 0, $stud[4], 0, 'L', 0, 1, '120' ,'20');
            $pdf::MultiCell(0, 0, $stud[5], 0, 'L', 0, 1, '50' ,'25');
            $pdf::MultiCell(0, 0, $stud[6], 0, 'L', 0, 1, '50' ,'30');
            $pdf::MultiCell(0, 0, $stud[7], 0, 'L', 0, 1, '49' ,'35');
            $pdf::MultiCell(0, 0, $stud[8], 0, 'L', 0, 1, '150' ,'35');
            // $pdf::Cell(0,0, '',0,1,'R',0,'',0);
            // $pdf::Cell(0,0, '',0,1,'R',0,'',0);
            // $pdf::Cell(0,0, '',0,1,'R',0,'',0);
            // $pdf::Cell(0,0, '',0,1,'R',0,'',0);
            // $pdf::Cell(0,0, '',0,1,'R',0,'',0);

            $y = 60;
            for($i = 9;$i<=53;$i++){
                // $j = $i;

                $pdf::MultiCell(0, 0, $stud[9], 0, 'L', 0, 1, '10' , '60');
                // $j++;
                $pdf::MultiCell(0, 0, $stud[10], 0, 'L', 0, 1, '39' , '60');
                // $j++;
                $pdf::MultiCell(0, 0, $stud[11], 0, 'L', 0, 1, '110' , '60');
                // $j++;
                $pdf::MultiCell(0, 0, $stud[12], 0, 'L', 0, 1, '150' , '60');


                $pdf::MultiCell(0, 0, $stud[13], 0, 'L', 0, 1, '10' , '70');
                // $j++;
                $pdf::MultiCell(0, 0, $stud[14], 0, 'L', 0, 1, '39' , '70');
                // $j++;
                $pdf::MultiCell(0, 0, $stud[15], 0, 'L', 0, 1, '110' , '70');
                // $j++;
                $pdf::MultiCell(0, 0, $stud[16], 0, 'L', 0, 1, '150' , '70');

                // $j++;
                // $i = $j;
                // break;
                // $pdf::MultiCell(0, 0, $stud[$i+1], 0, 'L', 0, 1, '20' ,'60');
                // $pdf::MultiCell(0, 0, $stud[$i+1], 0, 'L', 0, 1, '30' ,'70');
                // $pdf::MultiCell(0, 0, $stud[$i+1], 0, 'L', 0, 1, '40' ,'80');
            }
            $pdf::MultiCell(0, 0, $stud[89], 0, 'L', 0, 1, '15' ,'180');
            $pdf::MultiCell(0, 0, $stud[90], 0, 'L', 0, 1, '25' ,'180');
            $pdf::MultiCell(0, 0, $stud[91], 0, 'L', 0, 1, '35' ,'180');
            $pdf::MultiCell(0, 0, $stud[92], 0, 'L', 0, 1, '45' ,'180');
            $pdf::MultiCell(0, 0, $stud[93], 0, 'L', 0, 1, '55' ,'180');
            $pdf::MultiCell(0, 0, $stud[94], 0, 'L', 0, 1, '65' ,'180');
            $pdf::MultiCell(0, 0, $stud[95], 0, 'L', 0, 1, '75' ,'180');
            $pdf::MultiCell(0, 0, 'Date: '.$stud[96], 0, 'L', 0, 1, '25' ,'190');
        }
        $pdf::Output('result.pdf', 'I');
    }
}
