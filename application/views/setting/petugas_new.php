<div id="modal_form_add" class="row">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-header">
                    <i class="icon-file"></i>
                    <h3>Tambah Data Petugas Posyandu</h3>
            </div>
            <div class="widget-content">
                <form id="add_auditor" class="form-horizontal" action="" method="POST" >
                        <fieldset>
                           <div class="control-group">											
                                    <label class="control-label" for="nrk">Nama Petugas</label>
                                    <div class="controls">
                                        <input type="text" id="nama_petugas" name="nama_petugas">
                                        <input type="hidden" id="id_petugas" name="id_petugas" value="" readonly="true">
                                    </div> <!-- /controls -->				
                            </div> 
                            <div class="control-group">											
                                    <label class="control-label" for="photo">Alamat</label>
                                    <div class="controls" id="photo">
                                        <textarea id="alamat_petugas" name="alamat_petugas" rows="5" cols="50" ></textarea>
                                    </div> <!-- /controls -->				
                            </div> <!-- /control-group -->
                            <div class="control-group">											
                                    <label class="control-label" for="email">Phone</label>
                                    <div class="controls">
                                        <input type="text" id="phone_petugas" name="phone_petugas" value="">
                                    </div> <!-- /controls -->				
                            </div>
                            <br />
                            <div class="control-group">											
                                    <label class="control-label" for="email">Username (Email)</label>
                                    <div class="controls">
                                        <input type="text" id="email_petugas" name="email_petugas" value="">
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