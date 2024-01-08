<?= $this->extend('Template/template') ?>

<?= $this->section('IsKonten') ?>

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Data Diri</h4>
                <p class="card-title-desc">Isi Form Berikut</p>

                <form action="<?=base_url("profile/updateprofil/". $user->user_id)?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="fullname" id="nama" placeholder="Nama"
                                value="<?= $result->fullname;?>" autocomplete="off" required>
                            </div>

                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="email"
                                value="<?= $result->email;?>" autocomplete="off" required>
                            </div>

                            <div class="mb-3">
                                <label for="nohp">Nomor HP</label>
                                <input type="number" class="form-control" id="nohp" name="nohp" placeholder="Nomor HP"
                                value="" autocomplete="off" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="control-label" for="provinsi">Provinsi</label>
                                <select id="provinsi" name="provinsi" class="form-control select2">
                                    <option selected disabled>Silahkan pilih provinsi</option>
                                    <?php foreach ($response1 as $value): ?>
                                        <option value="<?=$value->province_id?>"><?=$value->province?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>


                            <div class="mb-3">
                                <label class="control-label" for="kota">Kota</label>
                                <select id="kota" name="kota" class="form-control select2">
                                    <option selected disabled>Silahkan pilih Kota</option>
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" rows="3" name="alamat" placeholder="Alamat"
                                autocomplete="off" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="rt">RT</label>
                                <input type="number" class="form-control" id="rt" name="rt" placeholder="Nomor HP"
                                value="" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label for="rw">RW</label>
                                <input type="number" class="form-control" id="rw" name="rw" placeholder="Nomor HP"
                                value="" autocomplete="off" required>
                            </div>

                            <div class="mb-3">
                                <label for="Kode_POS">Kode POS</label>
                                <input type="number" class="form-control" id="kodepos" name="kodepos" placeholder="Nomor HP"
                                value="" autocomplete="off" required>
                            </div>

                            <div class="mb-3">
                                <label for="avatar">Pas Foto</label>
                                <input type="file" class="form-control" id="avatar" name="avatar" placeholder="Pas Foto"
                                value="" autocomplete="off" required>
                            </div>

                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                         <a href="<?= base_url('/dashboard')?>"><button type="button" class="btn btn-danger waves-effect waves-light">Batal</button></a>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<!-- CKEDITOR -->
<script src="/assets/js/pages/form-advanced.init.js"></script>
<script src="/assets/libs/select2/js/select2.min.js"></script>
<script>
var _0x3e6904=_0x2e92;(function(_0x5e62f8,_0xdb6241){var _0x48a308=_0x2e92,_0x32dbee=_0x5e62f8();while(!![]){try{var _0x2c6ab0=-parseInt(_0x48a308(0xf7))/0x1*(parseInt(_0x48a308(0xf0))/0x2)+-parseInt(_0x48a308(0x100))/0x3*(parseInt(_0x48a308(0xfb))/0x4)+parseInt(_0x48a308(0x104))/0x5+parseInt(_0x48a308(0xf4))/0x6+-parseInt(_0x48a308(0xf5))/0x7+-parseInt(_0x48a308(0xf3))/0x8+parseInt(_0x48a308(0x103))/0x9;if(_0x2c6ab0===_0xdb6241)break;else _0x32dbee['push'](_0x32dbee['shift']());}catch(_0x3b761d){_0x32dbee['push'](_0x32dbee['shift']());}}}(_0x1bae,0x31500),$(document)[_0x3e6904(0xff)](function(){var _0x82b381=_0x3e6904;$(_0x82b381(0xed))[_0x82b381(0xfa)](function(){var _0x4ec9dc=_0x82b381,_0x588a08=$(this)[_0x4ec9dc(0xfd)]();console[_0x4ec9dc(0xfc)](_0x588a08);var _0x16891a=$('#kota');$['ajax']({'url':_0x4ec9dc(0xf1),'method':'GET','data':{'provinsi_id':_0x588a08},'dataType':'json','success':function(_0x1f9b67){var _0x3ae5f4=_0x4ec9dc;_0x16891a[_0x3ae5f4(0x102)](_0x3ae5f4(0xee))[_0x3ae5f4(0xf6)](':first')[_0x3ae5f4(0xf8)](),$[_0x3ae5f4(0xef)](_0x1f9b67,function(_0x1078c3,_0xed6dab){var _0x5ee485=_0x3ae5f4;_0x16891a['append']($(_0x5ee485(0xf9),{'value':_0xed6dab[_0x5ee485(0xfe)],'text':_0xed6dab[_0x5ee485(0xf2)],'data-province':_0xed6dab[_0x5ee485(0x101)]}));});},'error':function(){console['error']('Terjadi\x20kesalahan\x20saat\x20mengambil\x20data\x20kota.');}});});}));function _0x2e92(_0x5ab81b,_0x3a360e){var _0x1bae4=_0x1bae();return _0x2e92=function(_0x2e92a4,_0x56f800){_0x2e92a4=_0x2e92a4-0xed;var _0x23c45a=_0x1bae4[_0x2e92a4];return _0x23c45a;},_0x2e92(_0x5ab81b,_0x3a360e);}function _0x1bae(){var _0x402b0e=['#provinsi','option','each','2lFJaTs','/get-kota-by-provinsi','city_name','1796200DSMYXO','120198YKnykj','1690318zxmaRJ','not','384473RmwkJG','remove','<option>','change','399132ymedAD','log','val','city_id','ready','3JZjxKX','province_id','find','8102736JipghH','1159510kLKTKy'];_0x1bae=function(){return _0x402b0e;};return _0x1bae();}
</script>
<?=$this->endSection()?>