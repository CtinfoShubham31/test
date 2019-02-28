<section class="content-header">
    <h1>Sales report</h1>
      
      <!---------------------------- menu path link for admin -------------------->
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Sales report </li>
    </ol>
      <!---------------------------- menu path link for admin end -------------------->
</section>

<section class="content">
    <div class="row">
        <form name="sales_report" method="post">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <label> Select date range</label>
                <div class="form-group input-group date">
                    <input type="text" id="date_range" name="date_range" class="form-control sign-control" placeholder="select date range">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div> 
            
<!--            <div class="col-md-3 col-sm-4 col-xs-7"> 
                <div class="form-group">
                    <label> Select Interval</label>
                    <select class="form-control sign-control" name="select_interval" id="select_interval">
                        <option value="1"> Daily  </option>
                        <option value="2"> Weekly </option>
                        <option value="3"> Monthly </option>
                    </select>
                </div>
            </div>   -->

            <div class="col-md-2 col-sm-2 col-xs-5">
                <button class="btn btn-success top-space" type="submit">Go</button>
            </div>
        </form>  
        <div class="clearfix"> </div> 

        <div class="col-sm-6"> 
            <div class="box-header line-none">
                <h3 class="box-title"> Employee Chart </h3>
            </div> 
            <div class="chart-wrap">
                <div id="barchart_values" class="chart-flexible" style="max-height:400px; overflow-y:scroll;overflow-x:hidden"></div>
                <div id="axis_hide1" class="chart-fix"> </div>
                <div style="width:100%; text-align:center; z-index:99999; position:absolute; bottom:20px;"> Amount </div>
            </div>
        </div>

        <div class="col-sm-6"> 
            <div class="box-header line-none">
                <h3 class="box-title"> Product chart </h3>
            </div> 
            <div class="chart-wrap">
                <div id="barchart_values2" class="chart-flexible" style="max-height:400px; overflow-y:scroll;overflow-x:hidden"></div>
                <div id="axis_hide2" class="chart-fix"> </div>
                <div style="width:100%; text-align:center; z-index:99999; position:absolute; bottom:20px;"> Amount </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="box-header line-none">
                <h3 class="box-title"> Category chart </h3>
                
            </div>
            <div class="chart-wrap">
                <div id="barchart_values3" class="chart-flexible" style="max-height:400px; overflow-y:scroll;overflow-x:hidden"></div>
                <div id="axis_hide3" class="chart-fix"> </div>
                <div style="width:100%; text-align:center; z-index:99999; position:absolute; bottom:20px;"> Amount </div>
            </div>
        </div>


    </div> 
</section>   
<div class="clearfix"> </div> 
<style>
/*#barchart_values2{
    overflow-x: hidden; 
    overflow-y: auto;     
    width:500px;
}
#barchart_values3{
    overflow-x: hidden; 
    overflow-y: auto;     
    width:500px;
}

#barchart_values{
    overflow-x: hidden; 
    overflow-y: auto;     
    width:500px;
}*/
</style>
<?php //echo json_encode($jcat_data,JSON_NUMERIC_CHECK); ?>
<script type="text/javascript" src="js/google-chart.js"></script>

<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

        var data = google.visualization.arrayToDataTable(<?php echo json_encode($jemp_data,JSON_NUMERIC_CHECK); ?>); 
        var data1 = google.visualization.arrayToDataTable(<?php echo json_encode($jprod_data,JSON_NUMERIC_CHECK); ?>); 
        var data2 = google.visualization.arrayToDataTable(<?php echo json_encode($jcat_data,JSON_NUMERIC_CHECK); ?>);

        
        var view = new google.visualization.DataView(data);
        var view1 = new google.visualization.DataView(data1);
        var view2 = new google.visualization.DataView(data2);
        
        view.setColumns([0, 1]);

        view1.setColumns([0, 1]);

        view2.setColumns([0, 1]);


        var options = {
//            title: "Employee chart",
            width: '100%',
            height: (data.getNumberOfRows() >= 12) ? data.getNumberOfRows() * 30 : "100%",
            backgroundColor:'#424242',
            colors:['#ff9248','#202020'],
            titleTextStyle:{color:'#fff', fontSize:'18'},	
            legend:'none',
            chartArea: {top:'15',bottom:'110'},
            hAxis: {
                textStyle:{color: '#FFF'},
                //title:'Amount',
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
//alert(data1.getNumberOfRows());
        var options1 = {
//            title: "Product chart",
            width: '100%',
            height: (data1.getNumberOfRows() >= 12) ? data1.getNumberOfRows() * 30 : "100%",
            backgroundColor:'#424242',
            colors:['#ff9248','#202020'],
            titleTextStyle:{color:'#fff', fontSize:'18'},
            legend:'none',
            chartArea: {top:'15',bottom:'110'},
                hAxis: {
                    textStyle:{color: '#FFF'},
                    //title:'Amount',
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

        var options2 = {
//            title: "Category chart",
            width: '100%',
            height: (data2.getNumberOfRows() >= 12) ? data2.getNumberOfRows() * 30 : "100%",
            backgroundColor:'#424242',
            colors:['#ff9248','#202020'],
            titleTextStyle:{color:'#fff', fontSize:'18'},
            legend:'none',
            chartArea: {top:'15',bottom:'110'},
                hAxis: {
                    textStyle:{color: '#FFF'},
                    //title:'Amount',
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

            }
            else{
                var html =abc.innerHTML+'<div>'+labels[i].innerHTML+'</div>';
                abc.innerHTML=html;
                labels[i].innerHTML='';
            }

        }

        var chart = new google.visualization.BarChart(document.getElementById("barchart_values2"));
        chart.draw(view1, options1);
        
        var labels = document.getElementById('barchart_values2').querySelectorAll('text[text-anchor=middle]');

        for (var i = 0; i < labels.length; i++) {

            var abc = document.getElementById('axis_hide2');
                //labels[i].setAttribute('class', 'stictobottom');
            if(labels[i].innerHTML=='Name'){}else{
            var html =abc.innerHTML+'<div>'+labels[i].innerHTML+'</div>';
            abc.innerHTML=html;
            labels[i].innerHTML='';}

        }
        
        var chart = new google.visualization.BarChart(document.getElementById("barchart_values3"));
        chart.draw(view2, options2);
        
        var labels = document.getElementById('barchart_values3').querySelectorAll('text[text-anchor=middle]');

        for (var i = 0; i < labels.length; i++) {

            var abc = document.getElementById('axis_hide3');
                //labels[i].setAttribute('class', 'stictobottom');
            if(labels[i].innerHTML=='Name'){}else{
            var html =abc.innerHTML+'<div>'+labels[i].innerHTML+'</div>';
            abc.innerHTML=html;
            labels[i].innerHTML='';}

        }
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
