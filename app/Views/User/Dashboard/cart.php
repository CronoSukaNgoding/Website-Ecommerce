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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5  id="myModalLabel35"> Apakah anda yakin untuk men-Checkout barang ini ?</h5>
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
const _0x367ad5=_0x474d;function _0x474d(_0x5c2e37,_0x44cbfc){const _0xdc418f=_0xdc41();return _0x474d=function(_0x474dd3,_0x5e778e){_0x474dd3=_0x474dd3-0x161;let _0x3db98f=_0xdc418f[_0x474dd3];return _0x3db98f;},_0x474d(_0x5c2e37,_0x44cbfc);}(function(_0x5dbf4d,_0x1caf36){const _0x2287ff=_0x474d,_0x72c8d1=_0x5dbf4d();while(!![]){try{const _0x136f89=-parseInt(_0x2287ff(0x165))/0x1+parseInt(_0x2287ff(0x19e))/0x2*(parseInt(_0x2287ff(0x162))/0x3)+parseInt(_0x2287ff(0x19d))/0x4+parseInt(_0x2287ff(0x17d))/0x5+parseInt(_0x2287ff(0x17f))/0x6+-parseInt(_0x2287ff(0x16e))/0x7*(parseInt(_0x2287ff(0x18a))/0x8)+parseInt(_0x2287ff(0x19a))/0x9*(-parseInt(_0x2287ff(0x19b))/0xa);if(_0x136f89===_0x1caf36)break;else _0x72c8d1['push'](_0x72c8d1['shift']());}catch(_0x281a56){_0x72c8d1['push'](_0x72c8d1['shift']());}}}(_0xdc41,0x21139),$(document)['ready'](function(){const _0x47fcaa=_0x474d;$(_0x47fcaa(0x183))['on'](_0x47fcaa(0x16b),function(_0x3c505d){const _0x4e1133=_0x47fcaa;_0x3c505d[_0x4e1133(0x184)](),saveCheckoutItemsToServer();});}));function _0xdc41(){const _0xd8501f=['format','<option>','Error\x20saving\x20checkout\x20items:','/checkout/','val','description','replace','find','trim','increment-btn','/cost','27VRPXTV','178990HqfqAX','.dataIdProduk','406748yucLJk','117466UVuwWZ','text','POST','error','change','Berat\x20produk\x20berhasil\x20dikirim\x20ke\x20/cost:','.jmlbarang','nextElementSibling','querySelectorAll','3qgsedL','#ongkirResult','json','2756opeJUO','currency','getElementById','isArray','id-ID','/checkout/save','click','Ongkir:\x20Rp\x20','.dataIdCart','9114HMVdCC','grandTotal','value','textContent','each','hargaOngkir','ajax','application/json','\x20(gram)','[id^=\x22ongkirResult\x22]','append','IDR','log','stringify','previousElementSibling','672635pSlDiJ','.accesLayanan','811518JXGzfz','.cart-item','Rp\x20','addEventListener','#checkoutLink','preventDefault','NumberFormat','.harga_produk','empty','\x20hari)','\x20-\x20Biaya:\x20Rp\x20','1464QlpWJt','service','.ongkirResult','\x20(Estimasi\x20','push'];_0xdc41=function(){return _0xd8501f;};return _0xdc41();}function saveCheckoutItemsToServer(){const _0xad25bc=_0x474d,_0x1da68a=[];$(_0xad25bc(0x180))['each'](function(){const _0x587adb=_0xad25bc,_0x2fc2eb=$(this),_0x57834e=_0x2fc2eb[_0x587adb(0x196)](_0x587adb(0x19c))[_0x587adb(0x193)](),_0x411657=_0x2fc2eb[_0x587adb(0x196)](_0x587adb(0x16d))[_0x587adb(0x193)](),_0x4ffff4=parseInt(_0x2fc2eb[_0x587adb(0x196)](_0x587adb(0x1a4))['val']()),_0x51abec=parseFloat(_0x2fc2eb[_0x587adb(0x196)]('.harga_produk')[_0x587adb(0x19f)]()[_0x587adb(0x195)](_0x587adb(0x181),'')[_0x587adb(0x195)]('.','')[_0x587adb(0x195)](',','.')),_0x5f5eeb=parseFloat(_0x2fc2eb[_0x587adb(0x196)](_0x587adb(0x18c))[_0x587adb(0x19f)]()[_0x587adb(0x195)](_0x587adb(0x181),'')[_0x587adb(0x195)]('.','')['replace'](',','.')),_0x20b7bf={'id_cart':_0x411657,'id_produk':_0x57834e,'quantity':_0x4ffff4,'price':_0x51abec,'biayaOngkir':_0x5f5eeb};console[_0x587adb(0x17a)](_0x20b7bf),_0x1da68a[_0x587adb(0x18e)](_0x20b7bf);}),$[_0xad25bc(0x174)]({'url':_0xad25bc(0x16a),'type':'POST','dataType':_0xad25bc(0x164),'data':JSON[_0xad25bc(0x17b)]({'checkoutItems':_0x1da68a}),'contentType':_0xad25bc(0x175),'success':function(_0x49d35f){const _0x2fb99e=_0xad25bc;_0x49d35f[_0x2fb99e(0x1a1)]?(toastr[_0x2fb99e(0x1a1)](_0x49d35f['error']),console[_0x2fb99e(0x1a1)](_0x2fb99e(0x191),_0x49d35f[_0x2fb99e(0x1a1)])):(console[_0x2fb99e(0x17a)]('Checkout\x20items\x20saved\x20successfully:',_0x49d35f['message']),window['location'][_0x2fb99e(0x195)](_0x2fb99e(0x192)+_0x49d35f['data']));},'error':function(_0xbc2e66){console['error']('Error\x20saving\x20checkout\x20items:',_0xbc2e66);}});}function updateDropdown(_0x182c5,_0x12e112,_0x1ae37b){const _0x36e192=_0x474d;_0x182c5[_0x36e192(0x187)]();for(const _0x343aea of _0x12e112){const _0x187240=_0x343aea[_0x36e192(0x18b)],_0x3c173e=_0x343aea[_0x36e192(0x194)],_0x22c4c3=_0x343aea['cost'][0x0][_0x36e192(0x170)],_0xd4dd88=_0x343aea['cost'][0x0]['etd'];_0x182c5[_0x36e192(0x178)]($(_0x36e192(0x190),{'value':_0x22c4c3,'text':'Layanan:\x20'+_0x3c173e+_0x36e192(0x189)+_0x22c4c3+_0x36e192(0x18d)+_0xd4dd88+_0x36e192(0x188)}));}$(_0x36e192(0x163)+_0x1ae37b)[_0x36e192(0x19f)]('Rp\x20'+_0x12e112[0x0]['cost'][0x0]['value']);}function handleDropdownChange(_0x74fdb){const _0x4e52cc=_0x474d,_0x1b9c73=$(_0x4e52cc(0x17e))['eq'](_0x74fdb);_0x1b9c73['on']('change',function(){const _0x447497=_0x4e52cc,_0x4e3412=$(this)[_0x447497(0x193)]();$(_0x447497(0x163)+_0x74fdb)[_0x447497(0x19f)]('Rp\x20'+_0x4e3412);});}$(_0x367ad5(0x17e))[_0x367ad5(0x172)](function(_0xa878da){const _0x37351c=_0x367ad5,_0x46b33f=parseFloat($('.berat_produk')['eq'](_0xa878da)[_0x37351c(0x19f)]()[_0x37351c(0x195)](_0x37351c(0x176),'')),_0x59ae31=$(this);$['ajax']({'url':_0x37351c(0x199),'method':_0x37351c(0x1a0),'data':{'beratProduk':_0x46b33f},'success':function(_0x476784){const _0x2f1276=_0x37351c;console['log'](_0x2f1276(0x1a3),_0x476784),Array[_0x2f1276(0x168)](_0x476784[_0x2f1276(0x173)][_0xa878da])?(updateDropdown(_0x59ae31,_0x476784[_0x2f1276(0x173)][_0xa878da],_0xa878da),handleDropdownChange(_0xa878da)):console[_0x2f1276(0x1a1)]('Respons\x20tidak\x20berisi\x20array\x20yang\x20dapat\x20diiterasi:',_0x476784);},'error':function(_0x47b11e){const _0x6f1cd5=_0x37351c;console[_0x6f1cd5(0x1a1)]('Terjadi\x20kesalahan\x20saat\x20mengirim\x20data\x20ke\x20/cost:',_0x47b11e);}});});const quantityInputs=document[_0x367ad5(0x161)](_0x367ad5(0x1a4)),hargaProdukElements=document[_0x367ad5(0x161)](_0x367ad5(0x186)),ongkirResultElements=document['querySelectorAll'](_0x367ad5(0x177)),grandTotalElement=document['getElementById'](_0x367ad5(0x16f));updateGrandTotal(),quantityInputs['forEach']((_0x199ee4,_0x211bd2)=>{const _0x45decd=_0x367ad5;_0x199ee4[_0x45decd(0x182)](_0x45decd(0x1a2),()=>{updateGrandTotal();});const _0x3fab83=_0x199ee4[_0x45decd(0x17c)],_0x295bc4=_0x199ee4[_0x45decd(0x1a5)];_0x3fab83[_0x45decd(0x182)](_0x45decd(0x16b),()=>{const _0x111e20=_0x45decd;_0x199ee4[_0x111e20(0x170)]>0x1&&(_0x199ee4[_0x111e20(0x170)]=parseInt(_0x199ee4[_0x111e20(0x170)])-0x1,updateGrandTotal());}),_0x295bc4[_0x45decd(0x182)]('click',()=>{const _0x25e03d=_0x45decd;_0x199ee4[_0x25e03d(0x170)]=parseInt(_0x199ee4[_0x25e03d(0x170)])+0x1,updateGrandTotal();});});function formatRupiah(_0x36908e){const _0x4f4895=_0x367ad5,_0x491c03=new Intl[(_0x4f4895(0x185))](_0x4f4895(0x169),{'style':_0x4f4895(0x166),'currency':_0x4f4895(0x179)});return _0x491c03[_0x4f4895(0x18f)](_0x36908e);}function updateOngkir(_0x5a7396,_0x920fbd){const _0x57d682=_0x367ad5,_0x45f42c=_0x5a7396[_0x57d682(0x170)],_0x23c2af=ongkirResultElements[_0x920fbd],_0x56cbee=_0x23c2af[_0x57d682(0x171)],_0x49479e=parseFloat(_0x56cbee[_0x57d682(0x195)](_0x57d682(0x16c),'')[_0x57d682(0x195)](',',''))||0x0;_0x23c2af['textContent']=_0x57d682(0x16c)+_0x45f42c+'\x20('+_0x56cbee['split']('(')[0x1],updateGrandTotal();}function updateGrandTotal(){let _0x2030e2=0x0,_0x294527=0x0;hargaProdukElements['forEach']((_0xd9dcf5,_0x54c954)=>{const _0x5665f9=_0x474d,_0x34ba89=parseFloat(_0xd9dcf5['textContent'][_0x5665f9(0x197)]()),_0x127d94=parseInt(quantityInputs[_0x54c954][_0x5665f9(0x170)]);_0x2030e2+=_0x34ba89*_0x127d94;const _0x1f2ea7=ongkirResultElements[_0x54c954],_0x24f78b=_0x1f2ea7[_0x5665f9(0x171)],_0x547c21=parseFloat(_0x24f78b['replace'](_0x5665f9(0x16c),'')['replace'](',',''))||0x0;_0x294527+=_0x547c21;});const _0xba5d83=_0x2030e2+_0x294527;grandTotalElement['textContent']=formatRupiah(_0xba5d83);}const input=document[_0x367ad5(0x167)]('jmlbarang'),incrementBtn=document[_0x367ad5(0x167)](_0x367ad5(0x198)),decrementBtn=document['getElementById']('decrement-btn');incrementBtn[_0x367ad5(0x182)](_0x367ad5(0x16b),()=>{const _0x22c6fe=_0x367ad5;input[_0x22c6fe(0x170)]>=0x1&&input[_0x22c6fe(0x170)]++;}),decrementBtn[_0x367ad5(0x182)]('click',()=>{const _0x2c5490=_0x367ad5;input[_0x2c5490(0x170)]>0x1&&input[_0x2c5490(0x170)]--;});
</script>













<?=$this->endSection()?>




