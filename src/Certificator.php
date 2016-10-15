<?php namespace Turncypher\Zmop;
/**
 * Created by IntelliJ IDEA.
 * User: root
 * Date: 16-10-15
 * Time: 下午3:34
 */
use Carbon\Carbon;
use Turncypher\Zmop\Request\ZhimaCreditIvsDetailGetRequest;

class Certificator
{
    protected $client;

    protected $request;

    /**
     * Certificator constructor.
     * @param ZhimaCreditIvsDetailGetRequest $request
     * @internal param $client
     */
    public function __construct(ZhimaCreditIvsDetailGetRequest $request)
    {
        $this->client = app('zmop');
        $this->request = $request;
    }


    public function certificate(array $credentials)
    {
        $this->prepareRequest($credentials);

        $response = $this->client->execute($this->request);
        return $response;
    }

    private function prepareRequest($credentials)
    {
        $this->request->setChannel("apppc");
        $this->request->setPlatform("zmop");
        $this->request->setProductCode("w1010100000000000103");// 必要参数
        $this->request->setCertType("100");//


        $now = Carbon::now();
        $transactionId =  $now->format("YmdHis") . $now->micro . random_int(1000000000,9999999999);
        $this->request->setTransactionId($transactionId);// 必要参数
        $this->request->setCertNo($credentials["certNo"]);//
        $this->request->setName($credentials["name"]);//
        $this->request->setMobile($credentials["mobile"]);//
        $this->request->setEmail($credentials["email"]);//
    }
}