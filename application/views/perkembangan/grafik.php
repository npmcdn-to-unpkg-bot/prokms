<div id="modal_form_add" class="row">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-header">
                    <i class="icon-search"></i>
                    <h3>Pilih Balita</h3>
            </div>
            <div class="widget-content">
                <form id="cari_balita" class="form-horizontal" action="" method="POST" >
                    <fieldset>
                       <div class="control-group">											
                                <label class="control-label" for="id_balita">Nama Balita</label>
                                <div class="controls">
                                    <select name="id_balita" id="id_balita">
                                        <?php
                                        foreach ($anaks as $v) {
                                        ?>
                                        <option value="<?= $v['id_balita']?>"><?= $v['nama_balita']?></option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                    <span class="spacer">
                                        <button type="submit" class="btn btn-primary" name="cari_balita">OK</button>    
                                </div> <!-- /controls -->				
                        </div> 
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="widget-box">
            <div class="widget-header">
                    <i class="icon-bar-chart"></i>
                    <h3>Grafik Perkembangan</h3>
            </div>
            <div class="widget-content">
                <div id="hc_container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>
        <div class="widget-box">
            <div class="widget-header">
                    <i class="icon-list"></i>
                    <h3>Histori Perkembangan</h3>
            </div>
            <div class="widget-content">
                
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url()?>templates/march/js/Highcharts-4.2.5/js/highcharts.js"></script> 
<script src="<?= base_url()?>templates/march/js/Highcharts-4.2.5/js/highcharts-more.js"></script> 
<script src="<?= base_url()?>templates/march/js/Highcharts-4.2.5/modules/exporting.js"></script> 

<script type="text/javascript">
$(function () {

    var ranges = [
            [1246406400000, 14.3, 27.7],
            [1246492800000, 14.5, 27.8],
            [1246579200000, 15.5, 29.6],
            [1246665600000, 16.7, 30.7],
            [1246752000000, 16.5, 25.0],
            [1246838400000, 17.8, 25.7],
            [1246924800000, 13.5, 24.8],
            [1247011200000, 10.5, 21.4],
            [1247097600000, 9.2, 23.8],
            [1247184000000, 11.6, 21.8],
            [1247270400000, 10.7, 23.7],
            [1247356800000, 11.0, 23.3],
            [1247443200000, 11.6, 23.7],
            [1247529600000, 11.8, 20.7],
            [1247616000000, 12.6, 22.4],
            [1247702400000, 13.6, 19.6],
            [1247788800000, 11.4, 22.6],
            [1247875200000, 13.2, 25.0],
            [1247961600000, 14.2, 21.6],
            [1248048000000, 13.1, 17.1],
            [1248134400000, 12.2, 15.5],
            [1248220800000, 12.0, 20.8],
            [1248307200000, 12.0, 17.1],
            [1248393600000, 12.7, 18.3],
            [1248480000000, 12.4, 19.4],
            [1248566400000, 12.6, 19.9],
            [1248652800000, 11.9, 20.2],
            [1248739200000, 11.0, 19.3],
            [1248825600000, 10.8, 17.8],
            [1248912000000, 11.8, 18.5],
            [1248998400000, 10.8, 16.1]
        ],
        ranges2 = [
            [1246406400000, 8, 14.3],
            [1246492800000, 9, 14.5],
            [1246579200000, 9, 15.5],
            [1246665600000, 9, 16.7],
            [1246752000000, 9, 16.5],
            [1246838400000, 9, 11],
            [1246924800000, 9, 11],
            [1247011200000, 10.5, 21.4],
            [1247097600000, 9.2, 23.8],
            [1247184000000, 11.6, 21.8],
            [1247270400000, 10.7, 23.7],
            [1247356800000, 11.0, 23.3],
            [1247443200000, 11.6, 23.7],
            [1247529600000, 11.8, 20.7],
            [1247616000000, 12.6, 22.4],
            [1247702400000, 13.6, 19.6],
            [1247788800000, 11.4, 22.6],
            [1247875200000, 13.2, 25.0],
            [1247961600000, 14.2, 21.6],
            [1248048000000, 13.1, 17.1],
            [1248134400000, 12.2, 15.5],
            [1248220800000, 12.0, 20.8],
            [1248307200000, 12.0, 17.1],
            [1248393600000, 12.7, 18.3],
            [1248480000000, 12.4, 19.4],
            [1248566400000, 12.6, 19.9],
            [1248652800000, 11.9, 20.2],
            [1248739200000, 11.0, 19.3],
            [1248825600000, 10.8, 17.8],
            [1248912000000, 11.8, 18.5],
            [1248998400000, 10.8, 16.1]
        ],
        averages = [
            [1246406400000, 21.5],
            [1246492800000, 22.1],
            [1246579200000, 23],
            [1246665600000, 23.8],
            [1246752000000, 21.4],
            [1246838400000, 21.3],
            [1246924800000, 18.3],
            [1247011200000, 15.4]
        ];


    $('#hc_container').highcharts({

        title: {
            text: 'Grafik Perkembangan'
        },

        xAxis: {
            text: 'Umur Balita (Bulan)',
            type: 'datetime'
        },

        yAxis: {
            title: {
                text: 'Berat Badan'
            }
        },

        tooltip: {
            crosshairs: true,
            shared: true,
            valueSuffix: '°C'
        },

        legend: {
        },

        series: [{
            name: 'Temperature',
            data: averages,
            zIndex: 2,
            marker: {
                fillColor: 'white',
                lineWidth: 2,
                lineColor: Highcharts.getOptions().colors[0]
            }
        }, {
            name: 'Range',
            data: ranges,
            type: 'arearange',
            lineWidth: 0,
            linkedTo: ':previous',
            color: Highcharts.getOptions().colors[0],
            fillOpacity: 0.3,
            zIndex: 1
        },
        {
            name: 'Range2',
            data: ranges2,
            type: 'arearange',
            lineWidth: 0,
            linkedTo: ':previous',
            color: Highcharts.getOptions().colors[1],
            fillOpacity: 0.3,
            zIndex: 0
        }]
    });
});
</script>