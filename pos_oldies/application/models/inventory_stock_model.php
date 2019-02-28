<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory_stock_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    
    
    public function addInventoryStock($data){
        $this->db->insert('pos_inventory_stock',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function addInventoryStockDiscount($disc_data){
        $this->db->insert('pos_inventory_stock_discount',$disc_data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function addInventoryStockTax($tax_data){
        $this->db->insert('pos_inventory_stock_tax',$tax_data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function addInventoryStockLocation($loc_data){
        $this->db->insert('pos_inventory_stock_location',$loc_data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function getInventoryStock($company_id){
        //$this->db->select('inventory_stock_id,inventory_category_id,company_id,unit_id,product_name,product_pic,product_code,barcode_no,stock_type,description,cost_price,sell_price,opening_quantity,current_quantity');
        //$this->db->from('pos_inventory_stock');
        $this->db->select('pos_inventory_stock.inventory_stock_id,pos_inventory_stock.inventory_category_id,
            pos_inventory_stock.unit_id,pos_inventory_stock.company_id,pos_inventory_stock.product_name,
            pos_inventory_stock.product_pic,pos_inventory_stock.product_code,pos_inventory_stock.barcode_no,
            pos_inventory_stock.stock_type,pos_inventory_stock.description,pos_inventory_stock.cost_price,
            pos_inventory_stock.sell_price,pos_inventory_stock.opening_quantity,pos_inventory_stock.current_quantity,
            pos_inventory_category.category_name,pos_unit.unit');
        $this->db->from('pos_inventory_stock');
        $this->db->join('pos_inventory_category', 'pos_inventory_category.inventory_category_id = pos_inventory_stock.inventory_category_id','left');
        $this->db->join('pos_unit', 'pos_unit.unit_id = pos_inventory_stock.unit_id','left');
        
        $this->db->where('pos_inventory_stock.product_delete_status !=',1);
        if($company_id){
            $this->db->where('pos_inventory_stock.company_id',$company_id);
        }
        $this->db->order_by('pos_inventory_stock.inventory_stock_id','desc');
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->result();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    public function getInventoryStockTax($company_id,$inventory_stock_id){
        $this->db->select('pos_inventory_stock.inventory_stock_id,pos_inventory_stock.product_name,GROUP_CONCAT(pos_tax.tax_name) AS tax_name,pos_inventory_stock_tax.tax_id,GROUP_CONCAT(pos_inventory_stock_tax.tax_id) AS tx_ids');
        $this->db->from('pos_inventory_stock');
        $this->db->join('pos_inventory_stock_tax', 'pos_inventory_stock_tax.inventory_stock_id = pos_inventory_stock.inventory_stock_id','left');
        $this->db->join('pos_tax', 'pos_tax.tax_id = pos_inventory_stock_tax.tax_id','left');
        $this->db->order_by("pos_inventory_stock.inventory_stock_id", "desc");
        
        if($company_id){
            $this->db->where('pos_inventory_stock.company_id',$company_id);
        }
        if($inventory_stock_id){
            $this->db->where('pos_inventory_stock.inventory_stock_id',$inventory_stock_id);
        }
        $this->db->group_by('pos_inventory_stock.inventory_stock_id');
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->row();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    public function getInventoryStockDiscount($company_id,$inventory_stock_id){
        $this->db->select('pos_inventory_stock.inventory_stock_id,pos_inventory_stock.product_name,GROUP_CONCAT(pos_discount.discount_name) AS discount_name,pos_inventory_stock_discount.discount_id,GROUP_CONCAT(pos_inventory_stock_discount.discount_id) AS disc_ids,GROUP_CONCAT(pos_discount.percentage) AS percentage');
        $this->db->from('pos_inventory_stock');
        $this->db->join('pos_inventory_stock_discount', 'pos_inventory_stock_discount.inventory_stock_id = pos_inventory_stock.inventory_stock_id','left');
        $this->db->join('pos_discount', 'pos_discount.discount_id = pos_inventory_stock_discount.discount_id','left');
        $this->db->order_by("pos_inventory_stock.inventory_stock_id", "desc");
        
        if($company_id){
            $this->db->where('pos_inventory_stock.company_id',$company_id);
        }
        if($inventory_stock_id){
            $this->db->where('pos_inventory_stock.inventory_stock_id',$inventory_stock_id);
        }
        $this->db->group_by('pos_inventory_stock.inventory_stock_id');
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->row();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    
    public function getInventoryStockLocation($company_id,$inventory_stock_id){
        $this->db->select('pos_inventory_stock.inventory_stock_id,pos_inventory_stock.product_name,GROUP_CONCAT(pos_location.location_name) AS location_name,pos_inventory_stock_location.location_id,GROUP_CONCAT(pos_inventory_stock_location.location_id) AS loc_ids');
        $this->db->from('pos_inventory_stock');
        $this->db->join('pos_inventory_stock_location', 'pos_inventory_stock_location.inventory_stock_id = pos_inventory_stock.inventory_stock_id','left');
        $this->db->join('pos_location', 'pos_location.location_id = pos_inventory_stock_location.location_id','left');
        $this->db->order_by("pos_inventory_stock.inventory_stock_id", "desc");
        
        if($company_id){
            $this->db->where('pos_inventory_stock.company_id',$company_id);
        }
        if($inventory_stock_id){
            $this->db->where('pos_inventory_stock.inventory_stock_id',$inventory_stock_id);
        }
        $this->db->group_by('pos_inventory_stock.inventory_stock_id');
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->row();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    public function addStockCustomFields($data){
        $this->db->insert('pos_inventory_stock_customfields',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function getCustomFieldsNameUsingCustomName($company_id,$custom_name=''){
        $this->db->select('inventory_stock_customfield_id,company_id,custom_name');
        $this->db->from('pos_inventory_stock_customfields');
        
        if($company_id){
            $this->db->where('company_id',$company_id);
        }
        if($custom_name){
            $this->db->where('custom_name',$custom_name);
        }
        //$this->db->order_by('inventory_stock_id','desc');
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->result();
            return $row;
        }
        else
        {
            return false;
        }
    }
    

    public function getCustomFieldsNameUsingCompanyIdStockId($company_id,$inventory_stock_id=''){
        $this->db->select('pos_inventory_stock_customfields.inventory_stock_customfield_id,pos_inventory_stock_customfields.company_id, pos_inventory_stock_customfields.custom_name,pos_inventory_stock_customfields_value.value');
        $this->db->from('pos_inventory_stock_customfields');
        $this->db->join('pos_inventory_stock_customfields_value', 'pos_inventory_stock_customfields_value.inventory_stock_customfield_id = pos_inventory_stock_customfields.inventory_stock_customfield_id','left');
        if($company_id){
            $this->db->where('pos_inventory_stock_customfields_value.company_id',$company_id);
        }
        if($inventory_stock_id){
            $this->db->where('pos_inventory_stock_customfields_value.inventory_stock_id',$inventory_stock_id);
        }
        //$this->db->order_by('inventory_stock_id','desc');
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->result();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    public function getCustomFieldsNameSingleRow($company_id,$custom_name=''){
        $this->db->select('inventory_stock_customfield_id,company_id,custom_name');
        $this->db->from('pos_inventory_stock_customfields');
        
        if($company_id){
            $this->db->where('company_id',$company_id);
        }
        if($custom_name){
            $this->db->where('custom_name',$custom_name);
        }
        //$this->db->order_by('inventory_stock_id','desc');
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->row();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    public function addStockCustomFieldsValue($data){
        $this->db->insert('pos_inventory_stock_customfields_value',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    
    public function getInventoryStockUsingCategoryId($company_id,$inventory_category_id=''){
        //$this->db->select('inventory_stock_id,inventory_category_id,unit_id,company_id,product_name,product_pic,product_code,barcode_no,stock_type,description,cost_price,sell_price,opening_quantity,current_quantity');
        //$this->db->from('pos_inventory_stock');
        $this->db->select('pos_inventory_stock.inventory_stock_id,pos_inventory_stock.inventory_category_id,
            pos_inventory_stock.unit_id,pos_inventory_stock.company_id,pos_inventory_stock.product_name,
            pos_inventory_stock.product_pic,pos_inventory_stock.product_code,pos_inventory_stock.barcode_no,
            pos_inventory_stock.stock_type,pos_inventory_stock.description,pos_inventory_stock.cost_price,
            pos_inventory_stock.sell_price,pos_inventory_stock.opening_quantity,pos_inventory_stock.current_quantity,
            pos_inventory_stock.is_inclusive,
            pos_unit.unit');
        $this->db->from('pos_inventory_stock');
        $this->db->join('pos_unit', 'pos_unit.unit_id = pos_inventory_stock.unit_id','left');
        $this->db->where('pos_inventory_stock.product_delete_status !=',1);
        if($company_id){
            $this->db->where('pos_inventory_stock.company_id',$company_id);
        }
        if($inventory_category_id){
            $this->db->where('pos_inventory_stock.inventory_category_id',$inventory_category_id);
        }
        $this->db->order_by('pos_inventory_stock.product_name');
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->result();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    
    public function getInventoryStockUsingCompanyIdStockId($company_id,$inventory_stock_id){
        $this->db->select('pos_inventory_stock.inventory_stock_id,pos_inventory_stock.inventory_category_id,
            pos_inventory_stock.unit_id,pos_inventory_stock.company_id,pos_inventory_stock.product_name,
            pos_inventory_stock.product_pic,pos_inventory_stock.product_code,pos_inventory_stock.barcode_no,
            pos_inventory_stock.stock_type,pos_inventory_stock.description,pos_inventory_stock.cost_price,
            pos_inventory_stock.sell_price,pos_inventory_stock.opening_quantity,pos_inventory_stock.current_quantity,pos_inventory_stock.is_inclusive,
            pos_unit.unit');
        $this->db->from('pos_inventory_stock');
        $this->db->join('pos_unit', 'pos_unit.unit_id = pos_inventory_stock.unit_id','left');
        
        if($inventory_stock_id){
            $this->db->where('inventory_stock_id',$inventory_stock_id);
        }
        if($company_id){
            $this->db->where('company_id',$company_id);
        }
        //$this->db->order_by('inventory_stock_id','desc');
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->row();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    
    public function updateInventoryStock($stock_data,$inventory_stock_id,$company_id){
        $this->db->where('company_id', $company_id);
        $this->db->where('inventory_stock_id', $inventory_stock_id);
        $this->db->update('pos_inventory_stock', $stock_data); 
    }
    
    public function deleteInventoryStockDiscount($inventory_stock_id,$company_id) {
        $this->db->where('inventory_stock_id', $inventory_stock_id);
        $this->db->where('company_id', $company_id);
        $this->db->delete('pos_inventory_stock_discount'); 
    }
    
    public function deleteInventoryStockTax($inventory_stock_id,$company_id) {
        $this->db->where('inventory_stock_id', $inventory_stock_id);
        $this->db->where('company_id', $company_id);
        $this->db->delete('pos_inventory_stock_tax'); 
    }
    
    public function deleteInventoryStockLocation($inventory_stock_id,$company_id) {
        $this->db->where('inventory_stock_id', $inventory_stock_id);
        $this->db->where('company_id', $company_id);
        $this->db->delete('pos_inventory_stock_location'); 
    }
    
    public function deleteInventoryStockCustomFieldValue($inventory_stock_id,$company_id) {
        $this->db->where('inventory_stock_id', $inventory_stock_id);
        $this->db->where('company_id', $company_id);
        $this->db->delete('pos_inventory_stock_customfields_value'); 
    }
    
    public function getTaxWithPercentage($company_id,$tax_ids,$date){        
        $sql = "SELECT * FROM (SELECT tax_id, percentage, applicable_from FROM pos_tax_percenatge
            WHERE applicable_from <= '$date' AND tax_id IN ($tax_ids) AND company_id = '$company_id' 
            ORDER BY applicable_from DESC) AS stax LEFT JOIN pos_tax ON pos_tax.tax_id = stax.tax_id GROUP BY stax.tax_id";
        //$this->db->order_by('inventory_stock_id','desc');
        $query = $this->db->query($sql);
        
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->result();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    public function getDiscountWithPercentage($company_id,$discount_idarray){
        $this->db->select('discount_id,company_id,discount_name,percentage,applicable_from,applicable_to');
        $this->db->from('pos_discount');
        
        if($discount_idarray){
            $this->db->where_in('discount_id',$discount_idarray);
        }
        if($company_id){
            $this->db->where('company_id',$company_id);
        }
        //$this->db->order_by('inventory_stock_id','desc');
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->result();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    
    public function allUnitLists(){
        $this->db->select('unit_id,unit');
        $this->db->from('pos_unit');
        $this->db->order_by('unit');
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->result();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    public function unitInfo($unit_id){
        $this->db->select('unit_id,unit,short_codes');
        $this->db->from('pos_unit');
        $this->db->where('unit_id',$unit_id);
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');
        if($query->num_rows()>0)
        {
            $row = $query->row();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    public function getProductCode($company_id,$str){
        //$str = 'Anti Chai.% (Cold)';
        $string = preg_replace("/[^ \w]+/", "", $str);  //Replace all characters except letters, numbers, spaces and underscores
        $acronym='';
        $word='';
        $words = preg_split("/(\s|\-|\.)/", $string);
        foreach($words as $w) {
            $acronym .= substr($w,0,1);
        }
        $word = $word . $acronym ;
        //echo $word;
        
        //$query = $this->db->query("SELECT COUNT(*) AS tot_stock FROM pos_inventory_stock WHERE company_id = $company_id");
        $query = $this->db->query("SELECT * FROM pos_inventory_stock WHERE company_id = $company_id ORDER BY inventory_stock_id DESC LIMIT 1");
        if($query->num_rows()>0){
            $id = $query->row()->inventory_stock_id+1;
        }else{
            $id = 1;
        }
        //$total_count = $query->row()->inventory_stock_id+1;
        $t_count = sprintf('%0004d', $id); // category code
        $product_code = $word.'-'.$t_count;
        return $product_code;
        
    }
    
    public function checkProductCodeExistance($company_id,$product_code,$inventory_stock_id=''){
        $this->db->select('inventory_stock_id,company_id,product_name,product_code');
        $this->db->from('pos_inventory_stock');
        $this->db->where('company_id',$company_id);
        $this->db->where('product_code',$product_code);
        if($inventory_stock_id){
            $this->db->where('inventory_stock_id',$inventory_stock_id);
        }
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');

        if($query->num_rows()==1){
            //echo 'false';
            //return true;
            $row = $query->row();
            return $row;
        }
        else{
            return false;
        }
    }
    
    public function checkProductCodeExistanceUpdateTime($company_id,$product_code,$inventory_stock_id=''){
        $this->db->select('inventory_stock_id,company_id,product_name,product_code');
        $this->db->from('pos_inventory_stock');
        $this->db->where('company_id',$company_id);
        $this->db->where('product_code',$product_code);
        $this->db->where('inventory_stock_id !=',$inventory_stock_id);
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');

        if($query->num_rows()==1){
            $row = $query->row();
            return $row;
        }
        else{
            return false;
        }
    }
    
    
    public function getStockUniqueName($inventory_stock_id,$company_id){
        $this->db->select('inventory_stock_id,stock_unique_name');
        $this->db->from('pos_inventory_stock');
        $this->db->where('company_id',$company_id);
        $this->db->where('inventory_stock_id',$inventory_stock_id);
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');

        if($query->num_rows()==1){
            $row = $query->row();
            return $row;
        }
        else{
            return false;
        }
    }
    
}