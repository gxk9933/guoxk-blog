<?php
/**
 * TOP API: taobao.promotion.limitdiscount.detail.get request
 * 
 * @author auto create
 * @since 1.0, 2012-03-21 12:35:10
 */
class PromotionLimitdiscountDetailGetRequest
{
	/** 
	 * 限时打折ID。这个针对查询唯一限时打折情况。
	 **/
	private $limitDiscountId;
	
	private $apiParas = array();
	
	public function setLimitDiscountId($limitDiscountId)
	{
		$this->limitDiscountId = $limitDiscountId;
		$this->apiParas["limit_discount_id"] = $limitDiscountId;
	}

	public function getLimitDiscountId()
	{
		return $this->limitDiscountId;
	}

	public function getApiMethodName()
	{
		return "taobao.promotion.limitdiscount.detail.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->limitDiscountId,"limitDiscountId");
	}
}
