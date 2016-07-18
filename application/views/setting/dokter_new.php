<div id="modal_form_add" class="row">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-header">
                    <i class="icon-file"></i>
                    <h3>Tambah Data Dokter</h3>
            </div>
            <div class="widget-content">
                <form id="add_auditor" class="form-horizontal" action="" method="POST" >
                        <fieldset>
                           <div class="control-group">											
                                    <label class="control-label" for="nrk">Nama Dokter</label>
                                    <div class="controls">
                                        <input type="text" id="nama_dokter" name="nama_dokter">
                                        <input type="hidden" id="id_dokter" name="id_dokter" value="" readonly="true">
                                    </div> <!-- /controls -->				
                            </div> 
                            <div class="control-group">											
                                    <label class="control-label" for="photo">Alamat</label>
                                    <div class="controls" id="photo">
                                        <textarea id="alamat_dokter" name="alamat_dokter" rows="5" cols="50" ></textarea>
                                    </div> <!-- /controls -->				
                            </div> <!-- /control-group -->
                            <div class="control-group">											
                                    <label class="control-label" for="email">Phone</label>
                                    <div class="controls">
                                        <input type="text" id="phone_dokter" name="phone_dokter" value="">
                                    </div> <!-- /controls -->				
                            </div>
                            <br />
                            <div class="control-group">											
                                    <label class="control-label" for="email">Username (Email)</label>
                                    <div class="controls">
                                        <input type="text" id="email_dokter" name="email_dokter" value="">
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
                                <button type="submit" class="btn btn-primary">Save</button> 
                                <button class="btn">Cancel</button>
                        </div>
                        </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>