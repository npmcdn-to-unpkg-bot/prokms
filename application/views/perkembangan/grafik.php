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
                <table id="auditor_main" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                          <th>Umur</th>
                          <th>Berat (KG)</th>
                          <th>Tinggi (CM)</th>
                          <th>Status</th>
                          <th style="width: 120px">&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($rs_pkb as $r) {
                        ?>
                            <tr>
                                <td><?= $r['x']?></td>
                                <td><?= $r['y']?></td>
                                <td><?= $r['tinggi']?></td>
                                <td><?= $r['status']?></td>
                                <td>
                                    <a class="btn btn-info btn-small" href="<?= base_url()?>perkembangan/update/<?= $r['id_perkembangan']?>" ><i class="icon-edit"> </i></a>
                                    <a class="btn btn-danger btn-small" href="<?= base_url()?>perkembangan/delete/<?= $r['id_perkembangan']?>" ><i class="icon-remove-sign"> </i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url()?>templates/march/js/Highcharts-4.2.5/js/highcharts.js"></script> 
<script src="<?= base_url()?>templates/march/js/Highcharts-4.2.5/js/highcharts-more.js"></script> 
<script src="<?= base_url()?>templates/march/js/Highcharts-4.2.5/modules/exporting.js"></script> 
<script src="<?= base_url()?>templates/march/js/z_index.js"></script> 

<script type="text/javascript">
$(function () {
    var r_anak = <?= json_encode($r_anak)?>;
    var rs_pkb = <?= json_encode($rs_pkb == NULL ? array():$rs_pkb,JSON_NUMERIC_CHECK)?>;
    
    $('#id_balita').val(r_anak.id_balita);
    
//    detect anak laki dan perempuan
    if(r_anak.kelamin == 'laki-laki')
    {
        var vc = ['#ff1a1a','#009C05','#45A348','#62A864'];
        
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
    else
    {
        var vc = ['#ff1a1a','#F5077E','#F5459D','#F587BE'];
                
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
            data: z_girl_1,
            type: 'arearange',
            lineWidth: 0,
            color: vc[3],
            fillOpacity: 0.6,
            zIndex: 1
        },
        {
            name: 'Gizi Baik',
            data: z_girl_2,
            type: 'arearange',
            lineWidth: 0,
            color: vc[2],
            fillOpacity: 0.6,
            zIndex: 2
        },
        {
            name: 'Gizi Baik',
            data: z_girl_3,
            type: 'arearange',
            linkedTo: ':previous',
            lineWidth: 0,
            color: vc[1],
            fillOpacity: 0.6,
            zIndex: 3
        },
        {
            name: 'Gizi Baik',
            data: z_girl_4,
            type: 'arearange',
            linkedTo: ':previous',
            lineWidth: 0,
            color: vc[1],
            fillOpacity: 0.6,
            zIndex: 4
        },
        {
            name: 'Gizi Baik',
            data: z_girl_5,
            type: 'arearange',
            linkedTo: ':previous',
            lineWidth: 0,
            color: vc[2],
            fillOpacity: 0.6,
            zIndex: 5
        },
        {
            name: 'Gizi Lebih',
            data: z_girl_6,
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