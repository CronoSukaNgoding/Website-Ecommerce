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
                                <input type="number" class="form-control" id="rt" name="rt" placeholder="Nomor HP"
                                    value="<?= $result->rt;?>" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label for="rw">RW</label>
                                <input type="number" class="form-control" id="rw" name="rw" placeholder="Nomor HP"
                                    value="<?= $result->rw;?>" autocomplete="off" required>
                            </div>
    
                            <div class="mb-3">
                                <label for="Kode_POS">Kode POS</label>
                                <input type="number" class="form-control" id="kodepos" name="kodepos" placeholder="Nomor HP"
                                    value="<?= $result->Kode_POS;?>" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
    
    
                                <input type="file" class="form-control" id="avatar" name="avatar" placeholder="Pas Foto"
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
                        <button type="button" class="btn btn-danger waves-effect waves-light">Batal</button>
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
    $(document).ready(function () {
        $("#provinsi").change(function () {
            var selectedProvinceId = $(this).val();
            console.log(selectedProvinceId);
            var kotaDropdown = $("#kota");
            $.ajax({
                url: "/get-kota-by-provinsi",
                method: "GET",
                data: {
                    provinsi_id: selectedProvinceId
                },
                dataType: "json",
                success: function (data) {
                    kotaDropdown.find('option').not(':first').remove();
                    $.each(data, function (index, city) {
                        kotaDropdown.append($('<option>', {
                            value: city.city_id,
                            text: city.city_name,
                            'data-province': city.province_id
                        }));
                    });
                },
                error: function () {
                    console.error('Terjadi kesalahan saat mengambil data kota.');
                }
            });
        });
    });
</script>

<?=$this->endSection()?>