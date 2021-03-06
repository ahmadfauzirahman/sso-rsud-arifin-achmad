<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "akun.akn_session".
 *
 * @property int $id
 * @property string $tgb Tanggal buat session
 * @property string $bts Tanggal Batas Habis Sesi
 * @property string $kds Kode Sesi / Token
 * @property int $ida Id Akun
 * @property string $ipa IP Address
 * @property string $inf Info Sesi
 * @property string $tat Tanggal akses terakhir
 * @property string $isk Sudah Keluar
 */
class Sesi extends \yii\db\ActiveRecord
{


    public function getAkun()
    {
        if( $this->_akun === false ) {
            $this->_akun = AkunAknUser::findOne([
                'username' => $this->ida,
                'status' => '0',
            ]);
        }
        return $this->_akun;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTanggalBuat()
    {
        return $this->tgb;
    }

    /**
     * @param string $tgb
     */
    public function setTanggalBuat($value = null)
    {
        if (is_null($value)) {
            $this->tgb = date('Y-m-d H:i:s');
        } else {
            $this->tgb = $value;
        }
    }

    /**
     * @return string
     */
    public function getBatasSesi()
    {
        return $this->bts;
    }

    /**
     * @param string $bts
     */
    public function setBatasSesi($durasi = 3600)
    {
        if (!is_null($durasi) && is_numeric($durasi)) {
            $this->bts = date('Y-m-d H:i:s', strtotime('+' . $durasi . ' seconds'));
        } else {
            $this->addError('o', 'Parameter durasi tidak sesuai.');
        }
    }

    /**
     * @return string
     */
    public function getKodeSesi()
    {
        return $this->kds;
    }

    /**
     * @param string $kds
     */
    public function setKodeSesi()
    {
        $this->kds = Yii::$app->security->generateRandomString();
    }

    /**
     * @return int
     */
    public function getIdAkun()
    {
        return $this->ida;
    }

    /**
     * @param int $ida
     */
    public function setIdAkun($ida)
    {
        $this->ida = $ida;
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipa;
    }

    /**
     * @param string $ipa
     */
    public function setIpAddress($ipa)
    {
        $this->ipa = $ipa;
    }

    /**
     * @return string
     */
    public function getInformasi()
    {
        return $this->inf;
    }

    /**
     * @param string $inf
     */
    public function setInformasi($inf)
    {
        $this->inf = $inf;
    }

    /**
     * @return string
     */
    public function getTanggalAkses()
    {
        return $this->tat;
    }

    /**
     * @param string $tat
     */
    public function setTanggalAksess($tat)
    {
        $this->tat = $tat;
    }

    /**
     * @return string
     */
    public function getIsKeluar()
    {
        return $this->isk;
    }

    /**
     * @param string $isk
     */
    public function setIsKeluar($isk)
    {
        $this->isk = $isk;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'akun.akn_session';
    }

    public function isKeluar()
    {
        return $this->isk == '1';
    }

    public function cekStatus()
    {
        if ($this->isKeluar()) {
            return false;
        } elseif (!$this->save()) {
            return false;
        } else {
            return true;
        }
    }

    public function isBerlaku()
    {
        return strtotime($this->bts) > time();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgb', 'bts', 'kds', 'ida', 'ipa', 'inf', 'tat'], 'required'],
            [['tgb', 'bts', 'tat'], 'safe'],
            [['ida'], 'default', 'value' => null],
            [['ida'], 'integer'],
            [['inf'], 'string'],
            [['kds'], 'string', 'max' => 64],
            [['ipa'], 'string', 'max' => 30],
            [['isk'], 'string', 'max' => 1],
            [['ida'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tgb' => 'Tgb',
            'bts' => 'Bts',
            'kds' => 'Kds',
            'ida' => 'Ida',
            'ipa' => 'Ipa',
            'inf' => 'Inf',
            'tat' => 'Tat',
            'isk' => 'Isk',
        ];
    }
}
