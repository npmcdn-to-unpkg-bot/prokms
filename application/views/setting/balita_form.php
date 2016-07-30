<div id="modal_form_add" class="row">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-header">
                    <i class="icon-file"></i>
                    <h3>Tambah Data Balita</h3>
            </div>
            <div class="widget-content">
                <div class="row">
                    <?= validation_errors('<div class="span8 alert alert-error">', '</div>');  ?>
                </div>
                
                <form id="add_auditor" class="form-horizontal" action="" method="POST" >
                        <fieldset>
                           <div class="control-group">											
                                    <label class="control-label" for="nrk">Nama Balita</label>
                                    <div class="controls">
                                        <input type="text" id="nama_balita" name="nama_balita">
                                        <input type="hidden" id="id_balita" name="id_balita" value="" readonly="true">
                                    </div> <!-- /controls -->				
                            </div> 
                            <div class="control-group">											
                                    <label class="control-label" for="photo">Tanggal Lahir</label>
                                    <div class="controls" id="photo">
                                        <input id="tanggal_lahir" name="tanggal_lahir" value="" >
                                    </div> <!-- /controls -->				
                            </div> <!-- /control-group -->
                            <div class="control-group">											
                                    <label class="control-label" for="jkel">Jenis Kelamin</label>
                                    <div class="controls">
                                        <span class="span1"> <input type="radio" name="jkel" value="laki-laki"> Laki-Laki</span>
                                        <span class="span2"> <input type="radio" name="jkel" value="perempuan"> Perempuan</span>
                                    </div> <!-- /controls -->				
                            </div>
                            <div class="control-group">											
                                    <label class="control-label" for="berat_lahir">Berat Lahir (KG)</label>
                                    <div class="controls">
                                        <input type="text" id="berat_lahir" name="berat_lahir" value="">
                                    </div> <!-- /controls -->				
                            </div>
                            <div class="control-group">											
                                    <label class="control-label" for="tinggi_lahir">Tinggi Lahir (CM)</label>
                                    <div class="controls">
                                        <input type="text" id="tinggi_lahir" name="tinggi_lahir" value="">
                                    </div> <!-- /controls -->				
                            </div>
                            <div class="control-group">											
                                    <label class="control-label" for="credential">Catatan Khusus</label>
                                    <div class="controls">
                                        <textarea id="catatan_khusus" name="catatan_khusus" rows="5" cols="50" ></textarea>
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
$( "#tanggal_lahir" ).datepicker({
  changeYear: true,
  dateFormat: "yy-mm-dd",
  yearRange: "c-5:c+1"
});
</script>