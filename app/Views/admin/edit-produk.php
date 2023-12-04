<?= $this->extend('Template/template') ?>

<?= $this->section('IsKonten') ?>
<!-- CKEDITOR -->
<script src="/ckeditor/ckeditor.js"></script>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Informasi Produk</h4>
                <p class="card-title-desc">Isi Form Berikut</p>



                <form action="<?=base_url("edit-produk/edit/".$result->id)?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nama_produk">Nama Produk</label>
                                <input id="nama_produk" name="nama_produk" type="text" class="form-control" placeholder="Product Name" value="<?= $result->nama_produk?>" autocomplete="off" required>
                            </div>

                            <div class="mb-3">
                                <label for="harga_produk">Harga</label>
                                <input id="harga_produk" name="harga_produk" type="text" class="form-control" placeholder="Harga" value="<?= $result->harga_produk?>" autocomplete="off" required>
                            </div>

                            <div class="mb-3">
                                <label class="control-label" for="kategori">Kategori</label>
                                <select name="kategori" class="form-control select2">
                                    <option value="<?= $result->id_kategori?>"><?= $result->kategori?></option>
                                    <?php foreach($kategori as $listkategori) : ?>
                                    <option value="<?= $listkategori->id?>"><?= $listkategori->kategori?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="control-label" for="sub_kategori">Sub Kategori</label>
                                <select name="sub_kategori" class="form-control select2">
                                    <option value="<?= $result->id_sub?>"><?= $result->sub_kategori?></option>
                                    <?php foreach($subkategori as $listsub) : ?>
                                    <option value="<?= $listsub->id?>"><?= $listsub->sub_kategori?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                           

                            <div class="mb-3">
                                <label for="stok">Stok Barang</label>
                                <input id="stok" name="stok" type="text" class="form-control" placeholder="Stok" value="<?= $result->stok ?>" autocomplete="off" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="tambahStok">Tambah Stok Barang</label>
                                <input id="tambahStok" name="tambahStok" type="text" class="form-control" placeholder="Stok" value="" autocomplete="off" >
                                
                            </div>
                            <button id="tambahButton" onclick="aktifkanTambahStok()"class="btn btn-primary waves-effect waves-light mb-3">Tambah Stok</button>
                            <h4>Total stok saat ini: <span id="totalStok"><?= $result->stok ?></span></h4>

                            
                            
                            <div class="mb-3">
                                <label for="keterangan">keterangan Produk</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="5" placeholder="Keterangan Produk" 
                                autocomplete="off" required><?= $result->keterangan?></textarea>
                            </div>
                             <div class="mb-3">
                                <label for="link address">link Address Video </label>
                                <textarea class="form-control" id="link address" name="link_address" rows="5" placeholder="Link Address Video Produk" 
                                autocomplete="off" required><?= $result->link_address?></textarea>
                            </div>
                            <script>
                                CKEDITOR.replace( 'keterangan' );
                            </script>
                            <div id="carouselExampleIndicators<?= $result->id ?>" class="carousel slide mb-3" data-bs-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <?php
                                        for ($i = 0; $i < count($daftar_foto); $i++) :
                                            ?>
                                            <li data-bs-target="#carouselExampleIndicators<?= $result->id ?>" data-bs-slide-to="<?= $i ?>" <?= ($i === 0) ? 'class="active"' : '' ?>></li>
                                        <?php endfor; ?>

                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        <?php
                                            for ($i = 0; $i < count($daftar_foto); $i++) :
                                                ?>
                                                <div class="carousel-item <?= ($i === 0) ? 'active' : '' ?>">
                                                    
                                                    <?php if (filter_var($daftar_foto[$i], FILTER_VALIDATE_URL)) : ?>
                                                        <!-- Jika itu adalah URL, gunakan iFrame -->
                                                        <iframe class="d-block w-100"  width="315" height="360" src="<?= $daftar_foto[$i] ?>" frameborder="0" allowfullscreen></iframe>
                                                    <?php else : ?>
                                                        <!-- Jika bukan URL, tampilkan gambar -->
                                                        <img class="d-block img-fluid" src="<?=base_url()?>admin/produk/<?= $daftar_foto[$i] ?>" alt="Slide <?= ($i + 1) ?>">
                                                    <?php endif; ?>
                                                </div>
                                            <?php endfor; ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators<?= $result->id ?>" role="button" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators<?= $result->id ?>" role="button" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                            </div>
                        </div>

                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                        <a href="<?=base_url('list-produk')?>"><button type="button" class="btn btn-danger waves-effect waves-light">Batal</button></a>
                    </div>
                </form>


            </div>
        </div>

    </div>
</div>
<!-- end row -->
<script>
    function aktifkanTambahStok() {
        var stokSaatIni = parseInt(document.getElementById("stok").value);
        var tambahStok = parseInt(document.getElementById("tambahStok").value);


        if (!isNaN(tambahStok) && tambahStok > 0) {
            var totalStokSaatIni = stokSaatIni + tambahStok;
            document.getElementById("totalStok").textContent = totalStokSaatIni;
            document.getElementById("stok").value = totalStokSaatIni;
            document.getElementById("stok").disabled = false;
            document.getElementById("tambahStok").value = "";
            document.getElementById("tambahButton").disabled = true;
        } else {
            alert("Nilai yang dimasukkan tidak valid. Masukkan angka positif.");
        }
    }

    document.getElementById("tambahStok").addEventListener("input", function () {
        var tambahStok = parseInt(this.value);
        if (!isNaN(tambahStok) && tambahStok > 0) {
            document.getElementById("tambahButton").disabled = false;
        } else {
            document.getElementById("tambahButton").disabled = true;
        }
    });
</script>
<?=$this->endSection()?>