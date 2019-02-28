<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tabledata extends MY_Controller {

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
    
    public function copyfile(){
        $file = 'upload/lists/2.xlsx';
        $newfile = 'upload/2.xlsx';

        if (!copy($file, $newfile)) {
            echo "failed to copy $file...\n";
        }else{
            echo "copied $file into $newfile\n";
        }
    }
    
    public function dd(){
        $str = '1,2,3,4,5';
        explode($str);
    }


    public function gg(){
        $contents = "<table><tr><td>Row 1 Column 1</td><td>Row 1 Column 2</td></tr><tr><td>Row 2 Column 1</td><td>Row 2 Column 2</td></tr></table>";
        $DOM = new DOMDocument;
        $DOM->loadHTML($contents);

        $items = $DOM->getElementsByTagName('tr');
        //print_r($items);die;
         $arr = array();
        foreach ($items as $node) {
            $arr[] = $this->tdrows($node->childNodes);
        }
        print_r($arr);
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




    public function rr(){
        rename("upload/lists/2.xlsx","upload/lists/sssaaa.xlsx");
    }


    public function go(){
        $this->layout->view('table/go');
    }
    
    public function abc(){
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
    
    public function read_abc(){
        include_once(APPPATH.'libraries/Classes/PHPExcel/IOFactory.php');

        $inputFileName = 'upload/lists/ss.xlsx';

        /*check point*/

        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFileName);
        
        $data = array(1,$objPHPExcel->getActiveSheet()->toArray(null,true,true,true));

        //print the result
        echo '<pre>';
                print_r($data);
        echo '</pre>';
        //another option to display the data
        //go over the result and parse the records, then make it more readable
        if($data[0]==1){
            foreach($data[1] AS $row){
                foreach($row AS $column){
                        echo $column . ', ';
                }
                echo '<br />';
            }
        }
    }
    
    
    public function update_abc(){
        include_once(APPPATH.'libraries/Classes/PHPExcel/IOFactory.php');

        $inputFileName = 'upload/lists/ss.xlsx';

        // Read the existing excel file
        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFileName);

        // Update it's data
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        // Add column headers
        $objPHPExcel->getActiveSheet()
            ->setCellValue('A1', 'EDITED Last Name')
            ->setCellValue('B1', 'EDITED First Name')
            ->setCellValue('C1', 'EDITED Age')
            ->setCellValue('D1', 'EDITED Sex')
            ->setCellValue('E1', 'EDITED Location');
            
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save($inputFileName);
        
        $this->read_abc();
    }


    
    
    
    
    
    
    
    
    
    
    
    
    public function test2(){
        //if($list_upload){
        include_once(APPPATH.'libraries/Classes/PHPExcel/IOFactory.php');
        $inputfilename = 'upload/lists/2.xlsx';
        //die;
        //$inputfilename = 'upload/lists/dummy/dummy.xlsx';
        $exceldata = array();
        try
        {
            $inputfiletype = PHPExcel_IOFactory::identify($inputfilename);
            $objReader = PHPExcel_IOFactory::createReader($inputfiletype);
            $objPHPExcel = $objReader->load($inputfilename);
        }
        catch(Exception $e)
        {
            die('Error loading file "'.pathinfo($inputfilename,PATHINFO_BASENAME).'": '.$e->getMessage());
        }

//            $datasets = $objPHPExcel->setActiveSheetIndex()->toArray();
//            print_r($datasets);die('ssss');
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->removeColumn('A');
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('upload/lists/1535722673.xlsx');

    }
    
    public function test(){
        //if($list_upload){
            include_once(APPPATH.'libraries/Classes/PHPExcel/IOFactory.php');

            $inputfilename = 'upload/lists/1535722673.xlsx';
            //die;
            //$inputfilename = 'upload/lists/dummy/dummy.xlsx';
            $exceldata = array();

            try
            {
                $inputfiletype = PHPExcel_IOFactory::identify($inputfilename);
                $objReader = PHPExcel_IOFactory::createReader($inputfiletype);
                $objPHPExcel = $objReader->load($inputfilename);
            }
            catch(Exception $e)
            {
                die('Error loading file "'.pathinfo($inputfilename,PATHINFO_BASENAME).'": '.$e->getMessage());
            }

//            $datasets = $objPHPExcel->setActiveSheetIndex()->toArray();
//            print_r($datasets);die('ssss');
            
            
            
            $objPHPExcel->setActiveSheetIndex(0);
        
            //$objPHPExcel->getActiveSheet()->setCellValue($col_row, $val);
            //$objPHPExcel->getActiveSheet()->SetCellValue($edit_sheet_arr['sheet_cell'], $edit_sheet_arr['cell_val']);
            $objPHPExcel->getActiveSheet()->removeColumn('A');
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
            $objWriter->save('upload/lists/1535722673.xlsx');
            
        
                
    }
    
    
    public function key(){
        $arr = array(
            [0]=>array('name'=>'bob'),
            [2]=>array('name'=>'tom'),
            [3]=>array('name'=>'mark')
        );
        end($arr);
        echo key($arr);
    }
    
    public function getEditSheetData(){
            include_once(APPPATH.'libraries/Classes/PHPExcel/IOFactory.php');

            //$inputfilename = 'upload/lists/'.$list_upload;
            //die;
            $inputfilename = 'upload/lists/1536329024.xlsx';
            $exceldata = array();

            try
            {
                $inputfiletype = PHPExcel_IOFactory::identify($inputfilename);
                $objReader = PHPExcel_IOFactory::createReader($inputfiletype);
                $objPHPExcel = $objReader->load($inputfilename);
            }
            catch(Exception $e)
            {
                die('Error loading file "'.pathinfo($inputfilename,PATHINFO_BASENAME).'": '.$e->getMessage());
            }

            $datasets = $objPHPExcel->setActiveSheetIndex()->toArray();
            print_r($datasets);die('ssss');
            
//            $objWorksheet = $objPHPExcel->getSheet(0); 
//            $maxCell = $objWorksheet->getHighestRowAndColumn();
//            $datasets = $objWorksheet->rangeToArray('A1:' . $maxCell['column'] . $maxCell['row'],NULL,TRUE,FALSE);
            
            $objWorksheet = $objPHPExcel->getSheet(0); 
            echo $highestRow = $objWorksheet->getHighestDataRow(); 
            $highestColumn = $objWorksheet->getHighestDataColumn();
            for ($row = 2; $row <= $highestRow; $row++){ 
                $rowData = $objWorksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL,TRUE,FALSE);
                if($this->isEmptyRow(reset($rowData))) { continue; } // skip empty row
                // do something usefull
            }
            
            print_r($rowData);
            die('cccc');
            
//            $datasets = array_map('array_filter', $datasets);
//            $datasets = array_filter($datasets);
            print_r($datasets);die('ssss');
            //end($datasets);die('ssss');
            
//            $c = function($v){
//                return array_filter($v) != array();
//            };
//            $g = array_filter($datasets, $c);

//        $t = end($g);
//        print_r($t);
                
    }
    
    
//    $sheet = $objPHPExcel->getSheet(0); 
//$highestRow = $sheet->getHighestDataRow(); 
//$highestColumn = $sheet->getHighestDataColumn();
//for ($row = 2; $row <= $highestRow; $row++){ 
//    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL,TRUE,FALSE);
//    if(isEmptyRow(reset($rowData))) { continue; } // skip empty row
//    // do something usefull
//}

function isEmptyRow($row) {
    foreach($row as $cell){
        if (null !== $cell) return false;
    }
    return true;
}
    
    
    
    public function table(){
        include_once(APPPATH.'libraries/Classes/PHPExcel/IOFactory.php');
        $file = 'upload/lists/1536329024.xlsx';
        
        $objPHPExcel = PHPExcel_IOFactory::load($file);
        $output = '';
        
        $output .= "<label class='text-success'>Data Inserted</label><br /><table border='1' class='table table-bordered'>";
        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
        {
            //die('sss');
            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();
            
            $colNumber = PHPExcel_Cell::columnIndexFromString($highestColumn);
            //echo $colNumber;die('ZZZ');
            //$maxCell = $worksheet->getHighestRowAndColumn();
            
            //$datasets = $objWorksheet->rangeToArray('A1:' . $maxCell['column'] . $maxCell['row']);
            
            
            //print_r($highestColumn);die('QQQ');
            for($row=1; $row<=$highestRow; $row++)
            {
                $output .= "<tr>";
                //$name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                //$email = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
//                $maxCell = $objWorksheet->getHighestRowAndColumn();
//            $datasets = $objWorksheet->rangeToArray('A1:' . $maxCell['column'] . $maxCell['row']);
                for($j=0;$j<=$colNumber;$j++){
                    if(!empty($worksheet->getCellByColumnAndRow($j, $row)->getValue())){
                        $output .= '<td>'.$worksheet->getCellByColumnAndRow($j, $row)->getValue().'</td>';
                    }else{
                        $output .= '<td></td>';
                    }
                }
                //$output .= '<td>'.$name.'</td>';
                //$output .= '<td>'.$email.'</td>';
                $output .= '</tr>';
            }
        } 
        $output .= '</table>';
        echo $output;
    }
    
    public function ttt(){
        include_once(APPPATH.'libraries/Classes/PHPExcel/IOFactory.php');
        $inputfilename = 'upload/lists/1536329024.xlsx';
$exceldata = array();
        
        $inputfiletype = PHPExcel_IOFactory::identify($inputfilename);
    $objReader = PHPExcel_IOFactory::createReader($inputfiletype);
    $objPHPExcel = $objReader->load($inputfilename);
        
        $sheet = $objPHPExcel->getSheet(0); 
$highestRow = $sheet->getHighestRow(); 
$highestColumn = $sheet->getHighestColumn();
//print_r($highestRow);die('QQQ');
//  Loop through each row of the worksheet in turn
for ($row = 1; $row <= $highestRow; $row++)
{ 
    //  Read a row of data into an array
    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
	
    //  Insert row data array into your database of choice here
	//$sql = "INSERT INTO users (firstname, lastname, email)
			//VALUES ('".$rowData[0][0]."', '".$rowData[0][1]."', '".$rowData[0][2]."')";
//        $sql = "INSERT INTO users (firstname, lastname, email)
//			VALUES ('".$rowData[0][0]."', '".$rowData[0][1]."', '".$rowData[0][2]."')";
	
		$exceldata[] = $rowData[0];
	
}
//print_r($exceldata);die('EEE');
// Print excel data
echo "<table border = '1'>";
foreach ($exceldata as $index => $excelraw)
{
	echo "<tr>";
	foreach ($excelraw as $excelcolumn)
	{
		echo "<td>".$excelcolumn."</td>";
	}
	echo "</tr>";
}
echo "</table>";
    }
    
    
    public function z(){
        echo callTo();
    }
    
    public function zzz(){
        echo $r = $this->common_model->labelTree();
    }

    
    public function f(){
//        $h = $this->common_model->teeLabels(8);
//        echo $j = rtrim($h,"/");
//        die;
        $a=array("a"=>"5","b"=>5,"c"=>"5");
echo array_search(5,$a);die;
        $this->load->model('post_model');
        $h = '';$j = '';
        
        $company_id = $this->session->userdata('kaseidon_company_id');
        $alllab = $this->common_model->getAllLabel();
        if(!empty($alllab)){
            foreach($alllab AS $lab){
                $h = $this->common_model->teeLabels($lab->label_id);
                //$j = rtrim($h,"/");
                
               
                echo $lab->label_id.'--------'.$h.'<br/>';
                 $h='';
                 
//                $update_label_array = array(''.LABEL.'.label_lineage'=>$j);
//                $where_label_array = array(''.LABEL.'.label_id'=>$lab->label_id,''.LABEL.'.company_id'=>$company_id);
//                $this->post_model->updateLabel($update_label_array,$where_label_array);
                
            }
        }
        die('MM');
        $h = $this->common_model->teeLabels(8);
        echo $j = rtrim($h,"/");
        //echo $h = $this->common_model->taggLabels(20);
//        $j = rtrim($h,'/');
//                $r = explode('/',$j);
//                if(is_array($r)){
//                    $rev = array_reverse($r);
//                    $m = implode("/",$rev);
//                }else{
//                    $m = $j;
//                }
//                echo $m;
        die;
        $this->load->model('post_model');
        $result = $this->common_model->getAllLabel();
        //print_r($result);die;
       
        if(!empty($result)){
             $i=1;
             $h='';$j='';$r=array();$rev=array();$m='';
            foreach($result AS $record){
                
                
                $h = $this->common_model->taggLabels($record->label_id);
//                if($record->label_id == '2'){
//                    echo $m."\n";
//                }
                //print_r($h);die('CC');
                $j = rtrim($h,'/');
                $r = explode('/',$j);
                if(is_array($r)){
                    $rev = array_reverse($r);
                    $m = implode("/",$rev);
                }else{
                    $m = $j;
                }
                if($record->label_id == '20'){
                    echo $m."\n";
                }
                $r=array();$rev=array();
                
                
                $i++;
//                $update_label_array = array('label_lineage'=>$m);
//                $where_label_array = array('label_id'=>$record->label_id);
//                $this->post_model->updateLabel($update_label_array,$where_label_array);

                
            }
        }
    }
    
    public function visible(){
        $r = checkPostVisibility(40);
        print_r($r);
    }
    
    public function test_p(){
        $this->load->model('search_model');
        $user_id = $this->session->userdata('kaseidon_user_id');
        $company_id = $this->session->userdata('kaseidon_company_id');
        $where_array = array(
            'user_id'=>$user_id,
            'company_id'=>$company_id,
            'save_search_id'=>17
        );
        $data['saved_search_lists'] = $this->search_model->individualSavedSearch($where_array);
        //print_r($data['saved_search_lists']);die('zzz');
        //echo $data['saved_search_lists']->jsondata; die('s');
        $jdata = json_decode($data['saved_search_lists']->jsondata);
        print_r($jdata);
    }
    
    
    
}