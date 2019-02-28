<!DOCTYPE html>
<html>

<?php
include('service.php');
?>
<link rel="stylesheet" href="http://localhost/kaseidon/css/dx.spa.css"> 
<link rel="stylesheet" href="http://localhost/kaseidon/css/dx.common.css"> 
<link rel="stylesheet" href="http://localhost/kaseidon/css/dx.light.css">
<!--<link rel="stylesheet" href="http://localhost/kaseidon/css/custom.css">-->
<script type="text/javascript" src="http://localhost/kaseidon/js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="http://localhost/kaseidon/js/dx.all.js"></script>



<!-- select funct -->
<script type="text/javascript">   
 $(function() { 
   var schedulerDataSource = new DevExpress.data.DataSource({

        paginate: false,
        load: function(loadOptions) {
            var d = $.Deferred(),
                params = {};
            if("filter" in loadOptions && isNotEmpty(loadOptions["filter"])) 
                params[i] = JSON.stringify(loadOptions[i]);       
            return data;
        },
    });           
    
    $("#scheduler").dxScheduler({         
        views: ["timelineDay", "timelineWeek", "timelineMonth"],
        currentView: "timelineDay",
        currentDate: new Date(),
        firstDayOfWeek: 0,
        startDayHour: 8,
        endDayHour: 20,
        cellDuration: 60,
        width: "100%",
        height: 580
    });

    setTimeout(function() {
    // Computing start and end hour
        var startDayHour = 24,
        endDayHour = 0;
        data.forEach(function(item) {
      // Start
        console.log(item);
        if (item.startDate.getHours() < startDayHour) {
          startDayHour = item.startDate.getHours();
        }
      // End
        if (item.endDate.getHours() >= endDayHour) {
          endDayHour = item.endDate.getMinutes() > 0
            ? item.endDate.getHours() + 1
            : item.endDate.getHours();
        }
    });
    
    var scheduler = $("#scheduler").dxScheduler("instance").option({
        dataSource: schedulerDataSource,
        startDayHour: startDayHour,
        /*  remoteFiltering: true,*/
        endDayHour: endDayHour,
        groups: ["priority"],
        resources: [       
            {
                fieldExpr: "priority",
                allowMultiple: false,
                dataSource: priorityData,
                label: "Module name"
            }
        ]
    });
    setTimeout(function() {
      console.log("Repainting");
      $("#scheduler").dxScheduler("instance").repaint();
    }, 5000);
  }, 5000);
});
var priorityData = <?php echo $item;?>;
var data = <?php echo $data;?>;
var da = [];
var myarray=[];
$.each(data, function(key, val) {
    var arr = {   
      'id': val.id, 
      'text' : val.text,
      'startDate' :new Date(val.startDate),
      'endDate' : new Date(val.endDate),
      'priority' : parseInt(val.priority) ,
      'description' : val.description,

    }      
    myarray.push(arr);                
});   
data = myarray;
//console.log(data);   
</script>


<body>
<h1>Calender Enter</h1>
<div class="dx-viewport demo-container">
  <div id="scheduler"></div>
</div>
</body>
</html>