<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=laundry&page=save" method="POST">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" required value="<?=(isset($_POST['nama_pelanggan']))?$_POST['nama_pelanggan']:'';?>" class="form-control">
            <input type="hidden" name="id_cucian"  value="<?=(isset($_POST['id_cucian']))?$_POST['id_cucian']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['nama_pelanggan']))?$err['nama_pelanggan']:'';?></span>
        </div>
        <div class="form-group">
        <label for="">Jenis Cucian</label>
            <input type="text" name="jenis_cucian" value="<?=(isset($_POST['jenis_cucian']))?$_POST['jenis_cucian']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['jenis_cucian']))?$err['jenis_cucian']:'';?></span>
        </div>
        <div class="form-group">
        <label for="">Berat Cucian</label>
            <input type="number" name="berat" value="<?=(isset($_POST['berat']))?$_POST['berat']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['berat']))?$err['berat']:'';?></span>
        </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
            <label for="">Jenis Paket</label>
            <select name="id_paket" class="form-control" required id="" >
            <option value="">Pilih Paket</option>
                <?php if($paket != NULL){
                    foreach($paket as $row){?>
                        <option <?=(isset($_POST['id_paket']) && $_POST['id_paket']==$row['id_paket'] )?"selected":'';?> value="<?=$row['id_paket'];?>"> <?=$row['nama_paket'];?></option>
                    <?php }
                }?>
            </select>
            <span class="text-danger"><?=(isset($err['id_paket']))?$err['id_paket']:'';?></span>
    </div>
    <div class="form-group">
            <label for="">Pegawai</label>
            <select name="id_pegawai" class="form-control" required id="">
                <option value="">Pilih Pegawai</option>
                <?php if($pegawai != NULL){
                    foreach($pegawai as $row){?>
                        <option <?=(isset($_POST['id_pegawai']) && $_POST['id_pegawai']==$row['id_pegawai'] )?"selected":'';?> value="<?=$row['id_pegawai'];?>"> <?=$row['nama_pegawai'];?></option>
                    <?php }
                }?>
            </select>
            <span class="text-danger"><?=(isset($err['id_pegawai']))?$err['id_pegawai']:'';?></span>
    </div>
    <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
    </div>
    </div>
</form>