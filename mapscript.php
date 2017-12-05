
<script>
$("#checkbox1").click(function(){
window.location.href = "blankPageLayOut.php";
	
	
});


</script>
<script>
function comcheck(asset_id){
//alert("cls-active"+ " " +asset_id);
//$("cls-active"+asset_id).addClass("active");
$.getJSON("linegraph.php", { id: asset_id }, function(json) {
               var chart;
                 $(document).ready(function(){
                
                    chart = new Highcharts.Chart('container',{
                      
                        chart: {
                            renderTo: 'mygraph',
                            type: 'spline'
                            
                        },
                        title: {
                            text: json[0]['asset_name']
                            
                        },
                        subtitle: {
                            text: ''
                        
                        },
                        xAxis: {
                            categories: json[0]['hour'],
                             title: {
                                text: 'Time(24 hrs Format)'
                            },
                        },
                         yAxis: {
                            title: {
                                text: ''
                            },
                            labels: {
                                formatter: function () {
                                    return this.value + '';
                                }
                            }
                        },
                        tooltip: {
                            crosshairs: true,
                            shared: true
                        },
                        plotOptions: {
                            spline: {
                                marker: {
                                    radius: 4,
                                    lineColor: '#666666',
                                    lineWidth: 1
                                }
                            }
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'top',
                            x: -10,
                            y: 120,
                            borderWidth: 0
                        },
                        series: json
                    });
                });
            
            });



}

</script>
