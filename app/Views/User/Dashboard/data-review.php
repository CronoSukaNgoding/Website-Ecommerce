<?= $this->extend('Template/template') ?>

<?= $this->section('IsKonten') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="<?= base_url('/dashboard')?>" class="btn btn-primary mb-3"><i class="fas fa-home"></i> Redirect ke Dashboard</a>

                <h4 class="card-title">List Review</h4>

                <table id="categoryTable" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Barang</th>
                            <th>Rating</th>
                            <th>Komentar</th>
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
                data: 'nama_produk',
            },
            {
                data: 'peringkat',
                render:function (data, type, row, meta) {
                    if (data === null) {
                        return "Produk ini belum diberi rating";
                    } else {
                        const filledStars = Math.round(data);
                        let ratingHTML = '<div class="rating" data-rating="' + data + '">';
                        for (let i = 0; i < 5; i++) {
                            if (i < filledStars) {
                                ratingHTML += '<span style="color: gold;">&#9733;</span>';
                            } else {
                                ratingHTML += '<span>&#9733;</span>';
                            }
                        }
                        ratingHTML += '</div>';
                        ratingHTML += ' (' + data + ')';
                        return ratingHTML;
                    }
                }
            },
            {
                data: 'komentar',
            }
        ];

        var order = [
            [0, 'asc']
        ];

        generateTable('#categoryTable', '/ajax-review', columns, order);
    });
</script>

<?=$this->endSection()?>