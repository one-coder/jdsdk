<?php
namespace Jd\Api\Goods;

use Jd\Api\IApi;
use Jd\JFunc;

class WareUpdateApi implements IApi{

    /**
     * @var string
     * @must true
     */
    public $wareId;

    /**
     * @var string
     * @must false
     */
    public $tradeNo;

    /**
     * @var string
     * @must false
     * @desc 产地
     */
    public $wareLocation;

    /**
     * @var string
     * @must false
     */
    public $shopCategory;

    /**
     * @var string
     * @must false
     */
    public $title;

    /**
     * @var string
     * @must false
     * @desc upc编码
     */
    public $upcCode;

    /**
     * @var string
     * @must false
     * @desc 操作类型，现只支持：offsale 或onsale 下架类型请传入：offsale 上架类型请传入：onsale 如果不传操作类型，商品保持原状态
     */
    public $optionType;

    /**
     * @var string
     * @must false
     * @desc 外部商品编号，对应商家后台“货号”
     */
    public $itemNum;

    /**
     * @var int
     * @must false
     * @desc 库存数(针对FBP输入无效)
     */
    public $stockNum;

    /**
     * @var string
     * @must false
     * @desc 生产厂商
     */
    public $producter;

    /**
     * @var string
     * @must false
     * @desc 包装规格
     */
    public $wrap;

    /**
     * @var int
     * @must false
     * @desc 长(单位:mm)
     */
    public $length;

    /**
     * @var int
     * @must false
     * @desc 宽(单位:mm)
     */
    public $wide;

    /**
     * @var int
     * @must false
     * @desc 高(单位:mm)
     */
    public $high;

    /**
     * @var float
     * @must false
     * @desc 重量(单位:kg)
     */
    public $weight;

    /**
     * @var float
     * @must false
     * @desc 进货价,精确到2位小数，单位:元
     */
    public $costPrice;

    /**
     * @var float
     * @must false
     * @desc 市场价, 精确到2位小数，单位:元
     */
    public $marketPrice;

    /**
     * @var float
     * @must false
     * @desc 京东价,精确到2位小数，单位:元
     */
    public $jdPrice;

    /**
     * @var string
     * @must false
     */
    public $notes;

    /**
     * @var string
     * @must false
     * @desc 包装清单
     */
    public $packListing;

    /**
     * @var string
     * @must false
     */
    public $service;

    /**
     * @var string
     * @must false
     * @desc sku 属性,一组sku 属性之间用^分隔，多组用|分隔格式:aid:vid^aid1:vid2|aid3:vid3^aid4:vid4 （需要从类目服务接口获取）
     */
    public $skuProperties;

    /**
     * @var string
     * @must false
     * @desc 商品属性列表,多组之间用|分隔，格式:aid:vid 或 aid:vid|aid1:vid1 或 aid1:vid1（需要从类目服务接口获取） 如输入类型input_type为1或2，则attributes为必填属性；如输入类型input_type为3，则用字段input_str填入属性的值
     */
    public $attributes;

    /**
     * @var string
     * @must false
     * @desc sku 价格,多组之间用‘|’分隔，格式:p1|p2
     */
    public $skuPrices;

    /**
     * @var string
     * @must false
     * @desc sku 库存,多组之间用‘|’分隔， 格式:s1|s2
     */
    public $skuStocks;

    /**
     * @var string
     * @must false
     * @example 1000000041:1500368001:淡蓝色
     * @desc 自定义属性值别名： 属性ID:属性值ID:别名 ，多组之间用^分开，如aid:vid:别名^aid1:vid1:别名1
     */
    public $propertyAlias;

    /**
     * @var string
     * @must false
     * @desc SKU外部ID，对个之间用‘|’分隔格，比如：sdf|sds（支持没有sku的情况下，可以输入外部id，并将外部id绑定在默认生成的sku上），对应商家后台‘商家skuid’
     */
    public $outerId;

    /**
     * @var boolean
     * @must false
     * @desc 是否先款后货 , false为否，true为是
     */
    public $isPayFirst = true;

    /**
     * @var boolean
     * @must false
     * @desc 发票限制：非必须输入，true为限制，false为不限制开增值税发票，FBP、LBP、SOPL、SOP类型商品均可输入
     */
    public $isCanVat;

    /**
     * @var boolean
     * @must false
     * @desc 是否进口商品：非必须输入，false为否，true为是，FBP类型商品可输入；
     */
    public $isImported;

    /**
     * @var boolean
     * @must false
     * @desc 是否保健品：非必须输入，false为否，true为是，FBP类型商品可输入；
     */
    public $isHealthProduct;

    /**
     * @var int
     * @must false
     * @desc 保质期：非必须输入，0-99999范围区间，FBP类型商品可输入
     */
    public $shelfLifeDays;

    /**
     * @var boolean
     * @must false
     * @desc 是否序列号管理：非必须输入，false为否，true为是，FBP类型商品可输入；
     */
    public $isSerialNo;

    /**
     * @var boolean
     * @must false
     * @desc 大家电购物卡：非必须输入，false为否，true为是，FBP类型商品可输入
     */
    public $isAppliancesCard;

    /**
     * @var boolean
     * @must false
     * @desc 是否特殊液体：非必须输入，false为否，true为是，FBP、LBP、SOPL类型商品可输入
     */
    public $isSpecialWet;

    /**
     * @var int
     * @must false
     * @desc 商品件型：FBP类型商品必须输入，非FBP类型商品可输入非必填，0免费、1超大件、2超大件半件、3大件、4大件半件、5中件、6中件半件、7小件、8超小件
     */
    public $wareBigSmallModel;

    /**
     * @var int
     * @must false
     * @desc 商品包装：必须输入，1普通商品、2易碎品、3裸瓶液体、4带包装液体、5按原包装出库，FBP类型商家适用；
     */
    public $warePackType;

    /**
     * @var boolean
     * @must false
     * @desc 是否保质期管理商品, false为否，true为是
     */
    public $isShelfLife;

    /**
     * @var string
     * @must false
     * @desc 用户自行输入的类目属性ID串结构：“pid1|pid2|pid3”, 属性的pid调用360buy.ware.get.attribute取得, 输入类型input_type=3即输入。所选pid输入类型等于3，pid是必须输入
     */
    public $inputPids;

    /**
     * @var string
     * @must false
     * @desc 用户自行输入的属性值,结构:“输入值|输入值2|输入值3 图书品类输入值规则： ISBN：数字、字母格式 出版时间：日期格式“yyyy-mm-dd” 版次：数字格式 印刷时间：日期格式“yyyy-mm-dd” 印次：数字格式 页数：数字格式 字数：数字格式 套装数量：数字格式 附件数量：数字格式
     */
    public $inputStrs;

    /**
     * @var boolean
     * @must false
     * @desc 是否输入验证码 true:是;false:否
     */
    public $hasCheckCode;

    /**
     * @var string
     * @must false
     * @desc 广告词内容最大支持45个字符
     */
    public $adContent;

    /**
     * @var string
     * @must false
     * @desc 定时上架时间 时间格式：yyyy-MM-dd HH:mm:ss;规则是大于当前时间，10天内。
     */
    public $listTime;


    /**
     * @var string
     */
    public $method = '360buy.ware.update';

    /**
     * @var array
     */
    protected $params = array();

    /**
     * WareUpdateApi constructor.
     */
    public function __construct() {}

    /**
     * Get api method name
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Get api params
     *
     * @return string
     * @throws \JdException
     */
    public function getJsonParams()
    {
        $this->params['ware_id'] = $this->wareId;
        $this->params['trade_no'] = $this->tradeNo;
        $this->params['ware_location'] = $this->wareLocation;
        $this->params['shop_category'] = $this->shopCategory;
        $this->params['title'] = $this->title;
        $this->params['upc_code'] = $this->upcCode;
        $this->params['option_type'] = $this->optionType;
        $this->params['item_num'] = $this->itemNum;
        $this->params['stock_num'] = $this->stockNum;
        $this->params['producter'] = $this->producter;
        $this->params['wrap'] = $this->wrap;
        $this->params['length'] = $this->length;
        $this->params['wide'] = $this->wide;
        $this->params['high'] = $this->high;
        $this->params['weight'] = $this->weight;
        $this->params['cost_price'] = $this->costPrice;
        $this->params['market_price'] = $this->marketPrice;
        $this->params['jd_price'] = $this->jdPrice;
        $this->params['notes'] = $this->notes;
        $this->params['pack_listing'] = $this->packListing;
        $this->params['service'] = $this->service;
        $this->params['sku_properties'] = $this->skuProperties;
        $this->params['attributes'] = $this->attributes;
        $this->params['sku_prices'] = $this->skuPrices;
        $this->params['sku_stocks'] = $this->skuStocks;
        $this->params['property_alias'] = $this->propertyAlias;
        $this->params['outer_id'] = $this->outerId;
        $this->params['is_pay_first'] = $this->isPayFirst;
        $this->params['is_can_vat'] = $this->isCanVat;
        $this->params['is_imported'] = $this->isImported;
        $this->params['is_health_product'] = $this->isHealthProduct;
        $this->params['is_shelf_life'] = $this->isShelfLife;
        $this->params['shelf_life_days'] = $this->shelfLifeDays;
        $this->params['is_serial_no'] = $this->isSerialNo;
        $this->params['is_appliances_card'] = $this->isAppliancesCard;
        $this->params['is_special_wet'] = $this->isSpecialWet;
        $this->params['ware_big_small_model'] = $this->wareBigSmallModel;
        $this->params['ware_pack_type'] = $this->warePackType;
        $this->params['input_pids'] = $this->inputPids;
        $this->params['has_check_code'] = $this->hasCheckCode;
        $this->params['ad_content'] = $this->adContent;
        $this->params['list_time'] = $this->listTime;

        JFunc::allDataType2String($this->params);

        ksort($this->params);
        return json_encode($this->params);
    }

    /**
     * Open api document
     */
    public static function openApiDocument()
    {
        header('Location:http://jos.jd.com/api/detail.htm?apiName=360buy.ware.update&id=116');
    }
}

