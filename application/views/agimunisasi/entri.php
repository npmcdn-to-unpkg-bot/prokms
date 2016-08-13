<div id="modal_form_add" class="row">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-header">
                    <i class="icon-file"></i>
                    <h3>Tambah Agenda Imunisasi</h3>
            </div>
            <div class="widget-content">
                <div class="row">
                    <?= validation_errors('<div class="span8 alert alert-error">', '</div>');  ?>
                </div>
                
                <form id="add_auditor" class="form-horizontal" action="" method="POST" >
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
                                    </div> <!-- /controls -->
                                    <input type="hidden" id="id_agenda" name="id_agenda">
                            </div> 
                            <div class="control-group">											
                                    <label class="control-label" for="id_balita">Nama Imunisasi</label>
                                    <div class="controls">
                                        <select name="id_imunisasi" id="id_imunisasi">
                                            <?php
                                            foreach ($rs_imunisasi as $v) {
                                            ?>
                                            <option value="<?= $v['id_imunisasi']?>"><?= $v['nama_imunisasi']?> (<?= $v['sifat_imunisasi']?>)</option>
                                            <?php
                                            }
                                            ?>
                                            
                                        </select>
                                    </div> <!-- /controls -->	
                            </div> <!-- /control-group -->
                            <div class="control-group">											
                                    <label class="control-label" for="jkel">Rencana Imunisasi</label>
                                    <div class="controls">
                                        <input type="text" id="tanggal_agenda" name="tanggal_agenda" value="">
                                    </div> <!-- /controls -->				
                            </div>
                            
                        <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Save</button> 
                                <button class="btn">Cancel</button>
                        </div>
                        </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$( "#tanggal_agenda" ).datepicker({
  changeYear: true,
  dateFormat: "yy-mm-dd",
  yearRange: "c-5:c+1"
});
</script>