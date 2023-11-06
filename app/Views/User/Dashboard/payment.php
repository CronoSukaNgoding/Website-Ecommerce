<?= $this->extend('Template/template') ?>

<?= $this->section('IsKonten') ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Form Pembayaran</h4>
                <p class="card-title-desc">Isi Form Sebagai Bukti Pembayaran</p>

                <form id="myForm" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="hidden" value="">
                            <div class="mb-3">
                                <label for="nama">Rekening Tujuan</label>
                                
                                <input type="text" class="form-control" name="fullname" id="nama" placeholder="Nama" autocomplete="off"  value="QRIS A/N OYA STORE" disabled>
                                <div class="card  mt-3">
                                    <img class="card-img img-fluid  " style="width : 50%;" src="<?= base_url('admin/qris.png') ?>" alt="Card image">
                                </div>
                                <h4 class="mt-3 total">Harga yang harus dibayar : Rp. <?= number_format($result[0]->total, 0, ',', '.') ?></h4>
                                <input type="hidden" value="<?=$result[0]->id_pre?>" class="idPrePay"name="id_prepayment">
                                <input type="hidden" value="<?=$result[0]->id_cart?>" class="idCart"name="id_cart">
                                <input type="hidden" value="<?=$result[0]->qty?>" class="qty"name="qty">
                                <?php foreach($result as $listPay):?>
                                    <input type="hidden" value="<?=$listPay->id_produk?>" class="idProduk" name="id_produk[]">
                                    <?php endforeach?>
                            </div>

                            <div class="mb-3">
                                <label for="transfer">Bukti Transfer</label>
                                <input type="file" class="form-control" id="transfer" name="transfer" placeholder="Lengkapi Bukti Transfer"
                                value="" autocomplete="off" required>
                            </div>
                            <!-- ladda button -->
                            <div id="ladda-spinner" class="spinner-border text-primary m-1" role="status" style="display: none;">
                                <span class="sr-only">Loading...</span>
                            </div>

                        </div>

                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light" >Simpan</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light">Batal</button>
                    </div>
                </form>
                
            </div>
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