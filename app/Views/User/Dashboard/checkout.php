<?= $this->extend('Template/template-bayar') ?>

<?= $this->section('IsKonten') ?>

<div class="checkout-tabs">
    <div class="row">
        <div class="col-xl-2 col-sm-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-shipping-tab" data-bs-toggle="pill" href="#v-pills-shipping"
                    role="tab" aria-controls="v-pills-shipping" aria-selected="true">
                    <i class="bx bxs-truck d-block check-nav-icon mt-4 mb-2"></i>
                    <p class="fw-bold mb-4">Shipping Info</p>
                </a>
            </div>
        </div>
        <div class="col-xl-10 col-sm-9 ">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-shipping" role="tabpanel"
                            aria-labelledby="v-pills-shipping-tab">
                            <div>
                                <h4 class="card-title">Shipping information</h4>
                                <p class="card-title-desc">Fill all information below</p>

                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group row mb-4">
                                        <label for="billing-name" class="col-md-2 col-form-label">Name</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="billing-name"
                                                value="<?= $profile->fullname;?>">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="billing-email-address" class="col-md-2 col-form-label">Email
                                            Address</label>
                                        <div class="col-md-10">
                                            <input type="email" class="form-control" id="billing-email-address"
                                                value="<?= $profile->email;?>">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="billing-phone" class="col-md-2 col-form-label">Phone</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="billing-phone"
                                                value="<?= $profile->nohp;?>">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="billing-address" class="col-md-2 col-form-label">Address</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" id="billing-address" rows="3"
                                                placeholder="Enter full address"><?= $profile->alamat;?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="billing-email-address" class="col-md-2 col-form-label">Kode
                                            POS</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="billing-email-address"
                                                value="<?= $profile->Kode_POS;?>">
                                        </div>
                                    </div>
                                </form>
                                <hr color="grey" size="5px" />

                                <div class="form-group row mb-0">
                                    <label class="col-md-2 col-form-label">Order
                                        Notes:</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control notes" id="notes" name="notes" rows="3"
                                            placeholder="Write some note.."></textarea>
                                    </div>
                                </div>

                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Order Summary</h4>

                    <div class="table-responsive">
                        <table class="table align-middle mb-0 table-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Product Desc</th>
                                    <th scope="col">Ongkir</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                            $total = 0; 
					foreach ($result as $value):
						?>
                                <tr class="cart-item">

                                    <input type="hidden" value="<?=$value->id_produk?>" class="idProduk">
                                    <input type="hidden" value="<?=$value->id_cart?>" class="idCart">
                                    <input type="hidden" value="<?=$value->qty?>" class="qty">
                                    <td>
                                        <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html"
                                                class="text-dark"><?= $value->nama_produk?></a></h5>
                                        <p class="text-muted mb-0">Rp <?= $value->harga_produk?> x <?= $value->qty?></p>
                                    </td>
                                    <td><?php echo'Rp ' . number_format($value->biayaOngkir, 2, ',', '.'); ?></td>
                                    <td><?php
                                        $subtotal = ($value->harga_produk * $value->qty) + $value->biayaOngkir ;
                                        echo 'Rp ' . number_format($subtotal, 2, ',', '.');
                                        $total += $subtotal;
                                        ?></td>

                                    <input name="id_checkout" type="hidden" class="idCheckout"
                                        value="<?= $value->idcekot?>">

                                </tr>



                                <?php
					endforeach
						?>
                                <tr>
                                    <td colspan="2" class="text-end fw-bold ">Total:</td>
                                    <td><?= 'Rp ' . number_format($total, 2, ',', '.'); ?></td>
                                    <input name="total" type="hidden" value="<?= $total?>" class="hargaTotal">
                                </tr>
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 mt-4">
            <div class="text-end">
                <!-- Button Triggering Modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#confirmationModal">Batal</button>
                <button type="submit" class="btn btn-success" onclick="savePrePaymentItemsToServer(this)">
                    <i class="mdi mdi-truck-fast me-1"></i> Proceed to Shipping
                </button>
            </div>
        </div>

    </div>
</div>
<!-- Modal Structure -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="<?= base_url('/checkout/del/').$id?>" method="POST">
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

<!-- end row -->
<script>
function savePrePaymentItemsToServer() {


    const PrePaymentItems = [];
    const totalData = $('.hargaTotal').val(); 
    const notesData = $('.notes').val(); 
    const totalArray = totalData.split(',');
    const notesArray = notesData.split(',');


    $('.cart-item').each(function(index) {
        const $row = $(this);
        const id_produk = $row.find('.idProduk').val(); 
        const id_cart = $row.find('.idCart').val(); 
        const id_checkout = $row.find('.idCheckout').val(); 
        const qty = $row.find('.qty').val(); 
        const total = totalArray;
        const notes = notesArray;

        const item = {
            id_cart: id_cart,
            id_produk: id_produk,
            id_checkout: id_checkout,
            total: total,
            notes: notes,
            qty: qty
        };

        PrePaymentItems.push(item);
    });

    $.ajax({
        url: '/checkout/pre-payment',
        type: 'POST',
        dataType: 'json',
        data: JSON.stringify({ PrePaymentItems: PrePaymentItems }),
        contentType: 'application/json',
        
        success: function(response) {
            console.log('PrePayment items saved successfully:', response);
            const newLocation = '/payment/' + response.data;
            console.log('New location:', newLocation); 
            window.location.replace(newLocation);
        },
        error: function(error) {
            console.error('Error saving prepayment items:', error );
        }
    });
}




</script>
<?=$this->endSection()?>