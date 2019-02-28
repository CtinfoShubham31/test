<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    
    
    public function getTotalCash($company_id,$login_date){
        $query = $this->db->query("SELECT SUM(closing_amt) AS tot_cash FROM pos_cash_counter WHERE login_date = '$login_date' AND company_id = $company_id ");
        //echo $this->db->last_query();die;
        return $query->row()->tot_cash;
    }
    
    public function getTopSellingProduct($company_id,$sales_order_date,$limit){
        $this->db->select('pos_inventory_stock.product_name, pos_sales_order_transaction.inventory_stock_id, SUM(pos_sales_order_transaction.sales_qty) AS total_sale_qty');
        $this->db->from('pos_sales_order_transaction');
        $this->db->join('pos_inventory_stock', 'pos_inventory_stock.inventory_stock_id = pos_sales_order_transaction.inventory_stock_id','left');
        $this->db->where('pos_inventory_stock.company_id',$company_id);
        $this->db->where('sales_order_date',$sales_order_date);
        $this->db->group_by('pos_sales_order_transaction.inventory_stock_id');
        $this->db->order_by('SUM(pos_sales_order_transaction.sales_qty)','DESC');
        $this->db->limit($limit);
        
        $query = $this->db->get();
        //echo $this->db->last_query();die;
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
    
    public function topSalesPerson($company_id,$login_date){
        $query = $this->db->query("SELECT pos_cash_counter.employee_id, pos_employee.employee_name 
        FROM pos_cash_counter 
        LEFT JOIN pos_employee
        ON pos_employee.employee_id = pos_cash_counter.employee_id
        WHERE pos_cash_counter.login_date = '$login_date' AND pos_cash_counter.company_id = $company_id AND
        (pos_cash_counter.closing_amt - pos_cash_counter.opening_amt) = (SELECT MAX(pos_cash_counter.closing_amt - pos_cash_counter.opening_amt) FROM pos_cash_counter WHERE pos_cash_counter.login_date = '$login_date')");
       
        if($query->num_rows()>0){
            $row = $query->row();
            return $row;
        }else{
            return false;
        }
        
    }
    
    
    public function customerVisit($company_id,$sales_order_date){
        $query = $this->db->query("SELECT COUNT(*) AS total_customer_visit FROM pos_sales_order WHERE company_id = $company_id AND sales_order_date = '$sales_order_date' ");
    
        if($query->num_rows()>0){
            return $row = $query->row()->total_customer_visit;
            //return $row->total_customer_visit;
        }else{
            return false;
        }
    }
    
    
    public function getTopSellingProductLists($company_id,$sales_order_date,$limit){
        $this->db->select('pos_inventory_stock.product_name, SUM(pos_sales_order_transaction.sales_qty) AS total_sale_qty');
        $this->db->from('pos_sales_order_transaction');
        $this->db->join('pos_inventory_stock', 'pos_inventory_stock.inventory_stock_id = pos_sales_order_transaction.inventory_stock_id','left');
        $this->db->where('pos_inventory_stock.company_id',$company_id);
        $this->db->where('sales_order_date',$sales_order_date);
        $this->db->group_by('pos_sales_order_transaction.inventory_stock_id');
        $this->db->order_by('SUM(pos_sales_order_transaction.sales_qty)','DESC');
        //$this->db->limit($limit);
        
        $query = $this->db->get();
        $data = array();

        //echo $this->db->last_query();die;
        if($query->num_rows()>0)
        {
            $row = $query->result_array();
            //return $row;
            foreach($row as $result){
                $data[] = $result;
            }
            return $data;
//            return $data;
        }
        else
        {
            return false;
        }
    }
    
    
//    public function getTopSellingProductCategory($company_id,$sales_order_date){
//        $this->db->select('pos_inventory_stock.inventory_category_id,pos_inventory_stock.product_name, pos_sales_order_transaction.inventory_stock_id, SUM(pos_sales_order_transaction.sales_qty) AS total_sale_qty');
//        $this->db->from('pos_sales_order_transaction');
//        $this->db->join('pos_inventory_stock', 'pos_inventory_stock.inventory_stock_id = pos_sales_order_transaction.inventory_stock_id','left');
//        $this->db->where('pos_inventory_stock.company_id',$company_id);
//        $this->db->where('sales_order_date',$sales_order_date);
//        $this->db->group_by('pos_sales_order_transaction.inventory_stock_id');
//        $this->db->order_by('SUM(pos_sales_order_transaction.sales_qty)','DESC');
//        
//        $query = $this->db->get();
//        //echo $this->db->last_query();die;
//        $data = array();
//        if($query->num_rows()>0)
//        {
//            $row = $query->result();
//            //print_r($row);die;
//            //return $row;
//            foreach($row as $result){
//                $data[] = $result->inventory_category_id;
//            }
//            //print_r($data);
//            $z = array_count_values($data);
//            $k = arsort($z);
//            //print_r($z);
//            //$d = $z;
//            //$s = array_keys($d); 
//            
//            return $z;
//        }
//        else
//        {
//            return false;
//        }
//    }
    
    public function getTopSellingProductCategory($company_id,$sales_order_date){
        $sql = "SELECT pos_inventory_category.category_name, SUM(t.total_sale_qty)  
            FROM (SELECT pos_inventory_stock.inventory_category_id as cat_id,pos_inventory_stock.product_name, pos_sales_order_transaction.inventory_stock_id, SUM(pos_sales_order_transaction.sales_qty) AS total_sale_qty 
            FROM pos_sales_order_transaction 
        LEFT JOIN pos_inventory_stock ON pos_inventory_stock.inventory_stock_id = pos_sales_order_transaction.inventory_stock_id 
        WHERE pos_sales_order_transaction.company_id = $company_id
        AND sales_order_date = '$sales_order_date' 
        GROUP BY pos_sales_order_transaction.inventory_stock_id 
        ORDER BY SUM(pos_sales_order_transaction.sales_qty) DESC 
        )t 
        LEFT JOIN pos_inventory_category 
        ON pos_inventory_category.inventory_category_id = t.cat_id
        GROUP BY t.cat_id 
        ORDER BY SUM(t.total_sale_qty) DESC";
        
        $query = $this->db->query($sql);
        //echo $this->db->last_query();die;
        if($query->num_rows()>0)
        {
            $row = $query->result_array();
            //return $row;
            foreach($row as $result){
                $data[] = $result;
            }
            return $data;
//            return $data;
        }
        else
        {
            return false;
        }
    }
    
    
    public function getPaymentMethodAmounts($company_id,$sales_order_date){
//        $sql = "SELECT r.payment_method_id, (sum_paid_amount + sum_split_amount) sum_all
//            FROM
//            (SELECT payment_method_id, SUM(paid_amount) sum_paid_amount
//            FROM pos_sales_order WHERE payment_split = 0 AND sales_order_date='$sales_order_date' AND company_id = $company_id 
//            GROUP BY payment_method_id) r
//            JOIN (
//            SELECT payment_method_id, SUM(split_amount) sum_split_amount
//            FROM pos_sales_order_payment_split WHERE sales_order_date='$sales_order_date' AND company_id = $company_id
//            GROUP BY payment_method_id) m ON r.payment_method_id = m.payment_method_id";
        $sql = "SELECT payment_method_id,SUM(sum_paid_amount) AS sum_amount FROM(SELECT payment_method_id, SUM(paid_amount) as sum_paid_amount
                FROM pos_sales_order 
                WHERE payment_split = 0 AND sales_order_date='$sales_order_date' AND company_id = $company_id
                GROUP BY payment_method_id 
                UNION 
                SELECT payment_method_id, SUM(split_amount) sum_split_amount 
                FROM pos_sales_order_payment_split 
                WHERE sales_order_date='$sales_order_date' AND company_id = $company_id 
                GROUP BY payment_method_id) t 
                GROUP BY t.payment_method_id 
                order BY payment_method_id";
        
        $query = $this->db->query($sql);
        //echo $this->db->last_query();//die('zz');
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
    
    
    public function calculateProfit($company_id,$today_date){
//        $sql = "select (final.totalSales - final.totalCost) as profit from (select sum(ctable.costing) as totalCost, stable.totalSales from (select (SUM(a.sales_qty) * b.cost_price) as costing
//from pos_system.pos_sales_order_transaction a, pos_system.pos_inventory_stock b
//where a.sales_order_date='$today_date' and a.company_id=$company_id and b.inventory_stock_id = a.inventory_stock_id
//group by a.inventory_stock_id) ctable,(select sum(sot.paid_amount) as totalSales from pos_system.pos_sales_order sot where sot.sales_order_date='$today_date') stable) final";
        $sql = "select (final.totalSales - final.totalCost) as profit from (select sum(ctable.costing) as totalCost, stable.totalSales from (select (SUM(a.sales_qty) * b.cost_price) as costing
from pos_sales_order_transaction a, pos_inventory_stock b
where a.sales_order_date='$today_date' and a.company_id=$company_id and b.inventory_stock_id = a.inventory_stock_id
group by a.inventory_stock_id) ctable,(select sum(sot.paid_amount) as totalSales from pos_sales_order sot where sot.sales_order_date='$today_date') stable) final";
        $query = $this->db->query($sql);
        //echo $this->db->last_query();//die('zz');
        if($query->num_rows()>0)
        {
            $row = $query->row();
            return $row->profit;
        }
        else
        {
            return false;
        }
    }


//    public function getInventoryCategoriesLists($company_id,$array_catids){
//        
//        if(!empty($array_catids)){
//            $catids = implode(",",$array_catids);
//            $sql = "SELECT category_name, inventory_category_id FROM (pos_inventory_category) WHERE company_id = $company_id
//                    AND inventory_category_id IN ($catids) ORDER BY FIELD(inventory_category_id, $catids)";
//            
//            $query = $this->db->query($sql);
//            //echo $this->db->last_query(); die('SS');
//
//            if($query->num_rows()>0){
//                $row = $query->result_array();
//                //return $row;
//                foreach($row as $result){
//                    $data[] = $result;
//                }
//                return $data;
//            }
//            else{
//                return false;
//            }
//        }else{
//            return false;
//        }
//    }
    
}