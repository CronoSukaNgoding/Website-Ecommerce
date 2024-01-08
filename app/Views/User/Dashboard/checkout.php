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
                                     <th scope="col">Product</th>
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

                                    <th scope="row"><img src="<?= base_url('admin/produk/'.$value->photo_produk) ?>"
                                            alt="product-img" title="product-img" class="avatar-md"></th>
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
                                    <td colspan="3" class="text-end fw-bold ">Total:</td>
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
function _0x65a7(_0x9a5cae,_0x178736){const _0x236adf=_0x236a();return _0x65a7=function(_0x65a752,_0x2db899){_0x65a752=_0x65a752-0x108;let _0x16d28e=_0x236adf[_0x65a752];return _0x16d28e;},_0x65a7(_0x9a5cae,_0x178736);}(function(_0x374c5d,_0x428b8f){const _0x35a115=_0x65a7,_0x1cac81=_0x374c5d();while(!![]){try{const _0x4970e5=parseInt(_0x35a115(0x108))/0x1+parseInt(_0x35a115(0x111))/0x2*(parseInt(_0x35a115(0x10c))/0x3)+parseInt(_0x35a115(0x115))/0x4*(-parseInt(_0x35a115(0x121))/0x5)+parseInt(_0x35a115(0x112))/0x6*(-parseInt(_0x35a115(0x11b))/0x7)+parseInt(_0x35a115(0x124))/0x8+parseInt(_0x35a115(0x11d))/0x9*(-parseInt(_0x35a115(0x117))/0xa)+-parseInt(_0x35a115(0x123))/0xb*(parseInt(_0x35a115(0x11e))/0xc);if(_0x4970e5===_0x428b8f)break;else _0x1cac81['push'](_0x1cac81['shift']());}catch(_0x560120){_0x1cac81['push'](_0x1cac81['shift']());}}}(_0x236a,0x68566));function savePrePaymentItemsToServer(){const _0x2cc1c3=_0x65a7,_0x120bd0=[],_0xd2ccb6=$('.hargaTotal')[_0x2cc1c3(0x109)](),_0x6c5263=$(_0x2cc1c3(0x113))['val'](),_0x2ebeb8=_0xd2ccb6['split'](','),_0xe2f816=_0x6c5263[_0x2cc1c3(0x120)](',');$(_0x2cc1c3(0x11a))[_0x2cc1c3(0x119)](function(_0x4b6963){const _0x55c534=_0x2cc1c3,_0x1bd1ff=$(this),_0x185876=_0x1bd1ff[_0x55c534(0x11f)](_0x55c534(0x116))[_0x55c534(0x109)](),_0x216798=_0x1bd1ff[_0x55c534(0x11f)]('.idCart')[_0x55c534(0x109)](),_0x7fbd92=_0x1bd1ff[_0x55c534(0x11f)]('.idCheckout')[_0x55c534(0x109)](),_0x2bf04f=_0x1bd1ff['find'](_0x55c534(0x118))[_0x55c534(0x109)](),_0x47d042=_0x2ebeb8,_0x12d448=_0xe2f816,_0x24b87d={'id_cart':_0x216798,'id_produk':_0x185876,'id_checkout':_0x7fbd92,'total':_0x47d042,'notes':_0x12d448,'qty':_0x2bf04f};_0x120bd0[_0x55c534(0x10b)](_0x24b87d);}),$[_0x2cc1c3(0x11c)]({'url':_0x2cc1c3(0x110),'type':_0x2cc1c3(0x10d),'dataType':'json','data':JSON['stringify']({'PrePaymentItems':_0x120bd0}),'contentType':'application/json','success':function(_0x5ab316){const _0xf8eccb=_0x2cc1c3;console['log']('PrePayment\x20items\x20saved\x20successfully:',_0x5ab316);const _0x1f831e=_0xf8eccb(0x10e)+_0x5ab316[_0xf8eccb(0x10a)];console['log'](_0xf8eccb(0x125),_0x1f831e),window[_0xf8eccb(0x122)][_0xf8eccb(0x114)](_0x1f831e);},'error':function(_0x1a2a70){const _0x511d10=_0x2cc1c3;console[_0x511d10(0x10f)]('Error\x20saving\x20prepayment\x20items:',_0x1a2a70);}});}function _0x236a(){const _0x63c03f=['685032JLhKED','val','data','push','12ZlkIBq','POST','/payment/','error','/checkout/pre-payment','236194iOIOOP','335406WUftct','.notes','replace','1388DzYBpB','.idProduk','1119760fpkcjG','.qty','each','.cart-item','14rTcmTF','ajax','36gYpSlv','84ntNdOt','find','split','10565ezRciS','location','409761CRQzFv','6588960aQGDZK','New\x20location:'];_0x236a=function(){return _0x63c03f;};return _0x236a();}




</script>
<?=$this->endSection()?>