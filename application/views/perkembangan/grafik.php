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
                                        <button type="submit" class="btn btn-primary" name="cari_balita" value="ok">OK</button>    
                                </div> <!-- /controls -->				
                        </div> 
                    </fieldset>
                </form>
            </div>
        </div>
        <br>
        <div class="widget-box">
            <div class="widget-header">
                    <i class="icon-bar-chart"></i>
                    <h3>Grafik Perkembangan</h3>
            </div>
            
            <div class="widget-content">
                <div class="span5">
                    <p>Nama: <?= $r_anak['nama_balita']?></p>
                    <p>Tanggal Lahir: <?= $r_anak['tanggal_lahir']?></p>
                    <p>Kelamin: <?= $r_anak['kelamin']?></p>
                    <p>Berat Lahir: <?= $r_anak['berat_lahir']?> KG   Panjang Lahir: <?= $r_anak['tinggi_lahir']?> CM</p>
                </div>
                    
                <div class="span5">
                    <p>Nama Orang Tua: <?= $r_anak['nama_ortu']?></p>
                    <p>Alamat: <?= $r_anak['alamat']?></p>
                    <p>Telefon: <?= $r_anak['no_hp']?></p>
                </div>
                    
                <div id="hc_container"></div>
            </div>
        </div>
        <br/>
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
    var r_anak = <?= json_encode($r_anak)?>;
    var rs_pkb = <?= json_encode($rs_pkb == NULL ? array():$rs_pkb,JSON_NUMERIC_CHECK)?>;
    var z_boy_1 =   [   
                    [0, 2.1, 2.5],
                    [1, 2.9, 3.4],
                    [2, 3.8, 4.3],
                    [3, 4.4, 5],
                    [4, 4.9, 5.6],
                    [5, 5.3, 6],
                    [6, 5.7, 6.4],
                    [7, 5.9, 6.7],
                    [8, 6.2, 6.9],
                    [9, 6.4, 7.1],
                    [10, 6.6, 7.4],
                    [11, 6.8, 7.6],
                    [12, 6.9, 7.7],
                    [13, 7.1, 7.9],
                    [14, 7.2, 8.1],
                    [15, 7.4, 8.3],
                    [16, 7.5, 8.4],
                    [17, 7.7, 8.6],
                    [18, 7.8, 8.8],
                    [19, 8, 8.9],
                    [20, 8.1, 9.1],
                    [21, 8.2, 9.2],
                    [22, 8.4, 9.4],
                    [23, 8.5, 9.5],
                    [24, 8.6, 9.7],
                    [25, 8.8, 9.8],
                    [26, 8.9, 10],
                    [27, 9, 10.1],
                    [28, 9.1, 10.2],
                    [29, 9.2, 10.4],
                    [30, 9.4, 10.5],
                    [31, 9.5, 10.7],
                    [32, 9.6, 10.8],
                    [33, 9.7, 10.9],
                    [34, 9.8, 11],
                    [35, 9.9, 11.2],
                    [36, 10, 11.3],
                    [37, 10.1, 11.4],
                    [38, 10.2, 11.5],
                    [39, 10.3, 11.6],
                    [40, 10.4, 11.8],
                    [41, 10.5, 11.9],
                    [42, 10.6, 12],
                    [43, 10.7, 12.1],
                    [44, 10.8, 12.2],
                    [45, 10.9, 12.4],
                    [46, 11, 12.5],
                    [47, 11.1, 12.6],
                    [48, 11.2, 12.7],
                    [49, 11.3, 12.8],
                    [50, 11.4, 12.9],
                    [51, 11.5, 13.1],
                    [52, 11.6, 13.2],
                    [53, 11.7, 13.3],
                    [54, 11.8, 13.4],
                    [55, 11.9, 13.5],
                    [56, 12, 13.6],
                    [57, 12.1, 13.7],
                    [58, 12.2, 13.8],
                    [59, 12.3, 14],
                    [60, 12.4, 14.1]
        ],
        z_boy_2 = [
                    [0, 2.5, 2.9],
                    [1, 3.4, 3.9],
                    [2, 4.3, 4.9],
                    [3, 5, 5.7],
                    [4, 5.6, 6.2],
                    [5, 6, 6.7],
                    [6, 6.4, 7.1],
                    [7, 6.7, 7.4],
                    [8, 6.9, 7.7],
                    [9, 7.1, 8],
                    [10, 7.4, 8.2],
                    [11, 7.6, 8.4],
                    [12, 7.7, 8.6],
                    [13, 7.9, 8.8],
                    [14, 8.1, 9],
                    [15, 8.3, 9.2],
                    [16, 8.4, 9.4],
                    [17, 8.6, 9.6],
                    [18, 8.8, 9.8],
                    [19, 8.9, 10],
                    [20, 9.1, 10.1],
                    [21, 9.2, 10.3],
                    [22, 9.4, 10.5],
                    [23, 9.5, 10.7],
                    [24, 9.7, 10.8],
                    [25, 9.8, 11],
                    [26, 10, 11.2],
                    [27, 10.1, 11.3],
                    [28, 10.2, 11.5],
                    [29, 10.4, 11.7],
                    [30, 10.5, 11.8],
                    [31, 10.7, 12],
                    [32, 10.8, 12.1],
                    [33, 10.9, 12.3],
                    [34, 11, 12.4],
                    [35, 11.2, 12.6],
                    [36, 11.3, 12.7],
                    [37, 11.4, 12.9],
                    [38, 11.5, 13],
                    [39, 11.6, 13.1],
                    [40, 11.8, 13.3],
                    [41, 11.9, 13.4],
                    [42, 12, 13.6],
                    [43, 12.1, 13.7],
                    [44, 12.2, 13.8],
                    [45, 12.4, 14],
                    [46, 12.5, 14.1],
                    [47, 12.6, 14.3],
                    [48, 12.7, 14.4],
                    [49, 12.8, 14.5],
                    [50, 12.9, 14.7],
                    [51, 13.1, 14.8],
                    [52, 13.2, 15],
                    [53, 13.3, 15.1],
                    [54, 13.4, 15.2],
                    [55, 13.5, 15.4],
                    [56, 13.6, 15.5],
                    [57, 13.7, 15.6],
                    [58, 13.8, 15.8],
                    [59, 14, 15.9],
                    [60, 14.1, 16]
        ],
        z_boy_3 = [
                    [0, 2.9, 3.3],
                    [1, 3.9, 4.5],
                    [2, 4.9, 5.6],
                    [3, 5.7, 6.4],
                    [4, 6.2, 7],
                    [5, 6.7, 7.5],
                    [6, 7.1, 7.9],
                    [7, 7.4, 8.3],
                    [8, 7.7, 8.6],
                    [9, 8, 8.9],
                    [10, 8.2, 9.2],
                    [11, 8.4, 9.4],
                    [12, 8.6, 9.6],
                    [13, 8.8, 9.9],
                    [14, 9, 10.1],
                    [15, 9.2, 10.3],
                    [16, 9.4, 10.5],
                    [17, 9.6, 10.7],
                    [18, 9.8, 10.9],
                    [19, 10, 11.1],
                    [20, 10.1, 11.3],
                    [21, 10.3, 11.5],
                    [22, 10.5, 11.8],
                    [23, 10.7, 12],
                    [24, 10.8, 12.2],
                    [25, 11, 12.4],
                    [26, 11.2, 12.5],
                    [27, 11.3, 12.7],
                    [28, 11.5, 12.9],
                    [29, 11.7, 13.1],
                    [30, 11.8, 13.3],
                    [31, 12, 13.5],
                    [32, 12.1, 13.7],
                    [33, 12.3, 13.8],
                    [34, 12.4, 14],
                    [35, 12.6, 14.2],
                    [36, 12.7, 14.3],
                    [37, 12.9, 14.5],
                    [38, 13, 14.7],
                    [39, 13.1, 14.8],
                    [40, 13.3, 15],
                    [41, 13.4, 15.2],
                    [42, 13.6, 15.3],
                    [43, 13.7, 15.5],
                    [44, 13.8, 15.7],
                    [45, 14, 15.8],
                    [46, 14.1, 16],
                    [47, 14.3, 16.2],
                    [48, 14.4, 16.3],
                    [49, 14.5, 16.5],
                    [50, 14.7, 16.7],
                    [51, 14.8, 16.8],
                    [52, 15, 17],
                    [53, 15.1, 17.2],
                    [54, 15.2, 17.3],
                    [55, 15.4, 17.5],
                    [56, 15.5, 17.7],
                    [57, 15.6, 17.8],
                    [58, 15.8, 18],
                    [59, 15.9, 18.2],
                    [60, 16, 18.3] 
            ],
        z_boy_4 = [
                    [0, 3.3, 3.9],
                    [1, 4.5, 5.1],
                    [2, 5.6, 6.3],
                    [3, 6.4, 7.2],
                    [4, 7, 7.8],
                    [5, 7.5, 8.4],
                    [6, 7.9, 8.8],
                    [7, 8.3, 9.2],
                    [8, 8.6, 9.6],
                    [9, 8.9, 9.9],
                    [10, 9.2, 10.2],
                    [11, 9.4, 10.5],
                    [12, 9.6, 10.8],
                    [13, 9.9, 11],
                    [14, 10.1, 11.3],
                    [15, 10.3, 11.5],
                    [16, 10.5, 11.7],
                    [17, 10.7, 12],
                    [18, 10.9, 12.2],
                    [19, 11.1, 12.5],
                    [20, 11.3, 12.7],
                    [21, 11.5, 12.9],
                    [22, 11.8, 13.2],
                    [23, 12, 13.4],
                    [24, 12.2, 13.6],
                    [25, 12.4, 13.9],
                    [26, 12.5, 14.1],
                    [27, 12.7, 14.3],
                    [28, 12.9, 14.5],
                    [29, 13.1, 14.8],
                    [30, 13.3, 15],
                    [31, 13.5, 15.2],
                    [32, 13.7, 15.4],
                    [33, 13.8, 15.6],
                    [34, 14, 15.8],
                    [35, 14.2, 16],
                    [36, 14.3, 16.2],
                    [37, 14.5, 16.4],
                    [38, 14.7, 16.6],
                    [39, 14.8, 16.8],
                    [40, 15, 17],
                    [41, 15.2, 17.2],
                    [42, 15.3, 17.4],
                    [43, 15.5, 17.6],
                    [44, 15.7, 17.8],
                    [45, 15.8, 18],
                    [46, 16, 18.2],
                    [47, 16.2, 18.4],
                    [48, 16.3, 18.6],
                    [49, 16.5, 18.8],
                    [50, 16.7, 19],
                    [51, 16.8, 19.2],
                    [52, 17, 19.4],
                    [53, 17.2, 19.6],
                    [54, 17.3, 19.8],
                    [55, 17.5, 20],
                    [56, 17.7, 20.2],
                    [57, 17.8, 20.4],
                    [58, 18, 20.6],
                    [59, 18.2, 20.8],
                    [60, 18.3, 21]
            ],
        z_boy_5 = [
                    [0, 3.9, 4.4],
                    [1, 5.1, 5.8],
                    [2, 6.3, 7.1],
                    [3, 7.2, 8],
                    [4, 7.8, 8.7],
                    [5, 8.4, 9.3],
                    [6, 8.8, 9.8],
                    [7, 9.2, 10.3],
                    [8, 9.6, 10.7],
                    [9, 9.9, 11],
                    [10, 10.2, 11.4],
                    [11, 10.5, 11.7],
                    [12, 10.8, 12],
                    [13, 11, 12.3],
                    [14, 11.3, 12.6],
                    [15, 11.5, 12.8],
                    [16, 11.7, 13.1],
                    [17, 12, 13.4],
                    [18, 12.2, 13.7],
                    [19, 12.5, 13.9],
                    [20, 12.7, 14.2],
                    [21, 12.9, 14.5],
                    [22, 13.2, 14.7],
                    [23, 13.4, 15],
                    [24, 13.6, 15.3],
                    [25, 13.9, 15.5],
                    [26, 14.1, 15.8],
                    [27, 14.3, 16.1],
                    [28, 14.5, 16.3],
                    [29, 14.8, 16.6],
                    [30, 15, 16.9],
                    [31, 15.2, 17.1],
                    [32, 15.4, 17.4],
                    [33, 15.6, 17.6],
                    [34, 15.8, 17.8],
                    [35, 16, 18.1],
                    [36, 16.2, 18.3],
                    [37, 16.4, 18.6],
                    [38, 16.6, 18.8],
                    [39, 16.8, 19],
                    [40, 17, 19.3],
                    [41, 17.2, 19.5],
                    [42, 17.4, 19.7],
                    [43, 17.6, 20],
                    [44, 17.8, 20.2],
                    [45, 18, 20.5],
                    [46, 18.2, 20.7],
                    [47, 18.4, 20.9],
                    [48, 18.6, 21.2],
                    [49, 18.8, 21.4],
                    [50, 19, 21.7],
                    [51, 19.2, 21.9],
                    [52, 19.4, 22.2],
                    [53, 19.6, 22.4],
                    [54, 19.8, 22.7],
                    [55, 20, 22.9],
                    [56, 20.2, 23.2],
                    [57, 20.4, 23.4],
                    [58, 20.6, 23.7],
                    [59, 20.8, 23.9],
                    [60, 21, 24.2]
            ],
        z_boy_6 = [
                    [0, 4.4, 5],
                    [1, 5.8, 6.6],
                    [2, 7.1, 8],
                    [3, 8, 9],
                    [4, 8.7, 9.7],
                    [5, 9.3, 10.4],
                    [6, 9.8, 10.9],
                    [7, 10.3, 11.4],
                    [8, 10.7, 11.9],
                    [9, 11, 12.3],
                    [10, 11.4, 12.7],
                    [11, 11.7, 13],
                    [12, 12, 13.3],
                    [13, 12.3, 13.7],
                    [14, 12.6, 14],
                    [15, 12.8, 14.3],
                    [16, 13.1, 14.6],
                    [17, 13.4, 14.9],
                    [18, 13.7, 15.3],
                    [19, 13.9, 15.6],
                    [20, 14.2, 15.9],
                    [21, 14.5, 16.2],
                    [22, 14.7, 16.5],
                    [23, 15, 16.8],
                    [24, 15.3, 17.1],
                    [25, 15.5, 17.5],
                    [26, 15.8, 17.8],
                    [27, 16.1, 18.1],
                    [28, 16.3, 18.4],
                    [29, 16.6, 18.7],
                    [30, 16.9, 19],
                    [31, 17.1, 19.3],
                    [32, 17.4, 19.6],
                    [33, 17.6, 19.9],
                    [34, 17.8, 20.2],
                    [35, 18.1, 20.4],
                    [36, 18.3, 20.7],
                    [37, 18.6, 21],
                    [38, 18.8, 21.3],
                    [39, 19, 21.6],
                    [40, 19.3, 21.9],
                    [41, 19.5, 22.1],
                    [42, 19.7, 22.4],
                    [43, 20, 22.7],
                    [44, 20.2, 23],
                    [45, 20.5, 23.3],
                    [46, 20.7, 23.6],
                    [47, 20.9, 23.9],
                    [48, 21.2, 24.2],
                    [49, 21.4, 24.5],
                    [50, 21.7, 24.8],
                    [51, 21.9, 25.1],
                    [52, 22.2, 25.4],
                    [53, 22.4, 25.7],
                    [54, 22.7, 26],
                    [55, 22.9, 26.3],
                    [56, 23.2, 26.6],
                    [57, 23.4, 26.9],
                    [58, 23.7, 27.2],
                    [59, 23.9, 27.6],
                    [60, 24.2, 27.9]  
            ]
        ;


    $('#id_balita').val(r_anak.id_balita);
    
//    detect anak laki dan perempuan
    if(r_anak.kelamin == 'laki-laki')
    {
        var vc = ['#ff1a1a','#2CB806','#7FF25A','#ff0066'];
        
        var vseries = [
        {
            name: 'Berat Timbangan',
            data: rs_pkb,
            zIndex: 7,
            marker: {
                fillColor: 'white',
                lineWidth: 1,
                lineColor: Highcharts.getOptions().colors[0]
            }
        },    
        {
            name: 'Gizi Kurang',
            data: z_boy_1,
            type: 'arearange',
            lineWidth: 0,
            color: Highcharts.getOptions().colors[3],
            fillOpacity: 0.6,
            zIndex: 1
        },
        {
            name: 'Gizi Baik',
            data: z_boy_2,
            type: 'arearange',
            lineWidth: 0,
            color: Highcharts.getOptions().colors[2],
            fillOpacity: 0.6,
            zIndex: 2
        },
        {
            name: 'Gizi Baik',
            data: z_boy_3,
            type: 'arearange',
            linkedTo: ':previous',
            lineWidth: 0,
            color: Highcharts.getOptions().colors[1],
            fillOpacity: 0.6,
            zIndex: 3
        },
        {
            name: 'Gizi Baik',
            data: z_boy_4,
            type: 'arearange',
            linkedTo: ':previous',
            lineWidth: 0,
            color: Highcharts.getOptions().colors[1],
            fillOpacity: 0.6,
            zIndex: 4
        },
        {
            name: 'Gizi Baik',
            data: z_boy_5,
            type: 'arearange',
            linkedTo: ':previous',
            lineWidth: 0,
            color: Highcharts.getOptions().colors[2],
            fillOpacity: 0.6,
            zIndex: 5
        },
        {
            name: 'Gizi Lebih',
            data: z_boy_6,
            type: 'arearange',
            lineWidth: 0,
            color: Highcharts.getOptions().colors[3],
            fillOpacity: 0.6,
            zIndex: 6
        }
        ];
    }
    else
    {
        var vc = ['#ff1a1a','#2CB806','#7FF25A','#EDA405'];
                
        var vseries = [
        {
            name: 'Berat Timbangan',
            data: rs_pkb,
            zIndex: 7,
            marker: {
                fillColor: 'white',
                lineWidth: 1,
                lineColor: vc[0]
            }
        },    
        {
            name: 'Gizi Kurang',
            data: z_boy_1,
            type: 'arearange',
            lineWidth: 0,
            color: vc[3],
            fillOpacity: 0.6,
            zIndex: 1
        },
        {
            name: 'Gizi Baik',
            data: z_boy_2,
            type: 'arearange',
            lineWidth: 0,
            color: vc[2],
            fillOpacity: 0.6,
            zIndex: 2
        },
        {
            name: 'Gizi Baik',
            data: z_boy_3,
            type: 'arearange',
            linkedTo: ':previous',
            lineWidth: 0,
            color: vc[1],
            fillOpacity: 0.6,
            zIndex: 3
        },
        {
            name: 'Gizi Baik',
            data: z_boy_4,
            type: 'arearange',
            linkedTo: ':previous',
            lineWidth: 0,
            color: vc[1],
            fillOpacity: 0.6,
            zIndex: 4
        },
        {
            name: 'Gizi Baik',
            data: z_boy_5,
            type: 'arearange',
            linkedTo: ':previous',
            lineWidth: 0,
            color: vc[2],
            fillOpacity: 0.6,
            zIndex: 5
        },
        {
            name: 'Gizi Lebih',
            data: z_boy_6,
            type: 'arearange',
            lineWidth: 0,
            color: vc[3],
            fillOpacity: 0.6,
            zIndex: 6
        }
        ];

    }
    
    $('#hc_container').highcharts({

        title: {
            text: 'Grafik Perkembangan'
        },
        colors: vc,
        xAxis: {
            text: 'Umur Balita (Bulan)',
            type: 'integer'
        },

        yAxis: {
            title: {
                text: 'Berat Badan'
            }
        },

        tooltip: {
            crosshairs: true,
            shared: 'shared',
            valueSuffix: 'KG'
        },
        legend: {enabled: false
        },
        series: vseries
    });
});
</script>