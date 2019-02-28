<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rough extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(array('common_model'));
        $this->load->helper(array('form','common'));
        $this->output->nocache();
        if(!isUserLogin()) { 
            redirect($this->config->base_url().'home/logout');
        }
    }
    
    public function dd(){
        include_once(APPPATH.'libraries/Classes/PHPExcel/IOFactory.php');
        $fileName = 'ss';

        //prepare the records to be added on the excel file in an array
        $excelData = array(
                0 => array('Jackson','Barbara','27','F','Florida'),
                1 => array('Kimball','Andrew','25','M','Texas'),
                2 => array('Baker','John','28','M','Arkansas'),
                3 => array('Gamble','Edward','29','M','Virginia'),
                4 => array('Anderson','Kimberly','23','F','Tennessee'),
                5 => array('Houston','Franchine','25','F','Idaho'),
                6 => array('Franklin','Howard','24','M','California'),
                7 => array('Chen','Dan','26','M','Washington'),
                8 => array('Daniel','Carolyn','27','F','North Carolina'),
                9 => array('Englert','Grant','25','M','Delaware')
        );

        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();
        
        // Set document properties
        $objPHPExcel->getProperties()->setCreator("Me")->setLastModifiedBy("Me")->setTitle("My Excel Sheet")->setSubject("My Excel Sheet")->setDescription("Excel Sheet")->setKeywords("Excel Sheet")->setCategory("Me");

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // Add column headers
        $objPHPExcel->getActiveSheet()
            ->setCellValue('A1', 'Last Name')
            ->setCellValue('B1', 'First Name')
            ->setCellValue('C1', 'Age')
            ->setCellValue('D1', 'Sex')
            ->setCellValue('E1', 'Location')
            ;

        //Put each record in a new cell
        for($i=0; $i<count($excelData); $i++){
            $ii = $i+2;
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$ii, $excelData[$i][0]);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$ii, $excelData[$i][1]);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$ii, $excelData[$i][2]);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$ii, $excelData[$i][3]);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$ii, $excelData[$i][4]);
        }

        // Set worksheet title
        $objPHPExcel->getActiveSheet()->setTitle($fileName);
        
        //save the file to the server (Excel2007)
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('upload/lists/' . $fileName . '.xlsx');
    }
    
    public function gg(){
        include_once(APPPATH.'libraries/Classes/PHPExcel/IOFactory.php');
        
        $fileName = 'pp';
        
        $contents = "<table><tr><td>Row 1 Column 1</td><td>Row 1 Column 2</td></tr><tr><td>Row 2 Column 1</td><td>Row 2 Column 2</td></tr></table>";
        $DOM = new DOMDocument;
        $DOM->loadHTML($contents);

        $items = $DOM->getElementsByTagName('tr');
        //print_r($items);die;
         $arr = array();
        foreach ($items as $node) {
            $arr[] = $this->tdrows($node->childNodes);
        }
        $excelData = $arr;
        $je = json_encode($excelData);
        $jd = json_decode($je);
        $st = "<table border='1'>";
        for($i=0; $i<count($excelData); $i++){
            //$j = $i+1;
            //echo count($excelData[$i]);die('DD');
            $st .= '<tr>';
            for($j=0;$j<count($excelData[$i]);$j++){
                //echo $alpha_arr[$j].($i+1).'  ----- '.$excelData[$i][$j].'\n';
                //$objPHPExcel->getActiveSheet()->setCellValue($alpha_arr[$j].($i+1), $excelData[$i][$j]);\
                $st .= '<td>'.$excelData[$i][$j].'</td>';
            }
            $st .= '</tr>';
        }
        $st .= "</table>";
        echo $st;
        //print_r($jd);
        die('BB');
        //print_r($excelData);die;
        
        
        
        $objPHPExcel = new PHPExcel();
        
        // Set document properties
        $objPHPExcel->getProperties()->setCreator("Me")->setLastModifiedBy("Me")->setTitle("My Excel Sheet")->setSubject("My Excel Sheet")->setDescription("Excel Sheet")->setKeywords("Excel Sheet")->setCategory("Me");

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);
        
        $alpha_arr = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
                                                    
        //Put each record in a new cell
        for($i=0; $i<count($excelData); $i++){
            //$j = $i+1;
            //echo count($excelData[$i]);die('DD');
            for($j=0;$j<count($excelData[$i]);$j++){
                //echo $alpha_arr[$j].($i+1).'  ----- '.$excelData[$i][$j].'\n';
                $objPHPExcel->getActiveSheet()->setCellValue($alpha_arr[$j].($i+1), $excelData[$i][$j]);
            }
        }

        // Set worksheet title
        $objPHPExcel->getActiveSheet()->setTitle($fileName);
        
        //save the file to the server (Excel2007)
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('upload/lists/' . $fileName . '.xlsx');

        
    }
    
    public function tdrows($elements)
    {
        //print_r($elements);die;
        $str = array();
        foreach ($elements as $element) {
            $str[] = $element->nodeValue;
        }

        return $str;
    }
    
    
}