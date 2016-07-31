<div id="modal_form_add" class="row">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-header">
                    <i class="icon-file"></i>
                    <h3>Entri Perkembangan</h3>
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
                            </div> 
                            <div class="control-group">											
                                    <label class="control-label" for="tanggal_ukur">Tanggal Ukur</label>
                                    <div class="controls">
                                        <input id="tanggal_ukur" name="tanggal_ukur" value="" >
                                    </div> <!-- /controls -->				
                            </div> <!-- /control-group -->
                            <div class="control-group">											
                                    <label class="control-label" for="berat">Berat Timbangan (KG)</label>
                                    <div class="controls">
                                        <input type="text" id="berat" name="berat" value="">
                                    </div> <!-- /controls -->				
                            </div>
                            <div class="control-group">											
                                    <label class="control-label" for="tinggi">Tinggi Pengukuran (CM)</label>
                                    <div class="controls">
                                        <input type="text" id="tinggi" name="tinggi" value="">
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
$( "#tanggal_ukur" ).datepicker({
  dateFormat: "yy-mm-dd"
});
</script>