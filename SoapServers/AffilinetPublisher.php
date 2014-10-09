<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 08/10/2014
 * Time: 16:24
 */

namespace App\Affiliates\Affilinet\SoapServers;

use App\Affiliates\Affilinet\Messages\GetVoucherCodesRequestMessage;
use App\Affiliates\Affilinet\Models\VoucherCode;

class AffilinetPublisher {

    public function __construct(AffilinetLogon $logon)
    {
        $logonWsdl = "https://api.affili.net/V2.0/PublisherInbox.svc?wsdl";
        $this->publisherClient = new \SoapClient($logonWsdl,[]);
        $this->LogonClient = $logon;
    }

    /**
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     * @param int       $programId
     * @param string    $query
     * @param string    $voucherCode
     *
     * @return VoucherCode[]
     */
    public function GetVoucherCodes(\DateTime $startDate, \DateTime $endDate, $programId = 0, $query = "", $voucherCode = "")
    {
        $getVoucherCodesRequestMessage = new GetVoucherCodesRequestMessage();
        $getVoucherCodesRequestMessage
            ->setEndDate($endDate)
            ->setStartDate($startDate);
        $parameters = ['CredentialToken' => $this->LogonClient->getToken(), 'GetVoucherCodesRequestMessage' => $getVoucherCodesRequestMessage];

        var_dump($getVoucherCodesRequestMessage);

        /** @var VoucherCode[] $vouchers */
        $vouchers = $this->publisherClient->GetVoucherCodes($parameters);
        return $vouchers;
    }

} 