
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
                
                    chart = new Highcharts.Chart({
                        chart: {
                            renderTo: 'mygraph',
                            type: 'line'
                            
                        },
                        title: {
                            text: 'Line Graph'
                            
                        },
                        subtitle: {
                            text: 'Frequency'
                        
                        },
                        xAxis: {
                            categories: json[0]['hour'],
                             title: {
                                text: 'Time(24 hrs Format)'
                            },
                        },
                        yAxis: {
                            title: {
                                text: 'Frequency'
                            },
                            plotLines: [{
                                value: 0,
                                width: 1,
                                color: '#808080'
                            }]
                        },
                        tooltip: {
                            formatter: function() {
                                    return '<b>'+ this.series.name +'</b><br/>'+
                                    this.x +': '+ this.y;
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
