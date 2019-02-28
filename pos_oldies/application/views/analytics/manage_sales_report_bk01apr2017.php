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
        <form>
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
                        <option value="1"> Daily  </option>
                        <option value="2"> Weekly </option>
                        <option value="3"> Monthly </option>
                    </select>
                </div>
            </div>   

            <div class="col-md-2 col-sm-2 col-xs-5">
                <button class="btn btn-success top-space" type="button">Go</button>
            </div>
        </form>  
        <div class="clearfix"> </div> 

        <div class="col-sm-6"> 
            <div class="chart-wrap">
                <div id="barchart_values" class="chart-flexible"></div>
            </div>
        </div>

        <div class="col-sm-6"> 
            <div class="chart-wrap">
                <div id="barchart_values2" class="chart-flexible"></div>
            </div>
        </div>

        <div class="col-sm-6"> 
            <div class="chart-wrap">
                <div id="barchart_values3" class="chart-flexible"></div>
            </div>
        </div>


    </div> 
</section>   
<div class="clearfix"> </div> 
     
<script type="text/javascript" src="js/google-chart.js"></script>

<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Element", "Ramesh", { role: "style" } ],
            ["Suresh", 8.94, "#ff6c09"],
            ["Ramesh", 10.49, "#ff9248"],
            ["Mahesh", 19.30, "#ffb38a"],
            ["Dinesh", 21.45, "#ffd7b5"],
            ["Suresh", 8.94, "#ffa900"],
            ["Ramesh", 10.49, "#ff501f"],
            ["Mahesh", 19.30, "#e25e00"],
            ["Dinesh", 21.45,  "#c48a00"],
            ["Suresh", 8.94, "#ffdb16"],
            ["Ramesh", 10.49, "#ff3939"],
            ["Mahesh", 19.30, "#ff6666"],
            ["Dinesh", 21.45, "#ffde77"],
            ["Suresh", 8.94, "#f4f4ea"],
            ["Ramesh", 10.49, "#C4DA87"],
            ["Mahesh", 19.30, "#e34e35"],
        ]);

        var data1 = google.visualization.arrayToDataTable([
            ["Element", "Ramesh", { role: "style" } ],
            ["Laptop", 8.94, "#ff6c09"],
            ["AC", 10.49, "#ff9248"],
            ["Mobile", 19.30, "#ffb38a"],
            ["Shirts", 21.45, "#ffd7b5"],
            ["Laptop", 8.94, "#e34e35"],
            ["AC", 10.49, "#C4DA87"],
            ["Mobile", 19.30, "#f4f4ea"],
            ["Shirts", 21.45, "#ffde77"],
            ["Laptop", 8.94, "#ff6666"],
            ["AC", 10.49, "#ff3939"],
            ["Mobile", 19.30, "#ffdb16"],
            ["Shirts", 21.45, "#c48a00"],
            ["Laptop", 8.94, "#e25e00"],
            ["AC", 10.49, "#ff501f"],
            ["Mobile", 19.30, "#ffa900"],

        ]);

        var data2 = google.visualization.arrayToDataTable([
            ["Element", "Ramesh", { role: "style" } ],
            ["Nokia", 8.94, "#ff6c09"],
            ["t-shirts", 10.49, "#ff9248"],
            ["Goggles", 19.30, "#ffb38a"],
            ["Watches", 21.45, "#ffd7b5"],
            ["Nokia", 8.94, "#e34e35"],
            ["t-shirts", 10.49, "#C4DA87"],
            ["Goggles", 19.30, "#f4f4ea"],
            ["Watches", 21.45, "#ffde77"],
            ["Nokia", 8.94, "#ff6666"],
            ["t-shirts", 10.49, "#ff3939"],
            ["Goggles", 19.30, "#ffdb16"],
            ["Watches", 21.45, "#c48a00"],
            ["Nokia", 8.94, "#e25e00"],
            ["t-shirts", 10.49, "#ff501f"],
            ["Goggles", 19.30, "#ffa900"],

        ]);
        
        var view = new google.visualization.DataView(data);
        var view1 = new google.visualization.DataView(data1);
        var view2 = new google.visualization.DataView(data2);
        view.setColumns([0, 1,
        { calc: "stringify",
           sourceColumn: 1,
           type: "string",
           role: "annotation" },
         2]);

        view1.setColumns([0, 1,
        { calc: "stringify",
           sourceColumn: 1,
           type: "string",
           role: "annotation" },
        2]);

        view2.setColumns([0, 1,
        { calc: "stringify",
           sourceColumn: 1,
           type: "string",
           role: "annotation" },
         2]);

        var options = {
            title: "Employee chart",
            width: '100%',
            height: '100%',
            backgroundColor:'#424242',
            colors:['#ff9248','#202020'],
            titleTextStyle:{color:'#fff', fontSize:'18'},	
            legend:'none',
            hAxis: {
                textStyle:{color: '#FFF'},
                title:'Amount',
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
                baselineColor: {color: '#fff'},
            }

        };

        var options1 = {
            title: "Product chart",
            width: '100%',
            height: '100%',
            backgroundColor:'#424242',
            colors:['#ff9248','#202020'],
            titleTextStyle:{color:'#fff', fontSize:'18'},
            legend:'none',
                hAxis: {
                      textStyle:{color: '#FFF'},
                      title:'Amount',
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
                      baselineColor: {color: '#fff'},
                }

        };

        var options2 = {
            title: "Category chart",
            width: '100%',
            height: '100%',
            backgroundColor:'#424242',
            colors:['#ff9248','#202020'],
            titleTextStyle:{color:'#fff', fontSize:'18'},
            legend:'none',
                hAxis: {
                    textStyle:{color: '#FFF'},
                    title:'Amount',
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
                    baselineColor: {color: '#fff'},
                }

        };
        var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
        chart.draw(view, options);

        var chart = new google.visualization.BarChart(document.getElementById("barchart_values2"));
        chart.draw(view1, options1);
        
        var chart = new google.visualization.BarChart(document.getElementById("barchart_values3"));
        chart.draw(view2, options2);
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
