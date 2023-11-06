<?= $this->extend('Template/template') ?>

<?= $this->section('IsKonten') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">List Pembayaran Luxo Mall</h4>
                <?php if(session()->getFlashData("sukses")): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?=session()->getFlashData("sukses")?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php elseif(session()->getFlashData("hapus")): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?=session()->getFlashData("hapus")?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>

                <table id="categoryTable" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Barang</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Status Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
                <div class="loader-container">
                    <div class="loader"></div>
                    <p class="loader-p">Memuat data...</p>
                </div>


            </div>
            <!-- Modal -->

            <div class="modal fade" id="konfirmasiHapusModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="" method="POST" id="deleteForm">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin menghapus data ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </div>
                        </form>
                    </div>
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
            {
                data: null,
                render: function (data) {
                    return '<a href="<?= base_url('data-pembayaran/')?>' + data.idPayment +
                        '"><button class="btn btn-success btn-sm btn-bg-gradient-x-blue-green box-shadow-2" title="Edit data"><i class="fas fa-pencil-alt"></i></button></a>' +
                        '<button class="btn btn-danger btn-sm btn-bg-gradient-x-blue-green box-shadow-2" type="button" value="" title="Hapus data?" data-bs-toggle="modal" onclick="tampilkanModalKonfirmasi(' +
                        data.idPayment + ')""><i class="fas fa-trash-alt"></i></button>';

                }
            }
        ];

        var order = [
            [0, 'asc']
        ];

        generateTable('#categoryTable', '/ajax-pembayaran-admin', columns, order);
    });
</script>
<script>

    let dataYangAkanDihapus = null;

    function tampilkanModalKonfirmasi(data) {
        dataYangAkanDihapus = data;
        $('#konfirmasiHapusModal').modal('show');
    }

    document.getElementById('konfirmasiHapus').addEventListener('click', function () {
        if (dataYangAkanDihapus) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = 'hapus-data-pembayaran/' + dataYangAkanDihapus; 
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'dataID';
            input.value = dataYangAkanDihapus;
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
            $('#konfirmasiHapusModal').modal('hide');
        }
    });
</script>
<?=$this->endSection()?>