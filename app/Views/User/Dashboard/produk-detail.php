<?= $this->extend('Template/template') ?>


<?= $this->section('IsKonten') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
         
                <div class="row">
                <?php
					foreach ($result as $value):
						?>
                    <div class="col-xl-6">
                        <div class="product-detai-imgs">
            
                            <div class="row">
                                <!-- <div class="col-md-2 col-sm-3 col-4">
                                    <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="product-1-tab" data-bs-toggle="pill" href="#product-1" role="tab" aria-controls="product-1" aria-selected="true">
                                            <img src="/assets/images/product/img-7.png" alt="" class="img-fluid mx-auto d-block rounded">
                                        </a>
                                        <a class="nav-link" id="product-2-tab" data-bs-toggle="pill" href="#product-2" role="tab" aria-controls="product-2" aria-selected="false">
                                            <img src="/assets/images/product/img-8.png" alt="" class="img-fluid mx-auto d-block rounded">
                                        </a>
                                        <a class="nav-link" id="product-3-tab" data-bs-toggle="pill" href="#product-3" role="tab" aria-controls="product-3" aria-selected="false">
                                            <img src="/assets/images/product/img-7.png" alt="" class="img-fluid mx-auto d-block rounded">
                                        </a>
                                        <a class="nav-link" id="product-4-tab" data-bs-toggle="pill" href="#product-4" role="tab" aria-controls="product-4" aria-selected="false">
                                            <img src="/assets/images/product/img-8.png" alt="" class="img-fluid mx-auto d-block rounded">
                                        </a>
                                    </div>
                                </div> -->
                                <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="product-1" role="tabpanel" aria-labelledby="product-1-tab">
                                            <div>
                                                <img src="<?= base_url('admin/produk/'.$value->photo_produk) ?>" alt="" class="img-fluid mx-auto d-block">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                     
                        </div>
                    </div>
    
                    <div class="col-xl-6">

                        <div class="mt-4 mt-xl-3">
                            <a href="javascript: void(0);" class="text-primary"><?= $value->kategori?></a>
                            <h4 class="mt-1 mb-3"><?= $value->nama_produk?></h4>
                            <h5 class="mb-4">Price : <span class="text-muted me-2"></span> <b id="harga_produk_p"><?= $value->harga_produk?></b></h5>
                            <p class="text-muted mb-4"><?= $value->keterangan?></p>
                            <a href="#" onclick="tambahKeranjang(this)" data-kodeproduk="<?= $value->id ?>">
                                <button type="button" class="btn btn-primary waves-effect waves-light mt-2 me-1">
                                    <i class="bx bx-cart me-2"></i>Add to cart
                                </button>
                            </a>

                            <!-- <div class="product-color">
                                <h5 class="font-size-15">Color :</h5>
                                <a href="javascript: void(0);" class="active">
                                    <div class="product-color-item border rounded">
                                        <img src="assets/images/product/img-7.png" alt="" class="avatar-md">
                                    </div>
                                    <p>Black</p>
                                </a>
                                <a href="javascript: void(0);">
                                    <div class="product-color-item border rounded">
                                        <img src="assets/images/product/img-7.png" alt="" class="avatar-md">
                                    </div>
                                    <p>Blue</p>
                                </a>
                                <a href="javascript: void(0);">
                                    <div class="product-color-item border rounded">
                                        <img src="assets/images/product/img-7.png" alt="" class="avatar-md">
                                    </div>
                                    <p>Gray</p>
                                </a>
                            </div> -->
                        </div>
                 
                    </div>
                    <?php
                        endforeach;
                        ?>
                </div>
                <!-- end row -->

                <!-- end Specifications -->
            </div>
        </div>
    </div>
</div>
<script>
    var pHarga = document.getElementById("harga_produk_p");
    function formatHarga() {
        var harga = pHarga.textContent.replace(/\D/g, ''); 
        var hargaFormat = "Rp " + new Intl.NumberFormat().format(harga);
        pHarga.textContent = hargaFormat;
    }
    formatHarga();
</script>

<script>
    function tambahKeranjang(isi) {
        var kodeProduk = $(isi).data('kodeproduk');
    $.ajax({
        url: "/cart",
        method: "POST",
        data: {
            id: kodeProduk
        },
        success: function (data) {
            var message = data.message;
            console.log(message);
            getCart();

                    $('body').alert({
                        x: 'right',
                        y: 'bottom',
                        xOffset: 30,
                        yOffset: 30,
                        alertSpacing: 40,
                        fadeDelay: 0.3,
                        autoClose: false,
                        template: 'survey',
                        
                        buttonSrc: ['cart'],
                        buttonText: 'Cek <span class="primary">Keranjang</span>',});

        },
        error: function (ts) {
            alert(ts.responseText);
        },
    });
        }

        function getCart() {
            $.ajax({
                type: "get",
                dataType: "html",
                url: "seeCart",
                success: function (msg) {
                    $("#tampilProduk").html(msg);
                },
                error: function (ts) {
                    alert(ts.responseText);
                },
            });
        }

     
</script>
<?=$this->endSection()?>