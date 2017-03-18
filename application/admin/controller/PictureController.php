<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\model\PictureModel;
use think\Config;
/**
* 图片管理
*/
class PictureController extends IndexController
{
    public function index()
    {	
    	//Config::set('app_trace', false);
    	//获取上传文件名
        $image = Request::instance()->file('image');
        var_dump($image);
        $info = $image->move(ROOT_PATH . 'public' . DS . 'upload');
        $PictureModel = new PictureModel;
        $PictureModel->path = '__PUBLIC__/upload/' .date('Ymd'). '/'.$info->getFilename();
        $PictureModel->save();

        // $info = $file->move(ROOT_PATH . 'public' . DS . 'upload');
        // $Company->data($data);
        // $Company->logo_url = '__PUBLIC__/upload/' . date('Ymd') . '/' . $info->getFilename();
    }

    public function upload()
    {
    	//获取上传文件名
        $data = Request::instance()->param();
        var_dump($data);
    }
}