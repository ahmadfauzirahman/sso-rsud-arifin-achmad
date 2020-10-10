<?php


namespace app\components;


use app\models\DataMasterStatusKepegawain;
use app\models\Sesi;
use app\models\TbPegawai;

class HelperSso
{
	const TypeUser = [
		'ROOT' => 'ROOT',
		'MEDIS' => 'MEDIS',
		'NONMEDIS' => 'NONMEDIS',
		'APLIKASI' => 'APLIKASI',
		'Eksternal' => 'Eksternal',
		'Keperawatan' => 'KEPERAWATAN'
	];

	const TypeUserStatus = [
		'0' => 'Pending',
		'1' => 'Aktif',
		'2' => 'Tidak Aktif'
	];

	public static function getDataPegawai()
	{
		$sso = \app\models\AkunAknUser::find()->select('username')->all();

		$array = [];
		foreach ($sso as $v) {
			$array[] = $v->username;
		}


		$r = TbPegawai::find()->where(['not in', 'id_nip_nrp', $array])->orderBy(['nama_lengkap' => SORT_ASC])->all();

		return $r;
	}


	public static function getDataPegawaiByNip($id)
	{
		$r = TbPegawai::find()
			->where(['id_nip_nrp' => $id])->one();
		return $r;
	}

	static function getLogLogin($id)
	{
		$r = Sesi::find()->where(['ida' => $id])->orderBy(['tgb' => SORT_DESC])->limit(5)->all();
		return $r;
	}
}
