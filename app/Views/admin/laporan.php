<?= $this->extend('Template/template') ?>

<?= $this->section('IsKonten') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Laporan Luxo Mall Bulan <span id="currentMonth"></span></h4>


                <table id="categoryTable" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Order ID</th>
                            <th>Order Date</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Produk</th>
                            <th>Quantity</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                    </tbody>

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
                data: 'idOrder',
            },
            {
                data: 'orderDate',
            },
            {
                data: 'customerName',
            },
            {
                data: 'produkName',
            },
            {
                data: 'quantity',
            },
            {
                data: 'price',
            }
        ];

        var order = [
            [0, 'asc']
        ];

        generateTable('#categoryTable', '/ajax-laporan', columns, order);

    });
</script>
<script>
    var currentDate = new Date();
    var monthNames = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];

    var currentMonth = monthNames[currentDate.getMonth()];
    document.getElementById("currentMonth").textContent = currentMonth;
</script>


<?=$this->endSection()?>