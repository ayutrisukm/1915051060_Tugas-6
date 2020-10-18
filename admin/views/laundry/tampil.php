<div class="row">
    <div class="pull-left">
        <h4>Daftar Cucian</h4>
    </div>
    <div class="pull-right">
        <a href="index.php?mod=laundry&page=add">
            <button class="btn btn-primary">Add</button>
        </a>
    </div>
</div>
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <td>
                    #
                </td>
                <td>Nama</td><td>Jenis Cucian</td><td>Paket</td><th>Berat Cucian</th><th>Nama Pegawai</th><td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php if($laundry != NULL){ 
                $no=1;
                foreach($laundry as $row){?>
                    <tr>
                        <td><?=$no;?></td>
                        <td><?=$row['nama_pelanggan']?></td>
                        <td><?=$row['jenis_cucian'];?></td>
                        <td><?=$row['id_paket']?></td>
                        <td><?=$row['berat']?></td>
                        <td><?=$row['id_pegawai']?></td>                        
                        <td>
                            <a href="index.php?mod=laundry&page=edit&id=<?=$row['id_cucian']?>"><i class="fa fa-pencil"></i> </a>
                            <a href="index.php?mod=laundry&page=delete&id=<?=$row['id_cucian']?>"><i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
               <?php $no++; }
            }?>
        </tbody>
    </table>
</div>