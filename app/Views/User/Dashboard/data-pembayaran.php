<?= $this->extend('Template/template') ?>

<?= $this->section('IsKonten') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="<?= base_url('/dashboard')?>" class="btn btn-primary mb-3"><i class="fas fa-home"></i> Redirect ke Dashboard</a>
                <h4 class="card-title">List Pesanan</h4>

                <table id="categoryTable"class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Barang</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Status Pembayaran</th>
                        </tr>
                    </thead>
                    
                </table>
                <div class="loader-container">
                    <div class="loader"></div>
                    <p class="loader-p">Memuat data...</p>
                </div>

            </div>

        </div>
    </div>
</div>

<script src="/assets/js/service/generateTable.js"></script>
<script>
    $(document).ready(function () {
        var columns = [{
                data: 'fullname',
            },
            {
                data: 'nama_produk',
            },
            {
                data: 'qty',
            },
            {
                data: 'total',
            },
            {
                data: 'status',
                render: function (data) {
                    var badgeClass = '';
                    var statusText = '';
                    switch (parseInt(data)) {
                        case 1:
                            badgeClass = 'bg-warning';
                            statusText = 'Pembayaran belum dicek';
                            break;
                        case 2:
                            badgeClass = 'bg-success';
                            statusText = 'Pembayaran diterima';
                            break;
                        case 3:
                            badgeClass = 'bg-info';
                            statusText = 'Dikirim';
                            break;
                        case 4:
                            badgeClass = 'bg-success';
                            statusText = 'Pengiriman selesai';
                            break;
                        default:
                            badgeClass = 'bg-danger';
                            statusText = 'Pembayaran ditolak';
                            break;
                    }
                    return '<span class="badge font-size-10 ' + badgeClass + '">' + statusText +
                        '</span>';
                }
            },
            
        ];

        var order = [
            [0, 'asc']
        ];

        generateTable('#categoryTable', '/ajax-pembayaran-user', columns, order);
    });
</script>
<?=$this->endSection()?>