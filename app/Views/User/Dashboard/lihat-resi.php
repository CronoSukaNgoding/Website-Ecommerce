
<?= $this->extend('Template/template') ?>
<?= $this->section('IsKonten') ?>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="text-center mb-3">
                    <a href="<?= base_url('/dashboard')?>" class="btn btn-primary"><i class="fas fa-home"></i> Redirect ke Dashboard</a>
                </div>
                <h4 class="card-title">Informasi Pembayaran</h4>
                 <form action="<?=base_url("/pengiriman/edit-user/").$result->idPayment?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                                <div class="mb-3">
                                        <label for="nama_produk">Nama Produk</label>
                                        <input id="nama_produk" name="nama_produk" type="text" class="form-control" placeholder="Product Name" autocomplete="off" value="<?=$result->nama_produk?>" disabled>
                                    </div>

                                    <div class="mb-3">
                                        <label for="harga_produk">Total Harga</label>
                                        <input id="harga_produk" name="harga_produk" type="text" class="form-control" placeholder="Harga Produk" autocomplete="off" value="<?=$result->total?>" disabled>
                                    </div>
                                    
                                    <div class="mb-3" id="noResiContainer" >
                                        <label class="control-label" for="noResi">Nomor Resi</label>
                                        <input type="text" name="no_resi" class="form-control" id="noResi" value="<?=$result->no_resi?>" disabled>
                                    </div>

                                    <div class="mb-3">
                                        <label class="control-label" for="kondisi">Update Status Pengiriman</label>
                                        <select name="status" class="form-control select" id="statusSelect">
                                            
                                            <option value="<?=$result->status?>"><?=$result->statusname?></option>
                                            <option value="4">Selesai</option>
                                        </select>
                                    </div>

                                    <div id="ratingAndCommentForm" style="display: none;">
                                        <div class="mb-3">
                                            <label class="control-label" for="rating"  >Rating</label>
                                            <div class="rating">
                                                <i class="fas fa-star" style="cursor: pointer; " data-index="0"></i>
                                                <i class="fas fa-star" style="cursor: pointer;" data-index="1"></i>
                                                <i class="fas fa-star" style="cursor: pointer;" data-index="2"></i>
                                                <i class="fas fa-star" style="cursor: pointer;" data-index="3"></i>
                                                <i class="fas fa-star" style="cursor: pointer;" data-index="4"></i>
                                            </div>
                                        </div>
                                        <input type="hidden" name="rating" id="ratingInput" required>

                                        <div class="mb-3">
                                            <label class="control-label" for="komentar">Komentar</label>
                                            <textarea name="komentar" class="form-control" required></textarea>
                                        </div>
                                    </div>
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
<!-- end row -->
<script>
function redirectToDataPengiriman() {
    window.location.href = '/data-pengiriman';
}
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const statusSelect = document.getElementById('statusSelect');
        const ratingAndCommentForm = document.getElementById('ratingAndCommentForm');
        console.log(statusSelect.value);

        function toggleRatingAndCommentForm() {
            const selectedStatus = statusSelect.value;
            if (selectedStatus === '4') {
                ratingAndCommentForm.style.display = 'block';
            } else {
                ratingAndCommentForm.style.display = 'none';
            }
        }

        toggleRatingAndCommentForm();
        statusSelect.addEventListener('change', toggleRatingAndCommentForm);
    });
</script>

<script>
    const stars = document.querySelectorAll('.rating i');
    const ratingInput = document.getElementById('ratingInput');

    stars.forEach(star => {
        star.addEventListener('click', function() {
            const index = parseInt(this.getAttribute('data-index'));
            const selectedRating = index + 1; // Add 1 to the index to get the rating value
            ratingInput.value = selectedRating; // Set the hidden input value
            for (let i = 0; i <= index; i++) {
                stars[i].style.color = 'gold';
            }
            for (let i = index + 1; i < stars.length; i++) {
                stars[i].style.color = ''; // Reset other stars to their default color
            }
        });
    });
</script>











<?=$this->endSection()?>