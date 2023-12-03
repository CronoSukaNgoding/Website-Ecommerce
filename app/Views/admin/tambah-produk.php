<?= $this->extend('Template/template') ?>

<?= $this->section('IsKonten') ?>
<!-- CKEDITOR -->
<script src="ckeditor/ckeditor.js"></script>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Informasi Produk</h4>
                <p class="card-title-desc">Isi Form Berikut</p>

                <form action="<?=base_url("produk/tambah")?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nama_produk">Nama Produk</label>
                                <input id="nama_produk" name="nama_produk" type="text" class="form-control" placeholder="Product Name" autocomplete="off" required>
                            </div>

                            <div class="mb-3">
                                <label for="harga_produk">Harga</label>
                                <input id="harga_produk" name="harga_produk" type="text" class="form-control" placeholder="Harga Produk" autocomplete="off" required>
                            </div>

                            <div class="mb-3">
                                <label class="control-label" for="kategori">Kategori</label>
                                <select name="kategori" class="form-control select2">
                                    <option>-- Pilih --</option>
                                    <?php foreach($kategori as $listkategori) : ?>
                                    <option value="<?= $listkategori->id?>"><?= $listkategori->kategori?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="control-label" for="sub_kategori">Sub Kategori</label>
                                <select name="sub_kategori" class="form-control select2">
                                    <option>-- Pilih --</option>
                                    <option value="1">Normal</option>
                                    <option value="2">Custom</option>
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="stok">Stok Barang</label>
                                <input id="stok" name="stok" type="number" class="form-control" placeholder="Stok Barang" autocomplete="off" required>
                            </div>

                            <div class="mb-3">
                                <label for="minimal_pesanan">Minimal Pesanan</label>
                                <input id="minimal_pesanan" name="minPesanan" type="number" class="form-control" placeholder="Minimal Pesanan" autocomplete="off" required>
                            </div>

                            <div class="mb-3">
                                <label for="berat_produk">Berat Produk (gram)</label>
                                <input id="berat_produk" name="beratProduk" type="number" class="form-control" placeholder="Berat Produk" autocomplete="off" required>
                            </div>


                            <div class="mb-3">
                                <label for="photo_produk">Foto</label>
                                <input type="file" class="form-control" id="photo_produk" name="photo_produk[]" placeholder="Foto"
                                value="" autocomplete="off" multiple required>
                            </div>

                            <div class="mb-3">
                                <label for="keterangan">keterangan Produk</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="5" placeholder="Keterangan Produk" 
                                autocomplete="off" required></textarea>
                            </div>
                             <div class="mb-3">
                                <label for="link address">link Address Video </label>
                                <textarea class="form-control" id="link address" name="link_address" rows="5" placeholder="Link Address Video Produk" 
                                autocomplete="off" required></textarea>
                            </div>
                            <script>
                                CKEDITOR.replace( 'keterangan' );
                            </script>
                        </div>

                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light">Batal</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<!-- CKEDITOR -->
<script>
function formatCurrency(input) {
    const cleanedInput = input.replace(/[^\d]/g, '');
    const numericValue = parseFloat(cleanedInput.replace('.', '').replace(',', '.'));
    if (!isNaN(numericValue)) {
        return "Rp " + numericValue.toLocaleString('id-ID', { minimumFractionDigits: 0 });
    } else {
        return input;
    }
}

const hargaProdukInput = document.getElementById('harga_produk');

hargaProdukInput.addEventListener('input', function () {
    const formattedHargaProduk = formatCurrency(hargaProdukInput.value);
    hargaProdukInput.value = formattedHargaProduk;
});
</script>









<?=$this->endSection()?>