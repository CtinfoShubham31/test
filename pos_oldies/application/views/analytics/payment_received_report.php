<section class="content-header">
    <h1>Payment Received Report</h1>
      
    <!---------------------------- menu path link for admin -------------------->
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Payment Received Report </li>
    </ol>
      <!---------------------------- menu path link for admin end -------------------->
</section>
<section class="content">
   <div class="row">
        <form name="payment_received_report" method="post">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <label> Select date range</label>
                <div class="form-group input-group date">
                    <input type="text" id="date_range" name="date_range" class="form-control sign-control" placeholder="select date range">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div> 
            
            <div class="col-md-3 col-sm-4 col-xs-7"> 
                <div class="form-group">
                    <label> Select Interval</label>
                    <select class="form-control sign-control" name="select_interval" id="select_interval">
                        <option value="1" <?php if(!empty($interval) && $interval == 1){?>  selected="selected"<?php }?>> Daily  </option>
                        <option value="2" <?php if(!empty($interval) && $interval == 2){?>  selected="selected"<?php }?>> Weekly </option>
                        <option value="3" <?php if(!empty($interval) && $interval == 3){?>  selected="selected"<?php }?>> Monthly </option>
                    </select>
                </div>
            </div>   
          
            <div class="col-md-2 col-sm-2 col-xs-5">
                <button class="btn btn-success top-space" type="submit">Go</button>
            </div>
        </form>    
        
        <div class="clearfix"> </div> 
          
        <div class="col-md-8 col-sm-12"> 
            <div class="chart-wrap">
                <div id="line_top_x" class="chart-flexible"></div>
            </div>
        </div>


       
          <!------------------------------------------------>
    </div> <!-------row -------->
  <!----------------------------------------------------------------------->
 	 <?php //echo json_encode($jcat_data,JSON_NUMERIC_CHECK); ?>
     <div class="clearfix"> </div> 
</section>
<script type="text/javascript" src="js/google-chart.js"></script>
     
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart', 'line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

//      var data = new google.visualization.DataTable();
//      data.addColumn('number', 'Day');
//      data.addColumn('number', 'Paytm');
//      data.addColumn('number', 'Mswipe');
//      data.addColumn('number', 'Cash');
//
//      data.addRows([
//        [0,  0, 0, 0]
//      ]);
//	  var data = google.visualization.arrayToDataTable([
//          ['Day', 'Paytm', 'Mswipe','Cash'],
//          ['1',  1000, 400, 20],
//          ['2',  1170, 460, 0],
//          ['3',  660,  1120, 55],
//          ['4',  1030, 540, 10000]
//        ]);

        var data = google.visualization.arrayToDataTable(<?php echo json_encode($jpay_data,JSON_NUMERIC_CHECK); ?>);
        
	  var options = {
		width: '100%',
                height: '100%',
		backgroundColor:'#424242',
		legend:{textStyle: {color: 'white'}},
		colors:['#F0D043','#ff9001','#ff3a3a'],
		titleTextStyle:{color:'#fff', fontSize:'18' },	
		hAxis: {
                    textStyle:{color: '#FFF'},
                    title:'Duration',
                    gridlines: {color:"424242"},
                    titleTextStyle: {color: '#fff'},
                },
		vAxis:{
                    textStyle:{color: '#FFF'},
                    title:'Amount',
                    gridlines: {color:"424242"},
                    titleTextStyle: {color: '#fff'},
                }
      };

      var chart = new google.visualization.LineChart(document.getElementById('line_top_x'));

      chart.draw(data, options);
    }

$(document).ready(function() {       
    updateConfig();

    function updateConfig() {
        var options = {};
        //if ($('#ranges').is(':checked')) {
        options.ranges = {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        };
      //}

        $('#config-text').val("$('#demo').daterangepicker(" + JSON.stringify(options, null, '') + ", function(start, end, label) {\n  console.log(\"New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')\");\n});");

        //$('#config-demo').daterangepicker(options, function(start, end, label) { console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')'); });
        $('#date_range').daterangepicker(options, function(start, end, label) { console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')'); });
    }

});
</script>
