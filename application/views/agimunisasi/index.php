<div class="row">
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
                    <i class="icon-file"></i>
                    <h3>Agenda Imunisasi</h3>
                </div>
                <div class="widget-content">
                    <div class="clearfix">
                        <div class="control-group pull-right">											
                            <a href="<?= base_url()?>imunisasi/entri" role="button" class="btn btn-primary" data-backdrop="static">
                                    <span class="icon-plus"></span> Tambah Baru
                                </a>				
                        </div>
                       </div>
                    <br>
                    <table id="auditor_main" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                          <th>No.</th>
                          <th>Imunisasi</th>
                          <th>Tanggal</th>
                          <th>Status</th>
                          <th style="width: 120px">&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 1;
                        foreach ($rs_ag as $r) {
                        ?>
                            <tr>
                                <td><?= $n?></td>
                                <td><?= $r['nama_imunisasi']?></td>
                                <td><?= $r['tanggal_agenda']?></td>
                                <td><?= $r['flag_realisasi']?></td>
                                <td>
                                    <a class="btn btn-info btn-small" href="<?= base_url()?>imunisasi/realisasi/<?= $r['id_agenda']?>" ><i class="icon-comment"> </i></a>
                                    <a class="btn btn-info btn-small" href="<?= base_url()?>imunisasi/update/<?= $r['id_agenda']?>" ><i class="icon-edit"> </i></a>
                                    <a class="btn btn-danger btn-small" href="<?= base_url()?>imunisasi/delte/<?= $r['id_agenda']?>" ><i class="icon-remove-sign"> </i></a>
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