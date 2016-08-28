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
                                        <input type="hidden" name="id_perkembangan" id="id_perkembangan" disabled="" readonly="">
                                    </div> <!-- /controls -->				
                            </div> 
                            <div class="control-group">											
                                    <label class="control-label" for="umur">Umur</label>
                                    <div class="controls">
                                        <select name="umur" id="umur">
                                            <?php
                                            for ($i = 1; $i < 61; $i++){
                                            ?>
                                            <option value="<?= $i?>"><?= $i?></option>
                                            <?php
                                            }
                                            ?>
                                            
                                        </select>
                                    </div> <!-- /controls -->				
                            </div> <!-- /control-group -->
                            <div class="control-group">											
                                    <label class="control-label" for="berat">Berat Timbangan (KG)</label>
                                    <div class="controls">
                                        <input type="text" id="berat" name="berat" value="">
                                        <span class="alert alert-info"><i class="icon-info-sign"></i> Gunakan "." (titik) untuk bilangan pecahan</span>
                                    </div> <!-- /controls -->				
                            </div>
                            <div class="control-group">											
                                    <label class="control-label" for="tinggi">Tinggi Pengukuran (CM)</label>
                                    <div class="controls">
                                        <input type="text" id="tinggi" name="tinggi" value="">
                                        <span class="alert alert-info"><i class="icon-info-sign"></i> Gunakan "." (titik) untuk bilangan pecahan</span>
                                    </div> <!-- /controls -->				
                            </div>
                            
                        <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Save</button> 
                                <a href="<?= base_url()?>perkembangan" class="btn">Cancel</a>
                        </div>
                        </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
var r_pkb = <?= json_encode($r_pkb)?>;

if (r_pkb.id_perkembangan != '')
{
//    set value and set disabled
    $('#id_perkemebangan').val(r_pkb.id_perkembangan);
    $('#id_balita').val(r_pkb.id_balita).prop('disabled',true);
    $('#umur').val(r_pkb.umur).prop('disabled',true);
    $('#berat').val(r_pkb.berat);
    $('#tinggi').val(r_pkb.tinggi);
    
}
</script>