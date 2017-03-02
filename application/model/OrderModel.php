<?php
namespace app\model;
use think\Model;
/**
 * 支付订单管理
 * @author huangshuaibin
*/
class OrderModel extends Model
{
	/**
	 * 通过用户id获取该用户的所有的订单	
	 * @param  int $userId 用户的id
	 * @return array         用户的订单的数组
	 */
	public static function getOrdersByUserId($userId)
	{
		$Order = new OrderModel;
		$orders = $Order->where('user_id', '=', $userId)->select();
		return $orders;
	}
}