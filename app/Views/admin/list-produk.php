<?= $this->extend('Template/template') ?>

<?= $this->section('IsKonten') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">List Produk Luxo Mall</h4>
                <a href="<?=base_url("tambah-produk")?>">
                    <button
                        class="btn btn-primary btn-bg-gradient-x-blue-green box-shadow-2"
                            value=""
                        title="Update Produk" style="margin-bottom: 10px;"><i class="fas fa-pencil-alt"></i> Tambah Produk
                    </button>
                </a>
                <table id="datatable" class="table table-bordered w-100" style="width: 100%">
                    <thead>
                 
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Merek</th>
                        <th>Stok</th>
                        <th>Keterangan</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                
                    <tbody>
                    <?php
					foreach ($produk as $value):
						?>
                    <tr>
                        <td><?= $value->nama_produk?></td>
                        <td id="harga_produk_td"><?= $value->harga_produk ?></td>
                        <td><?= $value->kategori?></td>
                        <td><?= $value->sub_kategori?></td>
                        <td><?= $value->stok?></td>
                        <td><?= $value->keterangan?></td>
                        <td>
                            <div class="col-lg-4">
                                <div>
                                    <img src="<?= base_url('admin/produk/'.$value->photo_produk) ?>" alt="" class="rounded avatar-md">
                                    <p class="mt-2  mb-lg-0"></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="<?=base_url("edit-produk/". $value->produk)?>">
                                <button
                                    class="btn btn-success btn-sm  btn-bg-gradient-x-blue-green box-shadow-2"
                                        value="" title="Tambah data"
                                    title="Update Produk"><i class="fas fa-pencil-alt"></i>
                                </button>
                            </a>
                                <button
                                    class="btn btn-danger btn-sm  btn-bg-gradient-x-blue-green box-shadow-2" type="button"
                                        value=""
                                    title="Hapus Produk" data-bs-toggle="modal"  data-bs-target="#hapus<?= $value->produk;?>"><i class="fas fa-trash-alt"></i>
                                </button>

                        </td>
                    </tr>
                    <?php
					endforeach;
					?>
                    </tbody>
                </table>

            </div>
        </div>
        <!-- Modal hapus -->
        <?php foreach($produk as $value) : ?>
        <div class="modal fade text-left" id="hapus<?= $value->produk;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?=base_url("produk/delete/". $value->produk)?>" method="post">
                    <?= csrf_field(); ?>
                        <div class="modal-header">
                            <h3 class="modal-title" id="myModalLabel35"> Hapus Data Produk ini ?</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        </div> <!-- end col -->
    
</div> <!-- end row -->
<script>
    var tdsHarga = document.querySelectorAll("#harga_produk_td");
    function formatHarga() {
        tdsHarga.forEach(function (td) {
            var harga = td.textContent.replace(/\D/g, '');
            var hargaFormat = "Rp. " + new Intl.NumberFormat().format(harga);
            td.textContent = hargaFormat;
        });
    }
    formatHarga();
</script>
<?=$this->endSection()?>