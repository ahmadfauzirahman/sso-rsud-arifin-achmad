<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TbPegawai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-pegawai-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'nip')->textInput() ?>

        <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'gelar_sarjana_depan')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'gelar_sarjana_belakang')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'pendidikan_terakhir_id')->textInput() ?>

        <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tanggal_lahir')->textInput() ?>

        <?= $form->field($model, 'jenis_kelamin')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nomor_karpeg')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nomor_kartu_askes')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nomor_karis_karsu')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'npwp')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nomor_ktp')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nota_persetujuan_bkn_nomor_cpns')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nota_persetujuan_bkn_tanggal_cpns')->textInput() ?>

        <?= $form->field($model, 'pejabat_yang_menetapkan_cpns')->textInput() ?>

        <?= $form->field($model, 'sk_cpns_nomor_cpns')->textInput() ?>

        <?= $form->field($model, 'sk_cpns_tanggal_cpns')->textInput() ?>

        <?= $form->field($model, 'kode_pangkat_cpns')->textInput() ?>

        <?= $form->field($model, 'tmt_cpns')->textInput() ?>

        <?= $form->field($model, 'masa_kerja_tahun_cpns')->textInput() ?>

        <?= $form->field($model, 'masa_kerja_bulan_cpns')->textInput() ?>

        <?= $form->field($model, 'pejabat_yang_menetapkan_pns')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sk_nomor_pns')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sk_tanggal_pns')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kode_pangkat_pns')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tmt_pns')->textInput() ?>

        <?= $form->field($model, 'sumpah_janji_pns')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'masa_kerja_tahun_pns')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'masa_kerja_bulan_pns')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'status_perkawinan')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tinggi_keterangan_badan')->textInput() ?>

        <?= $form->field($model, 'berat_badan_keterangan_badan')->textInput() ?>

        <?= $form->field($model, 'rambut_keterangan_badan')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'bentuk_muka_keterangan_badan')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'warna_kulit_keterangan_badan')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ciri_ciri_khas_keterangan_badan')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'cacat_tubuh_keterangan_badan')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kegemaran_1')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kegemaran_2')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kegemaran_3')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'status_aktif_pegawai')->textInput() ?>

        <?= $form->field($model, 'kode_kategori_pegawai')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'pangkat_terakhir_id')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'agama')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'alamat_tempat_tinggal')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'rt_tempat_tinggal')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'rw_tempat_tinggal')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'desa_kelurahan')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kecamatan')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kabupaten_kota')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'provinsi')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kode_pos')->textInput() ?>

        <?= $form->field($model, 'no_telepon_1')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'no_telepon_2')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'golongan_darah')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'status_kepegawaian_id')->textInput() ?>

        <?= $form->field($model, 'jenis_kepegawaian_id')->textInput() ?>

        <?= $form->field($model, 'jenis_jabatan')->textInput() ?>

        <?= $form->field($model, 'kode_jabatan')->textInput() ?>

        <?= $form->field($model, 'kode_bagian')->textInput() ?>

        <?= $form->field($model, 'fungsional_struktural')->textInput() ?>

        <?= $form->field($model, 'tmt_jabatan')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
