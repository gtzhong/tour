<?php
namespace app\model;

/**
 * 航班管理
 */
class FlightModel extends ModelModel
{
	private $StartCityModel = null;		// 
	protected $autoWriteTimestamp = true;

	public function StartCityModel() {
		if (null === $this->StartCityModel) {
			$startId = (int)$this->getData('start_city_id');
			$this->StartCityModel = StartCityModel::get($startId);
		}

		return $this->StartCityModel;
	}
	/**
	 * 获取出发城市名称通过id
	 * @param  int $id 城市id
	 * @return String    城市名称
	 * @author chuhang 
	 */
	static public function getStartCityNameById($id) {

		$StartCityModel = StartCityModel::get($id);

		//判断出发城市是否为空
		if (null !== $StartCityModel) {
			$StartCityName = $StartCityModel->getData('name');
		} else {
			$StartCityName = '无';
		}

		return $StartCityName;
	}

	/**
	 * 获取目的地城市名称通过id
	 * @param  int $id 目的地城市id
	 * @return String     目的地城市姓名
	 * @author chuhang 
	 */
	static public function getDestinationCityNameById($id) {

		$DestinationCityModel = DestinationCityModel::get($id);

		//判断目的地是否为空
		if (null !== $DestinationCityModel) {
			$DestinationCityName = $DestinationCityModel->getData('name');
		} else {
			$DestinationCityName = '无';
		}
		
		return $DestinationCityName;
	}

	/**
	 * 对money过滤，因为具有strfmon 的系统才有 money_format() 函数。 例如 Windows 不具备，所以 Windows 系统上 money_format() 未定义。用引此方法对money过滤
	 * @param  int  $val    价钱
	 * @param  string  $symbol money类型
	 * @param  integer $r      保留位数
	 * @return string          过滤后的价钱，如：￥897,897
	 * @author chuhang 
	 */
	static public function money_format($val,$symbol='￥',$r=0)
	{
	    $n = $val; 
	    $c = is_float($n) ? 1 : number_format($n,$r);
	    $d = '.';
	    $t = ',';
	    $sign = ($n < 0) ? '-' : '';
	    $i = $n=number_format(abs($n),$r); 
	    $j = (($j = strlen($i)) > 2) ? $j % 2 : 0; 

	   return  $symbol.$sign .($j ? substr($i,0, $j) + $t : '').preg_replace('/(\d{3})(?=\d)/',"$1" + $t,substr($i,$j)) ;
	}

	/**
	 * 截取时间长度，去除不必要的显示，如02:44:00,截取后02:44
	 * @param  [String] $time [所要截取的时间]
	 * @return [string]       [截取后的时间]
	 */
	static public function substrTime($time) {
		$result = substr($time, 0, -3);
		return $result;
	}

	/**
	 * 获取飞机舱型，0，头等舱，1，公务舱，2，经济舱
	 * @param  int $val 舱型对应的数字
	 * @return String      舱型名称
	 * @author chuhang 
	 */
	static public function getTypeName($val) {

		if ($val === 0) {
			return '头等舱';
		} elseif ($val === 1) {
			return '公务舱';
		}

		return '经济舱';
	}
}
