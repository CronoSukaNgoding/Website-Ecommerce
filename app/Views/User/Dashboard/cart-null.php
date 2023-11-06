<?= $this->extend('Template/template') ?>

<?= $this->section('IsKonten') ?>
<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <table class="table align-middle mb-0 table-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th>Gambar</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Cek apakah data ada atau tidak -->
                        <?php if (empty($data)): ?>
                            <tr>
                                <td colspan="5">No data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-6">
                        <a href="<?= base_url('dashboard')?>" class="btn btn-secondary">
                            <i class="mdi mdi-arrow-left me-1"></i> Continue Shopping </a>
                    </div> <!-- end col -->
                </div> <!-- end row-->
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Order Summary</h4>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <tbody>

                            <tr>
                                <th>Total :</th>
                                <th id="grandTotal">0</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
        <!-- end card -->
    </div>
</div>
<!-- end row -->
<?=$this->endSection()?>




