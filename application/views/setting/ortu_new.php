<div id="modal_form_add" class="row">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-header">
                    <i class="icon-file"></i>
                    <h3>Tambah Orang Tua</h3>
            </div>
            <div class="widget-content">
                <div class="row">
                    <?= validation_errors('<div class="span8 alert alert-error">', '</div>');  ?>
                </div>

                <form id="add_auditor" class="form-horizontal" action="" method="POST" >
                        <fieldset>
                           <div class="control-group">											
                                    <label class="control-label" for="nrk">Nama Orang Tua</label>
                                    <div class="controls">
                                        <input type="text" id="nama" name="nama">
                                        <input type="hidden" id="id_ortu" name="id_ortu" value="" readonly="true">
                                    </div> <!-- /controls -->				
                            </div> 
                                <div class="control-group">											
                                    <label class="control-label" for="jkel">Jenis Kelamin</label>
                                    <div class="controls">
                                        <span class="span1"> <input id="rpria" type="radio" name="jkel" value="pria"> Pria</span>
                                        <span class="span1"> <input id="rwanita" type="radio" name="jkel" value="wanita"> Wanita</span>
                                    </div> <!-- /controls -->				
                            </div>
                            <div class="control-group">											
                                    <label class="control-label" for="alamat">Alamat</label>
                                    <div class="controls" id="photo">
                                        <textarea id="alamat" name="alamat" rows="5" cols="50" ></textarea>
                                    </div> <!-- /controls -->				
                            </div> <!-- /control-group -->
                            <div class="control-group">											
                                    <label class="control-label" for="email">Telephone/HP</label>
                                    <div class="controls">
                                        <input type="text" id="phone" name="phone" value="">
                                    </div> <!-- /controls -->				
                            </div>
                            <br />
                            <div class="control-group">											
                                    <label class="control-label" for="email">Username (Email)</label>
                                    <div class="controls">
                                        <input type="text" id="email" name="email" value="">
                                    </div> <!-- /controls -->				
                            </div>
                            <div class="control-group">											
                                    <label class="control-label" for="credential">Password</label>
                                    <div class="controls">
                                        <input type="password" id="credential" name="credential" value="">
                                    </div> <!-- /controls -->				
                            </div>
                            <div class="control-group">											
                                    <label class="control-label" for="credential2">Re-entry Password</label>
                                    <div class="controls">
                                        <input type="password" id="credential2" name="credential2" value="">
                                    </div> <!-- /controls -->				
                            </div>
                        <div class="form-actions">
                                <button type="submit" value="Save" class="btn btn-primary">Save</button> 
                                <a href="<?= base_url()?>setting/ortu" class="btn">Cancel</a>
                        </div>
                        </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
var r_ortu = <?= json_encode($r_ortu == NULL ? array():$r_ortu,JSON_NUMERIC_CHECK)?>;
//set the value of each form
$('#nama').val(r_ortu.nama_ortu);
$('#r'+r_ortu.jkel).prop('checked',true);
$('#id_ortu').val(r_ortu.id_ortu);
$('#alamat').val(r_ortu.alamat);
$('#phone').val(r_ortu.no_hp);
$('#email').val(r_ortu.email).prop('disabled',true);
</script>