<?php
/**
 * TOP API: taobao.comet.discardinfo.get request
 * 
 * @author auto create
 * @since 1.0, 2012-03-21 12:35:10
 */
class CometDiscardinfoGetRequest
{
	/** 
	 * 指定截止日志，如果不传则为服务端当前时间
	 **/
	private $end;
	
	/** 
	 * 指定从那个时间开始找丢弃的消息
	 **/
	private $start;
	
	/** 
	 * 指定多个消息类型
	 **/
	private $types;
	
	/** 
	 * 指定查看那个用户的丢弃消息
	 **/
	private $userId;
	
	private $apiParas = array();
	
	public function setEnd($end)
	{
		$this->end = $end;
		$this->apiParas["end"] = $end;
	}

	public function getEnd()
	{
		return $this->end;
	}

	public function setStart($start)
	{
		$this->start = $start;
		$this->apiParas["start"] = $start;
	}

	public function getStart()
	{
		return $this->start;
	}

	public function setTypes($types)
	{
		$this->types = $types;
		$this->apiParas["types"] = $types;
	}

	public function getTypes()
	{
		return $this->types;
	}

	public function setUserId($userId)
	{
		$this->userId = $userId;
		$this->apiParas["user_id"] = $userId;
	}

	public function getUserId()
	{
		return $this->userId;
	}

	public function getApiMethodName()
	{
		return "taobao.comet.discardinfo.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->start,"start");
	}
}
