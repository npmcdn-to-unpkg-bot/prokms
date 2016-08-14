<div id="modal_form_add" class="row">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-header">
                    <i class="icon-file"></i>
                    <h3>Tambah Master Imunisasi</h3>
            </div>
            <div class="widget-content">
                <form id="add_auditor" class="form-horizontal" action="" method="POST" >
                        <fieldset>
                           <div class="control-group">											
                                    <label class="control-label" for="nrk">Nama Imunisasi</label>
                                    <div class="controls">
                                        <input type="text" id="nama_imunisasi" name="nama_imunisasi">
                                        <input type="hidden" id="id_imunisasi" name="id_imunisasi" value="" readonly="true">
                                    </div> <!-- /controls -->				
                            </div> 
                            <div class="control-group">											
                                    <label class="control-label" for="photo">Sifat Imunisasi</label>
                                    <div class="controls" id="photo">
                                        <select id="sifat_imunisasi" name="sifat_imunisasi">
                                            <option value="wajib">Wajib</option>
                                            <option value="pelengkap">Pelengkap</option>
                                        </select>
                                    </div> <!-- /controls -->				
                            </div> <!-- /control-group -->
                            
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