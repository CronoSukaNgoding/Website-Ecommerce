<?= $this->extend('Template/template') ?>

<?= $this->section('IsKonten') ?>

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Data Diri</h4>
                <p class="card-title-desc">Isi Form Berikut</p>

                <form action="<?=base_url("/profile/updateprofil/". $user->user_id)?>" method="post"
                    enctype="multipart/form-data">
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
                                    value="<?= $result->nohp;?>" autocomplete="off" required>
                            </div>

                            <div class="mb-3">
                                <label class="control-label" for="provinsi">Provinsi</label>
                                <select id="provinsi" name="provinsi" class="form-control select2">
                                    <option selected value="<?=$result->province_id?>"><?=$result->province?></option>
                                    <?php foreach ($response1 as $value): ?>
                                    <option value="<?=$value->province_id?>"><?=$value->province?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>


                            <div class="mb-3">
                                <label class="control-label" for="kota">Kota</label>
                                <select id="kota" name="kota" class="form-control select2">
                                    <option selected value="<?=$result->city_id?>"><?=$result->city_name?></option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" rows="3" name="alamat" placeholder="Alamat"
                                    autocomplete="off" required><?= $result->alamat;?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="rt">RT</label>
                                <input type="number" class="form-control" id="rt" name="rt" placeholder="RT"
                                    value="<?= $result->rt;?>" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label for="rw">RW</label>
                                <input type="number" class="form-control" id="rw" name="rw" placeholder="RW"
                                    value="<?= $result->rw;?>" autocomplete="off" required>
                            </div>
    
                            <div class="mb-3">
                                <label for="Kode_POS">Kode POS</label>
                                <input type="number" class="form-control" id="kodepos" name="kodepos" placeholder="Kode POS"
                                    value="<?= $result->Kode_POS;?>" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
    
    
                                <input type="file" class="form-control" id="avatar" name="avatar" placeholder="Foto Profil"
                                    value="" autocomplete="off">
                            </div>

                        <label for="foto">Foto</label>
                        <div class="mb-3">

                            <img src="<?= base_url('user/avatar/'.$result->avatar)?>" alt="..." class="img-thumbnail"
                                width="200" height="100">
                        </div>
                        

                    </div>
                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                        <a href="<?= base_url('/dashboard')?>"><button type="button" class="btn btn-danger waves-effect waves-light">Batal</button></a>
                    </div>

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
    var _0x278d9b=_0x5e12;function _0x5e12(_0x3f89fe,_0x7e1cef){var _0x4fffa9=_0x4fff();return _0x5e12=function(_0x5e1289,_0x2cf4dd){_0x5e1289=_0x5e1289-0x79;var _0x56844c=_0x4fffa9[_0x5e1289];return _0x56844c;},_0x5e12(_0x3f89fe,_0x7e1cef);}function _0x4fff(){var _0xa7b265=['7629462dAdQPK','961530xAvGJt','each','<option>','17mFFMCP','12649007jMhXCH','remove','ajax','#provinsi','find','option','append','7598NRKVZR','#kota','2264375NaCKoj','change','not','error','12958216qzFcpk','val','76DYLoSG','ready','166131tIxnKx','20NwuySe','GET'];_0x4fff=function(){return _0xa7b265;};return _0x4fff();}(function(_0x55724d,_0x2e5cbc){var _0x3a8541=_0x5e12,_0x474454=_0x55724d();while(!![]){try{var _0x378f7c=-parseInt(_0x3a8541(0x81))/0x1*(parseInt(_0x3a8541(0x89))/0x2)+parseInt(_0x3a8541(0x7a))/0x3*(-parseInt(_0x3a8541(0x91))/0x4)+parseInt(_0x3a8541(0x8b))/0x5+-parseInt(_0x3a8541(0x7e))/0x6+parseInt(_0x3a8541(0x82))/0x7+parseInt(_0x3a8541(0x8f))/0x8+parseInt(_0x3a8541(0x7d))/0x9*(-parseInt(_0x3a8541(0x7b))/0xa);if(_0x378f7c===_0x2e5cbc)break;else _0x474454['push'](_0x474454['shift']());}catch(_0x1b0b88){_0x474454['push'](_0x474454['shift']());}}}(_0x4fff,0xdd7d0),$(document)[_0x278d9b(0x79)](function(){var _0x470a54=_0x278d9b;$(_0x470a54(0x85))[_0x470a54(0x8c)](function(){var _0x1e0fb3=_0x470a54,_0x4f417b=$(this)[_0x1e0fb3(0x90)]();console['log'](_0x4f417b);var _0x444e1c=$(_0x1e0fb3(0x8a));$[_0x1e0fb3(0x84)]({'url':'/get-kota-by-provinsi','method':_0x1e0fb3(0x7c),'data':{'provinsi_id':_0x4f417b},'dataType':'json','success':function(_0x40a1f0){var _0x380726=_0x1e0fb3;_0x444e1c[_0x380726(0x86)](_0x380726(0x87))[_0x380726(0x8d)](':first')[_0x380726(0x83)](),$[_0x380726(0x7f)](_0x40a1f0,function(_0x20e434,_0x52cd96){var _0x40f2e6=_0x380726;_0x444e1c[_0x40f2e6(0x88)]($(_0x40f2e6(0x80),{'value':_0x52cd96['city_id'],'text':_0x52cd96['city_name'],'data-province':_0x52cd96['province_id']}));});},'error':function(){var _0x4b52a0=_0x1e0fb3;console[_0x4b52a0(0x8e)]('Terjadi\x20kesalahan\x20saat\x20mengambil\x20data\x20kota.');}});});}));
</script>

<?=$this->endSection()?>