<section class="content-header">
    <h1>Expense Report</h1>

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Expense Report </li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <form name="sales_expenses_report" method="post">
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
                <div class="top-space">
                    <button class="btn btn-success" type="submit">Go</button>
                </div>
            </div>
        </form>    

        <div class="clearfix"> </div> 

        <div class="col-sm-6"> 
            <div class="box-header line-none">
                <h3 class="box-title"> Expense Product Chart</h3>
            </div>
            <div class="chart-wrap" style="position:relative">
                <div id="barchart_values" class="chart-flexible" style="max-height:400px; overflow-y:scroll;overflow-x:hidden">

                </div>
                <div id="axis_hide1" class="chart-fix"> </div>
                <div style="width:100%; text-align:center; z-index:99999; position:absolute; bottom:20px;"> Amount </div>

            </div>
        </div>

        <div class="col-sm-6"> 
        <div class="box-header line-none">
            <h3 class="box-title"> Expense and Sales Chart </h3>
          </div>
        <div class="chart-wrap">
        <div id="line_top_x" class="chart-flexible"></div>
        </div>
        </div>

      <!------------------------------------------------>
    </div> <!-------row -------->


    <div class="clearfix"> </div> 


</section> <!-----section ------>
<style>
/*#barchart_values{
    overflow-x: hidden; 
    overflow-y: auto;     
    width:500px;
}*/
</style>
<?php //echo json_encode($jprod_exp_data,JSON_NUMERIC_CHECK); ?>
 <?php //echo json_encode($jprod_exp_data,JSON_NUMERIC_CHECK); ?>
<script type="text/javascript" src="js/google-chart.js"></script>
<script type="text/javascript">
    
    google.charts.load('current', {'packages':['corechart', 'line']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

//      var data2 = new google.visualization.DataTable();
//      data2.addColumn('number', 'Day');
//      data2.addColumn('number', 'Expense');
//      data2.addColumn('number', 'Sales');
//
//      data2.addRows([
//        [1,  37.8, 80.8],
//        [2,  30.9, 69.5],
//        [3,  25.4,  60],
//        [4,  11.7, 18.8],
//        [5,  11.9, 17.6],
//        [6,   8.8, 13.6],
//        [7,   7.6, 12.3],
//        [8,  12.3, 29.2],
//        [9,  16.9, 42.9],
//        [10, 12.8, 30.9],
//        [11,  5.3,  7.9],
//        [12,  6.6,  8.4],
//        [13,  4.8,  6.3],
//        [14,  4.2,  6.2]
//      ]);
var data2 = google.visualization.arrayToDataTable(<?php echo json_encode($jsales_expense_data,JSON_NUMERIC_CHECK); ?>);
	  
        var options2 = {
        /* title: "Expense and Sales Chart",*/
            width: '100%',
            height: '100%',
            backgroundColor:'#424242',
            legend:{textStyle: {color: 'white'}},
            colors:['#ff6714','#ff9001','#ff3a3a'],
            titleTextStyle:{color:'#fff', fontSize:'18' },	
		
            hAxis: {
                textStyle:{color: '#FFF'},
                title:'Duration',
                overflow:'scroll',
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

        var chart2 = new google.visualization.LineChart(document.getElementById('line_top_x'));

        chart2.draw(data2, options2);
	  
//        var data = google.visualization.arrayToDataTable([
//            ["Element", "Ramesh", { role: "style" } ],
//            ["Laptop", 8.94, "#ff6c09"],
//            ["AC", 10.49, "#ff9248"],
//            ["Mobile", 19.30, "#ffb38a"],
//            ["Shirts", 21.45, "#ffd7b5"],
//            ["Laptop", 8.94, "#e34e35"],
//            ["AC", 10.49, "#C4DA87"],
//            ["Mobile", 19.30, "#f4f4ea"],
//            ["Shirts", 21.45, "#ffde77"],
//            ["Laptop", 8.94, "#ff6666"],
//            ["AC", 10.49, "#ff3939"],
//            ["Mobile", 19.30, "#ffdb16"],
//            ["Shirts", 21.45, "#c48a00"],
//            ["Laptop", 8.94, "#e25e00"],
//            ["AC", 10.49, "#ff501f"],
//            ["Mobile", 19.30, "#ffa900"],
//		
//		
//      ]);
        var data = google.visualization.arrayToDataTable(<?php echo json_encode($jprod_exp_data,JSON_NUMERIC_CHECK); ?>);

      var view = new google.visualization.DataView(data);
//      view.setColumns([0, 1,
//        { calc: "stringify",
//            sourceColumn: 1,
//            type: "string",
//            role: "annotation" },
//        2]);
        view.setColumns([0, 1]);

      var options = {
       /* title: "Expense Product Chart",*/
            width: '100%',
            height: (data.getNumberOfRows() >= 12) ? data.getNumberOfRows() * 30 : "100%",
            backgroundColor:'#424242',
            colors:['#ff9248','#202020'],
            titleTextStyle:{color:'#fff', fontSize:'18'},	
            legend:'none',
            chartArea: {top:'15',bottom:'110'},
            hAxis: {
                textStyle:{color: '#FFF'},
//                title:'Amount',
                gridlines: {color:"#424242"},
                titleTextStyle: {color: '#fff'},
                trendlines: {color: '#fff'},
                baselineColor: {color: '#fff'}

            },
            vAxis:{
                textStyle:{color: '#FFF'},
                title:'Name',
                gridlines: {color:"fff"},
                titleTextStyle: {color: '#fff'},
                trendlines: {color:'#fff'},
                baselineColor: {color: '#fff'}
            }
			 
		
			
        };
        var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
        chart.draw(view, options);
	  
        var labels = document.getElementById('barchart_values').querySelectorAll('text[text-anchor=middle]');

        for (var i = 0; i < labels.length; i++) {
 
            var abc = document.getElementById('axis_hide1');
            //labels[i].setAttribute('class', 'stictobottom');
            if(labels[i].innerHTML=='Name'){
            }else{
                var html =abc.innerHTML+'<div>'+labels[i].innerHTML+'</div>';
                abc.innerHTML=html;
                labels[i].innerHTML='';
            }
     
        }
//	$('#barchart_values').scrollTop(150);
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

          $('#config-text').val("$('#demo').daterangepicker(" + JSON.stringify(options, null, '    ') + ", function(start, end, label) {\n  console.log(\"New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')\");\n});");

          $('#date_range').daterangepicker(options, function(start, end, label) { console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')'); });
          
        }

    });
</script>
<!------------ datepicker script --------->
</body>
</html>
