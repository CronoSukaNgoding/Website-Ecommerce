<?= $this->extend('Template/template') ?>

<?= $this->section('IsKonten') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">List Pesanan Luxo Mall</h4>

                <table id="categoryTable" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pemesan</th>
                            <th>Barang</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Catatan</th>
                            <th>Order Date</th>
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
        var columns = [
            {
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            {
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
                render: function (data) {
                    return 'Rp ' + data.toLocaleString('id-ID');
                }
            },
            {
                data: 'notes',
                render: function (data) {
                    return data ? data : 'Tidak ada catatan';
                }
            },
            {
                data: 'tglbuat',
                render: function (data) {
                    return data ;
                }
            }
            
        ];

        var order = [
            [0, 'asc']
        ];

         generateTable('#categoryTable', '/ajax-pesanan', columns, order);
    });
</script>

<?=$this->endSection()?>