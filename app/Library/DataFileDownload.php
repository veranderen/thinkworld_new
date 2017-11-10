<?php
/**
 * Created by PhpStorm.
 * User: pufan
 * Date: 2017/11/6
 * Time: 上午11:25
 */

namespace App\Library;

use \Illuminate\Support\Facades\Config;

class DataFileDownload
{
    public function fileDownload() {
        $dataFileList = Config::get('datasource.csi_datafile_list');

        foreach($dataFileList as $indexName => $detail){
            $Url="ftp://115.29.204.48/webdata/".$detail['fileName'];
            $res = exec("wget -O ".storage_path('app/data/').$detail['fileName'].' '.$Url);
        }

        $dataFileList = Config::get('datasource.hsi_datafile_list');
        foreach($dataFileList as $indexName => $detail){
            $filename = 'idx_'.(int)date('d').date('M').(int)date('y').'.csv';
            $Url="http://sc.hangseng.com/gb/www.hsi.com.hk/HSI-Net/static/revamp/contents/en/indexes/report/$indexName/";
            exec("wget -O ".storage_path('app/data/').$detail['fileName'].' '.$Url.$filename);
        }
    }
    public function fileRemove() {
        exec("rm -f ".storage_path('app/data/*'));
    }
}