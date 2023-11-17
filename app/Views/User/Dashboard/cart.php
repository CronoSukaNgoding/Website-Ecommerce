<?= $this->extend('Template/template') ?>

<?= $this->section('IsKonten') ?>
<div class="row">
    <div class="col-xl-10">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle mb-0 table-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th>Gambar</th>
                                <th>Produk</th>
                                <th>Jumlah</th>
                                <th>Berat</th>
                                <th>Harga</th>
                                <th>Pilih Layanan</th>
                                <th>ongkir</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $index = 0; 
                                foreach ($keranjang as $value):
                                    ?>
                            <tr class="cart-item">
                                <input type="hidden" class="dataIdProduk" value="<?=$value->id_produk?>">
                                <input type="hidden"  class="dataIdCart" value="<?= session()->get('unikSesi')?>">
                                
                                <td>
                                    <img src="<?= base_url('admin/produk/'.$value->photo_produk) ?>" alt="product-img"
                                        title="product-img" class="avatar-md" />
                                </td>
                                <td>
                                    <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark"><?= $value->nama_produk?></a></h5>
                                    <p class="mb-0">Brand : <span class="fw-medium"><?=$value->sub_kategori?></span></p>
                                </td>
                                <td class="quantity">
                                    <button id="decrement-btn" type="button" class="btn btn-light">-</button>
                                    <input type="number" class="form-control-sm text-center custom-input jmlbarang" value="1" disabled>
                                    <button id="increment-btn" type="button" class="btn btn-light">+</button>
                                </td>
                                <td class="berat_produk"> <?= $value->beratProduk?> (gram)</td>
                                <td class="harga_produk">
                                    <?= $value->harga_produk?>
                                </td>                           
                                <td>
                                   <select name="biayaOngkir" class="form-control select2 accesLayanan "></select>


                                </td>

                                <td id="ongkirResult<?=$index?>" class="ongkirResult">Rp.0</td>
                                <td>
                                    <button
                                        class="btn btn-danger btn-sm  btn-bg-gradient-x-blue-green box-shadow-2" type="button"
                                            value=""
                                        title="Hapus Produk" data-bs-toggle="modal"  data-bs-target="#hapus<?= $value->id_cart;?>"><i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php
                                    $index++; 
                                endforeach;
                                ?>
                        </tbody>

                        
                    </table>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-6">
                        <a href="<?= base_url('dashboard')?>" class="btn btn-secondary">
                            <i class="mdi mdi-arrow-left me-1"></i> Continue Shopping </a>
                    </div> <!-- end col -->
                    <div class="col-sm-6">
                        <div class="text-sm-end mt-2 mt-sm-0">
                        <!-- <a href="#" id="checkoutLink" class="btn btn-success">
                            <i class="mdi mdi-cart-arrow-right me-1"></i> Checkout
                        </a> -->
                        <a href="#"  class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmationModal">
                            <i class="mdi mdi-cart-arrow-right me-1"></i> Checkout
                        </a>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row-->
            </div>
        </div>
    </div>
    <div class="col-xl-10">
        <div class="card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Order Summary</h4>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <tbody>

                            <tr>
                                <th>Total Harga Sebelum Ongkir :</th>
                                <th id="grandTotal">0</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- Modal hapus -->
    <?php foreach($keranjang as $value) : ?>
    <div class="modal fade text-left" id="hapus<?= $value->id_cart;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?=base_url("cart/delete/". $value->id_cart)?>" method="post">
                <?= csrf_field(); ?>
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35"> Hapus pembelian produk ini ?</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <div class="modal fade text-left" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel35"> Apakah anda yakin untuk men-Checkout barang ini ?</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <!-- Change the ID of the submit button to prevent conflicts -->
                <button type="submit" id="checkoutLink" class="btn btn-primary">Yakin</button>
            </div>
        </div>
    </div>
</div>
    </div> <!-- end col -->

</div>
<!-- end row -->



<script>
    
    $(document).ready(function() {
        $('#checkoutLink').on('click', function(event) {
            event.preventDefault();
            saveCheckoutItemsToServer();
        });
    });
    
    




    function saveCheckoutItemsToServer(){
        
        const checkoutItems = [];
       $('.cart-item').each(function() {
            const $row = $(this);
            const id_produk = $row.find('.dataIdProduk').val(); 
            const id_cart = $row.find('.dataIdCart').val();
            const quantity = parseInt($row.find('.jmlbarang').val());
            const price = parseFloat($row.find('.harga_produk').text().replace('Rp ', '').replace('.', '').replace(',', '.'));


           const ongkirValue = parseFloat($row.find('.ongkirResult').text().replace('Rp ', '').replace('.', '').replace(',', '.'));

            const item = {
                id_cart: id_cart,
                id_produk: id_produk,
                quantity: quantity,
                price: price,
                biayaOngkir: ongkirValue 
            };
            console.log(item);

            checkoutItems.push(item);
        });



        $.ajax({
            url: '/checkout/save',
            type: 'POST',
            dataType: 'json',
            data: JSON.stringify({ checkoutItems: checkoutItems }),
            contentType: 'application/json',
            
            success: function(response) {
                if (response.error) {
                     toastr.error( response.error);
                    console.error('Error saving checkout items:', response.error);
                } else {
                    console.log('Checkout items saved successfully:', response.message);
                    window.location.replace('/checkout/' + response.data);
                }
            },
            error: function(error) {
                console.error('Error saving checkout items:', error);
            }
        });
        
    }


function updateDropdown(dropdown, shippingCosts, index) {

    dropdown.empty();


    for (const cost of shippingCosts) {
        const service = cost.service;
        const description = cost.description;
        const value = cost.cost[0].value;
        const etd = cost.cost[0].etd;

        dropdown.append($('<option>', {
            value: value,
            text: 'Layanan: ' + description + ' - Biaya: Rp ' + value + ' (Estimasi ' + etd + ' hari)'
        }));
    }


    $('#ongkirResult' + index).text('Rp ' + shippingCosts[0].cost[0].value);
}


function handleDropdownChange(index) {
    const dropdown = $('.accesLayanan').eq(index);

    dropdown.on('change', function() {
        const selectedValue = $(this).val();
        $('#ongkirResult' + index).text('Rp ' + selectedValue);
    });
}

$('.accesLayanan').each(function(index) {
    const beratProduk = parseFloat($('.berat_produk').eq(index).text().replace(' (gram)', ''));
    const dropdown = $(this);

    $.ajax({
        url: '/cost',
        method: 'POST',
        data: {
            beratProduk: beratProduk
        },
        success: function(response) {
            console.log('Berat produk berhasil dikirim ke /cost:', response);

            if (Array.isArray(response.hargaOngkir[index])) {
                updateDropdown(dropdown, response.hargaOngkir[index], index);
                handleDropdownChange(index); 
            } else {
                console.error('Respons tidak berisi array yang dapat diiterasi:', response);
            }
        },
        error: function(error) {
            console.error('Terjadi kesalahan saat mengirim data ke /cost:', error);
        }
    });
});


</script>











<?=$this->endSection()?>




