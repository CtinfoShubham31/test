<section class="content-header">
    <h1>Dashboard</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

    <!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-2 col-md-offset-1 col-sm-4 col-xs-12 text-center">
          <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                  <h3> <?php if(!empty($total_cash)) { echo $total_cash; }else { echo '0'; }?></h3>
                </div>
                <p>Cash Available</p>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>
      <!-- ./col -->
        <div class="col-md-2 col-sm-4 col-xs-12 text-center">
          <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3 title="<?php if(!empty($top_selling_product_name->product_name)) { echo $top_selling_product_name->product_name; }?>"> <?php if(!empty($top_selling_product_name->product_name)) { echo $string = (strlen($top_selling_product_name->product_name) > 13) ? substr($top_selling_product_name->product_name,0,10).'...' : $top_selling_product_name->product_name; }else { echo '0'; }?></h3>
                </div>
                <p class="text-center">Top Selling Product</p>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
      <!-- ./col -->
        <div class="col-md-2 col-sm-4 col-xs-12 text-center">
          <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3 title="<?php if(!empty($top_sales_person->employee_name)) { echo $top_sales_person->employee_name; }?>"><?php if(!empty($top_sales_person->employee_name)) { echo $string = (strlen($top_sales_person->employee_name) > 13) ? substr($top_sales_person->employee_name,0,10).'...' : $top_sales_person->employee_name; }else { echo '0'; }?></h3>
                </div>
                <p>Top Sales Person</p>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
      <!-- ./col -->
        <div class="col-md-2 col-sm-4 col-xs-12 text-center">
          <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                  <h3> <?php if(!empty($customer_visit)) { echo $customer_visit; }else { echo '0'; }?></h3>
                </div>
                <p>Customer Visit</p>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>
        </div>
      <!-- ./col -->
        <div class="col-md-2 col-sm-4 col-xs-12 text-center">
          <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php if(!empty($profit) && $profit!=NULL) { echo $profit; }else { echo '0'; }?></h3>
                </div>
                <p>Profit</p>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>
        </div>
      <!-- ./col -->
    </div>
  <!-- /.row -->
</section>
    
<section class="content">
     <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header">
              <h3 class="box-title">Top Selling Categories</h3>

<!--             <div class="box-tools pull-right">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>-->
            </div>
            <!-- /.box-header -->
            <div class="box-body text-center">
              <div id="piechart" class="chart-area" is3D:true></div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        </div>
     <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header">
              <h3 class="box-title"> Top Selling Products</h3>

<!--             <div class="box-tools pull-right">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>-->
            </div>
            <!-- /.box-header -->
            <div class="box-body text-center">
          <div id="piechart3" class="chart-area"></div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        </div>
</section>
    <!-- /.content -->
        
<section class="content">
     <div class="row">

        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header">
                    <h3 class="box-title"> Payment by </h3>
                </div>
                <?php 
                if(!empty($pmid) && in_array(1, $pmid)){ 
                    $cash = $pmsum[1]; 
                }
                else{ 
                    $cash = 0; 
                }  
                if(!empty($pmid) && in_array(2, $pmid)){ 
                    $mswipe = $pmsum[2]; 
                }else{ 
                    $mswipe = 0; 
                } 
                if(!empty($pmid) && in_array(3, $pmid)){ 
                    $razorpay = $pmsum[3]; 
                }
                else{ 
                    $razorpay = 0; 
                } 
                
                
                if(!empty($no_of_payment) && COUNT($no_of_payment) == 1){
                    $cash_class = 6;
                }
                else if(!empty($no_of_payment) && COUNT($no_of_payment) == 2){
                    $cash_class = 4;
                }
                else{
                    $cash_class = 12;
                }
                
                ?>
            <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-<?php echo $cash_class;?> col-sm-<?php echo $cash_class;?> col-xs-12 text-center">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3><?php echo $cash;?></h3>
                                </div>
                                <p>Cash</p>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                            </div>
                        </div>
                        
                        
                        <?php  
                        $mswipe_existance = $this->payment_model->getPaymentCredential($company_id,1); 
                        if(!empty($mswipe_existance)){
                        ?>
                        <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                  <h3><?php echo $mswipe;?></h3>
                                </div>
                                <p>Mswipe</p>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        
                        
                        $razorpay_existance = $this->payment_model->getPaymentCredential($company_id,2); 
                        if(!empty($razorpay_existance)){
                        ?>
                        <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3><?php echo $razorpay;?></h3>
                                </div>
                                <p>Razorpay</p>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                      <!-- ./col -->
                    </div>
                  <!-- /.row -->
                </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
</section>
<?php //echo json_encode($jdata,JSON_NUMERIC_CHECK); ?>
    <?php //echo json_encode($jcat_data,JSON_NUMERIC_CHECK); ?>
<script type="text/javascript" src="js/google-chart.js"></script>

<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['laptop',     8],
          ['shoes',      6],
          ['desktop',  12],
          ['TV', 8],
          ['mobile',    7]
        ]);


        var options = {
          chartArea:{left:0,top:0,width:'100%',height:'100%'},
          backgroundColor: '#333333',
                  is3D:true,
                  colors:['#ff6c09','#ff9248','#ffb38a','#ffd7b5','#fde2cb'],
                  legend: {textStyle: {color: '#808080', fontSize: 13}}

        };

            //var chart = new google.visualization.PieChart(document.getElementById('piechart'));

//            var data2 = google.visualization.arrayToDataTable([
//                ['Task', 'Hours per Day'],
//                ['Jeans',     11],
//                ['Bag',      4],
//                ['Books',  6],
//                ['Shirts', 6],
//            ]);	
//               
//            var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));

            
//            var data2 = google.visualization.arrayToDataTable([
//                ['Task', 'Hours per Day'],
//                ['Jeans',     11],
//                ['Bag',      4],
//                ['Books',  6],
//                ['Shirts', 6],
//            ]);
            var chart2 = new google.visualization.PieChart(document.getElementById('piechart'));
            var data2 = google.visualization.arrayToDataTable(<?php echo json_encode($jcat_data,JSON_NUMERIC_CHECK); ?>);
            var data3 = google.visualization.arrayToDataTable(<?php echo json_encode($jdata,JSON_NUMERIC_CHECK); ?>);
            var chart3 = new google.visualization.PieChart(document.getElementById('piechart3'));


            //chart.draw(data, options);

            chart2.draw(data2, options);

            chart3.draw(data3, options);
    }
    
//$(document).ready(function() {
//    
//    /* jQueryKnob */
//
//    $(".knob").knob({
//      draw: function () {
//
//        // "tron" case
//        if (this.$.data('skin') == 'tron') {
//
//          var a = this.angle(this.cv)  // Angle
//              , sa = this.startAngle          // Previous start angle
//              , sat = this.startAngle         // Start angle
//              , ea                            // Previous end angle
//              , eat = sat + a                 // End angle
//              , r = true;
//
//          this.g.lineWidth = this.lineWidth;
//
//          this.o.cursor
//          && (sat = eat - 0.3)
//          && (eat = eat + 0.3);
//
//          if (this.o.displayPrevious) {
//            ea = this.startAngle + this.angle(this.value);
//            this.o.cursor
//            && (sa = ea - 0.3)
//            && (ea = ea + 0.3);
//            this.g.beginPath();
//            this.g.strokeStyle = this.previousColor;
//            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
//            this.g.stroke();
//          }
//
//          this.g.beginPath();
//          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
//          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
//          this.g.stroke();
//
//          this.g.lineWidth = 2;
//          this.g.beginPath();
//          this.g.strokeStyle = this.o.fgColor;
//          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
//          this.g.stroke();
//
//          return false;
//        }
//      }
//    });
//    /* END JQUERY KNOB */
//
//   //INITIALIZE SPARKLINE CHARTS
//    $(".sparkline").each(function () {
//      var $this = $(this);
//      $this.sparkline('html', $this.data());
//    });
//
//    /* SPARKLINE DOCUMENTATION EXAMPLES http://omnipotent.net/jquery.sparkline/#s-about */
//    drawDocSparklines();
//    drawMouseSpeedDemo();
//
//  });
</script>

