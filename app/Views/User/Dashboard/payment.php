<?= $this->extend('Template/template-bayar') ?>

<?= $this->section('IsKonten') ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                

                <form id="myForm" method="post">
                    <div class="row">
                        
                        <!-- Left Column -->
                        <div class="col-sm-6">
                            <h4 class="card-title">Form Pembayaran</h4>
                            <p class="card-title-desc">Isi Form Sebagai Bukti Pembayaran</p>
                            <input type="hidden" value="">
                            <div class="mb-3">
                                <label for="nama">Rekening Tujuan</label>
                                <input type="text" class="form-control" name="fullname" id="nama" placeholder="Nama" autocomplete="off"  value="QRIS A/N OYA STORE" disabled>
                                
                                <input type="hidden" value="<?=$result[0]->id_pre?>" class="idPrePay"name="id_prepayment">
                                <input type="hidden" value="<?=$result[0]->id_cart?>" class="idCart"name="id_cart">
                                <input type="hidden" value="<?=$result[0]->qty?>" class="qty"name="qty">
                                <?php foreach($result as $listPay):?>
                                    <input type="hidden" value="<?=$listPay->id_produk?>" class="idProduk" name="id_produk[]">
                                <?php endforeach?>
                            </div>

                            <div class="mb-3">
                                <label for="transfer">Bukti Transfer</label>
                                <input type="file" class="form-control" id="transfer" name="transfer" placeholder="Lengkapi Bukti Transfer" value="" autocomplete="off" required>
                            </div>
                            <!-- ladda button -->
                            <div id="ladda-spinner" class="spinner-border text-primary m-1" role="status" style="display: none;">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-sm-6 text-center">
                            <div class="card  d-inline-block">
                                    <img class="card-img img-fluid" style="width: 50%;" src="<?= base_url('admin/qris.png') ?>" alt="Card image">
                                </div>
                                <h4 class=" total">Harga yang harus dibayar : Rp. <?= number_format($result[0]->total, 0, ',', '.') ?></h4>
                        </div>

                    </div>


                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light" >Simpan</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#confirmationModal">Batal</button>
                    </div>
                </form>
                
            </div>
        </div>
        <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="<?= base_url('/payment/del/').$id?>" method="POST">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin untuk tidak melanjutkan pembayaran?
                </h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <!-- Make sure to prevent conflicts by changing the ID of the submit button -->
                <button type="submit" class="btn btn-primary">Yakin</button>
            </div>
        </div>
    </div>
    </form>
</div>
    </div>
    
</div>
<!-- end row -->

<!-- CKEDITOR -->
<script>
    $(document).ready(function () {
    $("#myForm").submit(function (event) {
        event.preventDefault();
        $("#ladda-spinner").show();
        $("#submit-btn").prop("disabled", true);
        var totalValue = $(".total").text().split(" : ")[1].trim();
        var formData = new FormData(this);

        formData.append('total', totalValue); 
        formData.append('idPrePay', $('.idPrePay').val());
        formData.append('idCart', $('.idCart').val()); 
        $('.idProduk').each(function() {
            formData.append('idProduk[]', $(this).val());
        });
        $.ajax({
            type: "POST",
            url: "/payment/save", 
            data: formData,
            contentType: false, 
            processData: false, 
            success: function (response) {
                $("#ladda-spinner").hide();
                $("#submit-btn").prop("disabled", false);
                const newLocation = '/dashboard' ;
                console.log('New location:', newLocation); 
                window.location.replace(newLocation);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                $("#ladda-spinner").hide();
                $("#submit-btn").prop("disabled", false);
            }
        });
    });
});

</script>

<?=$this->endSection()?>