<?php
namespace app\admin\controller;
use think\Controller;
/**
* 航班管理
*/
class FlightController extends Controller
{
    
    public function index()
    {
        return $this->fetch();
    }
}