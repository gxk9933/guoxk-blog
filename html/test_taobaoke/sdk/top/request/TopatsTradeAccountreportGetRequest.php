<?php
/**
 * TOP API: taobao.topats.trade.accountreport.get request
 * 
 * @author auto create
 * @since 1.0, 2012-03-21 12:35:10
 */
class TopatsTradeAccountreportGetRequest
{
	/** 
	 * 结果文件的编码格式。</br>

传入该参数，则表示调用这个API的时候，以该参数指定的编码格式来生成结果文件。</br>

目前只支持utf-8和gbk，若没有传入该参数，则采用默认的utf-8编码格式来生成结果文件。
	 **/
	private $charset;
	
	/** 
	 * 账务日期查询结束时间。查询结束时间必须大于查询开始时间，并且时间跨度不能超过3个月。
	 **/
	private $endCreated;
	
	/** 
	 * 返回信息包含的字段，详情请见TradeAccountDetail结构体说明
http://api.taobao.com/apidoc/dataStruct.htm?path=cid:5-dataStructId:10152
	 **/
	private $fields;
	
	/** 
	 * 账务日期开始时间，时间必须大于2010-06-10 00:00:00
	 **/
	private $startCreated;
	
	private $apiParas = array();
	
	public function setCharset($charset)
	{
		$this->charset = $charset;
		$this->apiParas["charset"] = $charset;
	}

	public function getCharset()
	{
		return $this->charset;
	}

	public function setEndCreated($endCreated)
	{
		$this->endCreated = $endCreated;
		$this->apiParas["end_created"] = $endCreated;
	}

	public function getEndCreated()
	{
		return $this->endCreated;
	}

	public function setFields($fields)
	{
		$this->fields = $fields;
		$this->apiParas["fields"] = $fields;
	}

	public function getFields()
	{
		return $this->fields;
	}

	public function setStartCreated($startCreated)
	{
		$this->startCreated = $startCreated;
		$this->apiParas["start_created"] = $startCreated;
	}

	public function getStartCreated()
	{
		return $this->startCreated;
	}

	public function getApiMethodName()
	{
		return "taobao.topats.trade.accountreport.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->endCreated,"endCreated");
		RequestCheckUtil::checkNotNull($this->fields,"fields");
		RequestCheckUtil::checkNotNull($this->startCreated,"startCreated");
	}
}
