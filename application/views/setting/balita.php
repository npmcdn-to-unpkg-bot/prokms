<div class="row">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-header">
                    <i class="icon-file"></i>
                    <h3>Data Balita</h3>
                </div>
                <div class="widget-content">
                    <div class="clearfix">
                        <div class="control-group pull-right">											
                            <a href="<?= base_url()?>setting/balita_edit" role="button" class="btn btn-primary" data-backdrop="static">
                                    <span class="icon-plus"></span> Tambah Baru
                                </a>				
                        </div>
                       </div>
                    <br>
                    <table id="auditor_main" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                          <th>No.</th>
                          <th>Nama</th>
                          <th>Tanggal Lahir</th>
                          <th>Kelamin</th>
                          <th>Berat Lahir</th>
                          <th>Tinggi Lahir</th>
                          <th style="width: 80px">&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 1;
                        foreach ($rs as $r) {
                        ?>
                            <tr>
                                <td><?= $n?></td>
                                <td><?= $r['nama_balita']?></td>
                                <td><?= $r['tanggal_lahir']?></td>
                                <td><?= $r['kelamin']?></td>
                                <td><?= $r['berat_lahir']?></td>
                                <td><?= $r['tinggi_lahir']?></td>
                                <td>
                                    <button class="btn btn-info btn-small" href="<?= base_url()?>setting/petugas_new/<?= $r['id_balita']?>" ><i class="icon-edit"> </i></button>
                                    <button class="btn btn-danger btn-small" href="<?= base_url()?>setting/petugas_delete/<?= $r['id_balita']?>" ><i class="icon-remove-sign"> </i></button>
                                </td>
                            </tr>
                        <?php
                            $n++;
                        }
                        ?>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
      </div>