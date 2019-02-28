<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Analytics_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getProductSalesReport($company_id,$from,$to){
        $sql = "SELECT product_name,amount
            FROM(SELECT SUM(sales_amount) as amount,inventory_stock_id, sales_order_date
            FROM pos_sales_order_transaction
            WHERE company_id = $company_id AND (sales_order_date BETWEEN '$from' AND '$to')
            GROUP BY inventory_stock_id)t
            LEFT JOIN pos_inventory_stock
            ON pos_inventory_stock.inventory_stock_id = t.inventory_stock_id
            WHERE product_name IS NOT NULL
            ORDER BY t.sales_order_date";
//        $this->db->select('pos_inventory_stock.product_name, SUM(pos_sales_order_transaction.sales_qty) AS total_sale_qty');
//        $this->db->from('pos_sales_order_transaction');
//        $this->db->join('pos_inventory_stock', 'pos_inventory_stock.inventory_stock_id = pos_sales_order_transaction.inventory_stock_id','left');
//        $this->db->where('pos_inventory_stock.company_id',$company_id);
//        $this->db->where('sales_order_date',$sales_order_date);
//        $this->db->group_by('pos_sales_order_transaction.inventory_stock_id');
//        $this->db->order_by('SUM(pos_sales_order_transaction.sales_qty)','DESC');
        //$this->db->limit($limit);
        
        $query = $this->db->query($sql);
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
    
    
    public function getEmployeeSalesReport($company_id,$from,$to){
        $sql = "SELECT employee_name, amount
            FROM(SELECT SUM(final_amount) as amount,employee_id, sales_order_date
            FROM pos_sales_order
            WHERE company_id = $company_id AND (sales_order_date BETWEEN '$from' AND '$to')
            GROUP BY employee_id)t
            LEFT JOIN pos_employee
            ON pos_employee.employee_id = t.employee_id
            WHERE employee_name IS NOT NULL
            ORDER BY t.sales_order_date";
        
        $query = $this->db->query($sql);
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
    
    
    public function getCategorySalesReport($company_id,$from,$to){
        $sql = "SELECT category_name, amount
        FROM(SELECT SUM(sales_amount) as amount, inventory_category_id, sales_order_date
        FROM pos_sales_order_transaction
        WHERE company_id = $company_id AND (sales_order_date BETWEEN '$from' AND '$to')
        GROUP BY inventory_category_id)t
        LEFT JOIN pos_inventory_category
        ON pos_inventory_category.inventory_category_id = t.inventory_category_id
        WHERE category_name IS NOT NULL
        ORDER BY t.sales_order_date";
        
        $query = $this->db->query($sql);
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
    
    
    public function getCustomerLists($company_id){
        $this->db->select('pos_customer.cust_name, pos_customer.phone_no, pos_sales_order.customer_id,SUM(pos_sales_order.final_amount) AS sum_amount');
        $this->db->from('pos_sales_order');
        $this->db->join('pos_customer', 'pos_customer.customer_id = pos_sales_order.customer_id','inner');
        $this->db->where('pos_sales_order.company_id',$company_id);
        $this->db->group_by('pos_sales_order.customer_id');
        
        $query = $this->db->get();
        //echo $this->db->last_query();die;
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
    
    
    public function getVendorLists($company_id){
        $this->db->select('pos_vendor.vendor_name, SUM(pos_purchase_order.paid_amount) AS paid_amount, SUM(pos_purchase_order.remaining_amount) AS remaining_amount, SUM(pos_purchase_order.final_amount) AS final_amount ');
        $this->db->from('pos_purchase_order');
        $this->db->join('pos_vendor', 'pos_vendor.vendor_id = pos_purchase_order.vendor_id','inner');
        $this->db->where('pos_purchase_order.company_id',$company_id);
        $this->db->group_by('pos_purchase_order.vendor_id');
        
        $query = $this->db->get();
        //echo $this->db->last_query();die;
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
    
    
    public function paymentReceivedDaywise($company_id,$from='',$to=''){
        
//        $sql = "SELECT DATE_FORMAT(sales_order_date,'%m-%d-%Y'), SUM(IF(payment_method_id = 1, paid_amount, 0)) AS cash, 
//            SUM(IF(payment_method_id = 2, paid_amount, 0)) AS mswipe, SUM(IF(payment_method_id = 3, paid_amount, 0)) AS razorpay
//        FROM pos_sales_order 
//        WHERE (sales_order_date BETWEEN '2017-03-30' AND '2017-04-03')
//        GROUP BY sales_order_date
//        ORDER BY sales_order_date";
//        $query = $this->db->query($sql);
        
        $sql = "SELECT DATE_FORMAT(sales_order_date,'%m-%d-%Y'), SUM(sum_cash) AS Cash, SUM(sum_mswipe) AS Mswipe, SUM(sum_razorpay) AS Razorpay	
        FROM (SELECT sales_order_date, SUM(IF(payment_method_id = 1 AND payment_split = 0, paid_amount, 0)) AS sum_cash, SUM(IF(payment_method_id = 2 AND payment_split = 0, paid_amount, 0)) AS sum_mswipe,
        SUM(IF(payment_method_id = 3 AND payment_split = 0, paid_amount, 0)) AS sum_razorpay
        FROM pos_sales_order 
        WHERE company_id = $company_id AND (sales_order_date BETWEEN '$from' AND '$to')
        GROUP BY sales_order_date 
        UNION
        SELECT sales_order_date, SUM(IF(payment_method_id = 1, split_amount, 0)) AS sum_split_cash, 
        SUM(IF(payment_method_id = 2, split_amount, 0)) AS sum_split_mswipe,
        SUM(IF(payment_method_id = 3, split_amount, 0)) AS sum_split_razorpay
        FROM pos_sales_order_payment_split 
        WHERE company_id = $company_id AND (sales_order_date BETWEEN '$from' AND '$to')
        GROUP BY sales_order_date
        ) t
        GROUP BY t.sales_order_date 
        ORDER BY t.sales_order_date ";
        $query = $this->db->query($sql);
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
    
    
    public function paymentReceivedWeekwise($company_id,$from='',$to=''){
        $sql = "SELECT CONCAT(DATE_ADD(DATE_FORMAT(sales_order_date,'%y-%m-%d'), INTERVAL(1-DAYOFWEEK(sales_order_date)) DAY),' - ',DATE_ADD(DATE_FORMAT(sales_order_date,'%y-%m-%d'), INTERVAL(7-DAYOFWEEK(sales_order_date)) DAY)), 
        SUM(sum_cash) AS Cash, SUM(sum_mswipe) AS Mswipe, SUM(sum_razorpay) AS Razorpay	
        FROM (SELECT sales_order_date, SUM(IF(payment_method_id = 1 AND payment_split = 0, paid_amount, 0)) AS sum_cash, SUM(IF(payment_method_id = 2 AND payment_split = 0, paid_amount, 0)) AS sum_mswipe,
        SUM(IF(payment_method_id = 3 AND payment_split = 0, paid_amount, 0)) AS sum_razorpay
        FROM pos_sales_order 
        WHERE company_id = $company_id AND (sales_order_date BETWEEN '$from' AND '$to')
        GROUP BY sales_order_date 
        UNION
        SELECT sales_order_date, SUM(IF(payment_method_id = 1, split_amount, 0)) AS sum_split_cash, 
        SUM(IF(payment_method_id = 2, split_amount, 0)) AS sum_split_mswipe,
        SUM(IF(payment_method_id = 3, split_amount, 0)) AS sum_split_razorpay
        FROM pos_sales_order_payment_split 
        WHERE company_id = $company_id AND (sales_order_date BETWEEN '$from' AND '$to')
        GROUP BY sales_order_date
        ) t
        GROUP BY week(t.sales_order_date) 
        ORDER BY week(t.sales_order_date) ";
        $query = $this->db->query($sql);
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
    
    
    public function paymentReceivedMonthwise($company_id,$from='',$to=''){
        $sql = "SELECT monthname(sales_order_date), SUM(sum_cash) AS Cash, SUM(sum_mswipe) AS Mswipe, SUM(sum_razorpay) AS Razorpay	
        FROM (SELECT sales_order_date, SUM(IF(payment_method_id = 1 AND payment_split = 0, paid_amount, 0)) AS sum_cash, SUM(IF(payment_method_id = 2 AND payment_split = 0, paid_amount, 0)) AS sum_mswipe,
        SUM(IF(payment_method_id = 3 AND payment_split = 0, paid_amount, 0)) AS sum_razorpay
        FROM pos_sales_order 
        WHERE company_id = $company_id AND (sales_order_date BETWEEN '$from' AND '$to')
        GROUP BY sales_order_date 
        UNION
        SELECT sales_order_date, SUM(IF(payment_method_id = 1, split_amount, 0)) AS sum_split_cash, 
        SUM(IF(payment_method_id = 2, split_amount, 0)) AS sum_split_mswipe,
        SUM(IF(payment_method_id = 3, split_amount, 0)) AS sum_split_razorpay
        FROM pos_sales_order_payment_split 
        WHERE company_id = $company_id AND (sales_order_date BETWEEN '$from' AND '$to')
        GROUP BY sales_order_date
        ) t
        GROUP BY monthname(t.sales_order_date) 
        ORDER BY FIELD(monthname(t.sales_order_date),'January', 'Febrary', 'March', 'April', 'May', 'June', 'July', 'August', 'September' , 'November', 'December'); ";
        $query = $this->db->query($sql);
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
    
    
    public function getExpenseOnProductReport($company_id,$from,$to){
//        $sql = "SELECT product_name,sum_amount
//            FROM(SELECT SUM(sales_amount) as sum_amount,inventory_stock_id, sales_order_date
//            FROM pos_sales_order_transaction
//            WHERE company_id = $company_id AND (sales_order_date BETWEEN '$from' AND '$to')
//            GROUP BY inventory_stock_id)t
//            LEFT JOIN pos_inventory_stock
//            ON pos_inventory_stock.inventory_stock_id = t.inventory_stock_id
//            WHERE product_name IS NOT NULL
//            ORDER BY t.sales_order_date";
        $sql = "SELECT product_name,sum_amount
            FROM(SELECT SUM(purchase_amount) as sum_amount,purchase_order_date,inventory_stock_id
            FROM pos_purchase_order_transaction
            WHERE company_id = $company_id AND (purchase_order_date BETWEEN '$from' AND '$to')
            GROUP BY inventory_stock_id)t
            LEFT JOIN pos_inventory_stock
            ON pos_inventory_stock.inventory_stock_id = t.inventory_stock_id
            WHERE product_name IS NOT NULL
            ORDER BY t.purchase_order_date";
        
        $query = $this->db->query($sql);
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
    
    
    public function getSalesExpenseReportDaywise($company_id,$from,$to){
        $sql = "SELECT DATE_FORMAT(sales_order_date,'%m-%d-%Y'), SUM(sum_sales) AS Sales, SUM(sum_expense) AS Expense	
        FROM (SELECT sales_order_date, SUM(paid_amount) AS sum_sales, '' AS sum_expense
        FROM pos_sales_order 
        WHERE company_id = $company_id AND (sales_order_date BETWEEN '$from' AND '$to')
        GROUP BY sales_order_date 
        UNION
        SELECT purchase_order_date, '' AS sum_sales, SUM(paid_amount) AS sum_expense
        FROM pos_purchase_order
        WHERE company_id = $company_id AND (purchase_order_date BETWEEN '$from' AND '$to')
        GROUP BY purchase_order_date
        ) t
        GROUP BY t.sales_order_date
        ORDER BY t.sales_order_date";
        
        $query = $this->db->query($sql);
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
    
    public function getSalesExpenseReportWeekwise($company_id,$from,$to){
        $sql = "SELECT CONCAT(DATE_ADD(DATE_FORMAT(sales_order_date,'%y-%m-%d'), INTERVAL(1-DAYOFWEEK(sales_order_date)) DAY),' - ',DATE_ADD(DATE_FORMAT(sales_order_date,'%y-%m-%d'), INTERVAL(7-DAYOFWEEK(sales_order_date)) DAY)), 
            SUM(sum_sales) AS Sales, SUM(sum_expense) AS Expense	
        FROM (SELECT sales_order_date, SUM(paid_amount) AS sum_sales, '' AS sum_expense
        FROM pos_sales_order 
        WHERE company_id = $company_id AND (sales_order_date BETWEEN '$from' AND '$to')
        GROUP BY sales_order_date 
        UNION
        SELECT purchase_order_date, '' AS sum_sales, SUM(paid_amount) AS sum_expense
        FROM pos_purchase_order
        WHERE company_id = $company_id AND (purchase_order_date BETWEEN '$from' AND '$to')
        GROUP BY purchase_order_date
        ) t
        GROUP BY week(t.sales_order_date)
        ORDER BY week(t.sales_order_date)";
        
        $query = $this->db->query($sql);
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
    
    
    public function getSalesExpenseReportMonthwise($company_id,$from,$to){
        $sql = "SELECT monthname(sales_order_date), SUM(sum_sales) AS Sales, SUM(sum_expense) AS Expense	
        FROM (SELECT sales_order_date, SUM(paid_amount) AS sum_sales, '' AS sum_expense
        FROM pos_sales_order 
        WHERE company_id = $company_id AND (sales_order_date BETWEEN '$from' AND '$to')
        GROUP BY sales_order_date 
        UNION
        SELECT purchase_order_date, '' AS sum_sales, SUM(paid_amount) AS sum_expense
        FROM pos_purchase_order
        WHERE company_id = $company_id AND (purchase_order_date BETWEEN '$from' AND '$to')
        GROUP BY purchase_order_date
        ) t
        GROUP BY monthname(t.sales_order_date) 
        ORDER BY FIELD(monthname(t.sales_order_date),'January', 'Febrary', 'March', 'April', 'May', 'June', 'July', 'August', 'September' , 'November', 'December');";
        
        $query = $this->db->query($sql);
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
    
}