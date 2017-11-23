<?php
/**
 * Created by PhpStorm.
 * User: pufan
 * Date: 2017/11/6
 * Time: 上午11:25
 */

namespace App\Library;

use \Illuminate\Support\Facades\Config;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

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
            $date = Carbon::now();
            for ($i = 3; $i > 0; $i--) {
                $filename = 'idx_' . (int)$date->format('d') . $date->format("M") . (int)$date->format('y') . '.csv';
                $Url = "http://sc.hangseng.com/gb/www.hsi.com.hk/HSI-Net/static/revamp/contents/en/indexes/report/$indexName/";
                exec("wget --user-agent='Mozilla/5.0'  -O " . storage_path('app/data/') . $detail['fileName'] . ' ' . $Url . $filename);

                echo "wget -O " . storage_path('app/data/') . $detail['fileName'] . ' ' . $Url . $filename .'\n';
                $size = Storage::size('data/'.$detail['fileName']);
                if ($size == 0) {
                    $date = $date->subDay();
                } else {
                    break;
                }
            }
        }
    }

    public function fileRemove() {
        exec("rm -f ".storage_path('app/data/*'));
    }
}