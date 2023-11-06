<?= $this->extend('Template/template') ?>

<?= $this->section('IsKonten') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Card Information</h4>
                <p class="card-title-desc">Isi Form Berikut</p>

                <form action="<?=base_url("produk/tambah")?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">

                            <div class="mb-3">
                                <label class="control-label" for="kategori">Kategori</label>
                                <select name="kategori" class="form-control select2">
                                    <option>Pilih</option>
                                    <option value="Handphone">Handphone</option>
                                    <option value="Laptop">Laptop</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="stok">Sub Kategori</label>
                                <input id="stok" name="stok" type="text" class="form-control" placeholder="Stok Barang" autocomplete="off" required>
                            </div>

                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                        <button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                    </div>
                </form>

            </div>
        </div>

        <!-- <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Product Images</h4>

                <form action="/" method="post" class="dropzone">
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>

                    <div class="dz-message needsclick">
                        <div class="mb-3">
                            <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                        </div>

                        <h4>Drop files here or click to upload.</h4>
                    </div>
                </form>
            </div>

        </div> -->
        <!-- end card-->
    </div>
</div>
<!-- end row -->
<?=$this->endSection()?>