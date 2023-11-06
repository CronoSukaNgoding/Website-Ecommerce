<?= $this->extend('Template/template') ?>

<?= $this->section('IsKonten') ?>
<!-- CKEDITOR -->
<script src="ckeditor/ckeditor.js"></script>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Informasi Pembayaran</h4>
                <form action="<?=base_url("pengiriman/edit/").$result->idPayment?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nama_produk">Nama Produk</label>
                                <input id="nama_produk" name="nama_produk" type="text" class="form-control" placeholder="Product Name" autocomplete="off" value="<?=$result->nama_produk?>" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="harga_produk">Total Harga</label>
                                <input id="harga_produk" name="harga_produk" type="text" class="form-control" placeholder="Harga Produk" autocomplete="off" value="<?=$result->total?>" disabled>
                            </div>
                            <div class="card">
                                <img class="card-img img-fluid  " src="<?= base_url('uploads/').$result->transfer ?>" alt="Card image">
                            </div>
                        
                            <div class="mb-3">
                                <label class="control-label" for="kondisi">Status Pembayaran</label>
                                <select name="status" class="form-control select2" id="statusSelect" disabled>
                                    <option value="<?=$result->status?>"><?=$result->statusname?></option>
                                    <?php foreach ($status as $value): ?>
                                    <option value="<?=$value->id?>"><?=$value->name?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3" id="noResiContainer" style="display: none;">
                                <label class="control-label" for="noResi">Nomor Resi</label>
                                <input type="text" name="no_resi" class="form-control" id="noResi" value="<?=$result->no_resi?>">
                            </div>
                        </div>

                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light" onclick="redirectToDataPengiriman()">Batal</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<!-- CKEDITOR -->
<script>
function redirectToDataPengiriman() {
    window.location.href = '/data-pengiriman';
}
</script>
<script>
    const statusSelect = document.getElementById('statusSelect');
    const noResiContainer = document.getElementById('noResiContainer');

    function toggleNoResiContainer() {
        const selectedStatus = statusSelect.value;
        if (selectedStatus === '3') {
            noResiContainer.style.display = 'block';
        } else {
            noResiContainer.style.display = 'none';
        }
    }

    toggleNoResiContainer();
    statusSelect.addEventListener('change', toggleNoResiContainer);
</script>

<?=$this->endSection()?>