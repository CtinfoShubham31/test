<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    
    
    public function addInventory($data){
        $this->db->insert('pos_inventory_category',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function addInventoryTax($data){
        $this->db->insert('pos_inventory_category_tax',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function addInventoryDiscount($data){
        $this->db->insert('pos_inventory_category_discount',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    
    public function updateInventoryCategory($category_data,$inventory_catgory_id,$company_id){
        $this->db->where('company_id', $company_id);
        $this->db->where('inventory_category_id', $inventory_catgory_id);
        $this->db->update('pos_inventory_category', $category_data); 
    }
    
    public function getParentCategoryName($company_id){
        $this->db->select('inventory_category_id,category_name');
        $this->db->from('pos_inventory_category');
        $this->db->where('company_id',$company_id);
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


//    public function updateEmployee($updatedata,$employee_id,$company_id){
//        $this->db->where('company_id', $company_id);
//        $this->db->where('employee_id', $employee_id);
//        $this->db->update('pos_employee', $updatedata); 
//    }
    
    /*Get all categories*/
    public function getAllCategoriesCompanyWise($company_id){
        $this->db->select('inventory_category_id,category_name,company_id,category_pic');
        $this->db->from('pos_inventory_category');
        $this->db->where('company_id',$company_id);
        $this->db->order_by('category_name');
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
    
    
    public function getInventoryCategories($company_id){
        $this->db->select('e.inventory_category_id AS inv_cat_id, e.category_name AS catname, parents.inventory_category_id, parents.category_name,
            parents.category_code,parents.category_pic, parents.company_id');
        $this->db->from('pos_inventory_category AS e');
        $this->db->join('pos_inventory_category AS parents', 'parents.parent_category_id = e.inventory_category_id','right');
        $this->db->order_by("parents.inventory_category_id", "desc");
        
        if($company_id){
            $this->db->where('parents.company_id',$company_id);
        }
        
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
    
    public function getInventoryTax($company_id,$inventory_category_id){
        $this->db->select('pos_inventory_category.inventory_category_id,pos_inventory_category.category_name,GROUP_CONCAT(pos_tax.tax_name) AS tax_name,pos_inventory_category_tax.tax_id,GROUP_CONCAT(pos_inventory_category_tax.tax_id) AS tx_ids');
        $this->db->from('pos_inventory_category');
        $this->db->join('pos_inventory_category_tax', 'pos_inventory_category_tax.inventory_category_id = pos_inventory_category.inventory_category_id','left');
        $this->db->join('pos_tax', 'pos_tax.tax_id = pos_inventory_category_tax.tax_id','left');
        $this->db->order_by("pos_inventory_category.inventory_category_id", "desc");
        
        if($company_id){
            $this->db->where('pos_inventory_category.company_id',$company_id);
        }
        if($inventory_category_id){
            $this->db->where('pos_inventory_category.inventory_category_id',$inventory_category_id);
        }
        $this->db->group_by('pos_inventory_category.inventory_category_id');
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
    
    public function getInventoryDiscount($company_id,$inventory_category_id){
        $this->db->select('pos_inventory_category.inventory_category_id,pos_inventory_category.category_name,GROUP_CONCAT(pos_discount.discount_name) AS discount_name,pos_inventory_category_discount.discount_id,GROUP_CONCAT(pos_inventory_category_discount.discount_id) AS disc_ids');
        $this->db->from('pos_inventory_category');
        $this->db->join('pos_inventory_category_discount', 'pos_inventory_category_discount.inventory_category_id = pos_inventory_category.inventory_category_id','left');
        $this->db->join('pos_discount', 'pos_discount.discount_id = pos_inventory_category_discount.discount_id','left');
        $this->db->order_by("pos_inventory_category.inventory_category_id", "desc");
        
        if($company_id){
            $this->db->where('pos_inventory_category.company_id',$company_id);
        }
        if($inventory_category_id){
            $this->db->where('pos_inventory_category.inventory_category_id',$inventory_category_id);
        }
        $this->db->group_by('pos_inventory_category.inventory_category_id');
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
    
    
    public function getInventoryCategoriesUsingCompanyIdCategoryId($inventory_category_id,$company_id){
        $this->db->select('e.inventory_category_id AS inv_cat_id, e.category_name AS catname, parents.inventory_category_id, parents.category_name,
            parents.category_code,parents.category_pic, parents.company_id');
        $this->db->from('pos_inventory_category AS e');
        $this->db->join('pos_inventory_category AS parents', 'parents.parent_category_id = e.inventory_category_id','right');
        $this->db->order_by("parents.inventory_category_id", "desc");
        
        if($company_id){
            $this->db->where('parents.company_id',$company_id);
        }
        
        if($inventory_category_id){
            $this->db->where('parents.inventory_category_id',$inventory_category_id);
        }
        
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
    
    public function deleteInventoryCategoryDiscount($inventory_catgory_id,$company_id) {
        $this->db->where('inventory_category_id', $inventory_catgory_id);
        $this->db->where('company_id', $company_id);
        $this->db->delete('pos_inventory_category_discount'); 
    }
    
    public function deleteInventoryCategoryTax($inventory_catgory_id,$company_id) {
        $this->db->where('inventory_category_id', $inventory_catgory_id);
        $this->db->where('company_id', $company_id);
        $this->db->delete('pos_inventory_category_tax'); 
    }
    
    public function deleteInventoryCategory($inventory_catgory_id,$company_id){
        $this->db->where('inventory_category_id', $inventory_catgory_id);
        $this->db->where('company_id', $company_id);
        $this->db->delete('pos_inventory_category');
    }
    
    /*Calculate category code*/
    public function getCategoryCode($company_id){
        //$query = $this->db->query("SELECT COUNT(*) AS tot_cat FROM pos_inventory_category WHERE company_id = $company_id");
        $query = $this->db->query("SELECT * FROM pos_inventory_category WHERE company_id = $company_id ORDER BY inventory_category_id DESC LIMIT 1");
        if($query->num_rows()>0){
            $id = $query->row()->inventory_category_id+1;
        }else{
            $id = 1;
        }
        //$total_count = $query->row()->tot_cat+1;
        $category_code = sprintf('%0004d', $id); // category code
        return $category_code;
    }
    
    
    public function checkCategoryCodeExistance($company_id,$category_code,$inventory_category_id=''){
        $this->db->select('inventory_category_id,company_id,category_name,category_code,parent_category_id');
        $this->db->from('pos_inventory_category');
        $this->db->where('company_id',$company_id);
        $this->db->where('category_code',$category_code);
        if($inventory_category_id){
            $this->db->where('inventory_category_id',$inventory_category_id);
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
    
    public function checkCategoryCodeExistanceUpdateTime($company_id,$category_code,$inventory_category_id){
        $this->db->select('inventory_category_id,company_id,category_name,category_code,parent_category_id');
        $this->db->from('pos_inventory_category');
        $this->db->where('company_id',$company_id);
        $this->db->where('category_code',$category_code);
        $this->db->where('inventory_category_id !=',$inventory_category_id);
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
    
    
    public function checkCategoryExistanceInStock($company_id,$inventory_category_id){
        $this->db->select('inventory_stock_id,company_id,product_name,product_code,inventory_category_id ');
        $this->db->from('pos_inventory_stock');
        $this->db->where('company_id',$company_id);
        $this->db->where('inventory_category_id ',$inventory_category_id);
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');

        if($query->num_rows()>0){
            $row = $query->result();
            return $row;
        }
        else{
            return false;
        }
    }
    
    Public function getCategoryDiscounts($company_id,$inventory_category_id){
        $this->db->select('inventory_category_discount_id,inventory_category_id,company_id,discount_id ');
        $this->db->from('pos_inventory_category_discount');
        $this->db->where('company_id',$company_id);
        $this->db->where('inventory_category_id ',$inventory_category_id);
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');

        if($query->num_rows()>0){
            $row = $query->result();
            return $row;
        }
        else{
            return false;
        }
    }
    
    public function addInventoryStockDiscountFromCategory($disc_data){
        $this->db->insert('pos_inventory_stock_discount',$disc_data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function deleteInventoryStockDiscountFromCategory($inventory_category_id,$company_id) {
        $this->db->where('inventory_category_id', $inventory_category_id);
        $this->db->where('company_id', $company_id);
        $this->db->delete('pos_inventory_stock_discount'); 
    }
    
    Public function getCategoryTaxes($company_id,$inventory_category_id){
        $this->db->select('inventory_category_tax_id,inventory_category_id,company_id,tax_id ');
        $this->db->from('pos_inventory_category_tax');
        $this->db->where('company_id',$company_id);
        $this->db->where('inventory_category_id ',$inventory_category_id);
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');

        if($query->num_rows()>0){
            $row = $query->result();
            return $row;
        }
        else{
            return false;
        }
    }
    
    public function addInventoryStockTaxesFromCategory($tax_data){
        $this->db->insert('pos_inventory_stock_tax',$tax_data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
    public function deleteInventoryStockTaxesFromCategory($inventory_category_id,$company_id) {
        $this->db->where('inventory_category_id', $inventory_category_id);
        $this->db->where('company_id', $company_id);
        $this->db->delete('pos_inventory_stock_tax'); 
    }
    
    public function updateInventoryStockDiscount($stock_data,$inventory_stock_id,$company_id){
        $this->db->where('company_id', $company_id);
        $this->db->where('inventory_stock_id', $inventory_stock_id);
        $this->db->update('pos_inventory_stock_discount', $stock_data); 
    }
    
    public function updateInventoryStockTax($stock_data,$inventory_stock_id,$company_id){
        $this->db->where('company_id', $company_id);
        $this->db->where('inventory_stock_id', $inventory_stock_id);
        $this->db->update('pos_inventory_stock_tax', $stock_data); 
    }
    
    /*Giddh  Get parent category unique name*/
    public function getCategoryUniqueName($parent_category_id,$company_id){
        $this->db->select('inventory_category_id,category_unique_name');
        $this->db->from('pos_inventory_category');
        $this->db->where('company_id',$company_id);
        $this->db->where('inventory_category_id ',$parent_category_id);
        $query = $this->db->get();
        //echo $this->db->last_query(); die('SS');

        if($query->num_rows()>0){
            $row = $query->row();
            return $row;
        }
        else{
            return false;
        }
    }
    
    
}