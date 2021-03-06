<?php

use app\components\HelperSso;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\AkunAknUser */
/* @var $form yii\widgets\ActiveForm */
$role = ['pegawai' => 'Pegawai', 'dokter' => 'Dokter', 'perawat' => 'Perawat'];
$dataPegawai = HelperSso::getDataPegawai();

?>

    <div class="card card-body">
        <?php $form = ActiveForm::begin(); ?>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-12">
                    <?= $form->field($model, 'id_pegawai')->widget(Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map($dataPegawai, 'pegawai_id', 'nama_lengkap'),
                        'language' => 'en',
                        'options' => ['placeholder' => 'Pilih Pegawai'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]); ?>
                </div>
                <div class="col-lg-12">
                    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => 'Username Berdasarkan Nip', 'readonly' => true]) ?>

                </div>
                <div class="col-lg-12">
                    <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama Lengkap']) ?>
                </div>
                <div class="col-lg-12">
                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'placeholder' => 'Password']) ?>
                </div>
            </div>


            <?php $form->field($model, 'tanggal_pendaftaran')->textInput() ?>

            <?php $form->field($model, 'role')->dropDownList($role, ['prompt' => 'Pilih Role Identitas']) ?>
            <?= $form->field($model, 'role')->widget(Select2::classname(), [
                'data' => HelperSso::TypeUser,
                'language' => 'en',
                'options' => ['placeholder' => 'Pilih Role'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
            <?php $form->field($model, 'token_aktivasi')->textarea(['rows' => 6]) ?>

            <?php $form->field($model, 'status')->textInput() ?>

        </div>
        <div class="box-footer">
            <?= Html::submitButton('Save <span class="fa fa-save"></span>', ['class' => 'btn btn-success btn-flat']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>


<?php
$JS = <<< JS
    $("#akunaknuser-id_pegawai").change(function() {
      // alert("asdasdas");
      var akun = $(this).val();
      $.get('get-pegawai',{id:akun},function(data) {
        // akunaknuser-username
        $("#akunaknuser-username").attr('value',data.results.nip);
        // akunaknuser-nama
        $("#akunaknuser-nama").attr('value',data.results.nama_lengkap)
      },'JSON');
    });
JS;
$this->registerJs($JS)
?>