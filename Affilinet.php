<?php

namespace App\Affiliates\Affilinet;

use App\Affiliates\Affilinet\Enum\WebserviceType;
use App\Affiliates\Affilinet\SoapServers\AffilinetLogon;
use App\Affiliates\Affilinet\SoapServers\AffilinetPublisher;

class Affilinet {

    const AffilinetPublisherPassword = "aaaaaaaaaaaaaaaaaaaa";
    const AffilinetProductPassword = "aaaaaaaaaaaaaaaaaa";
    const AffilinetPublisherId = "123456";

    public function __construct()
    {
        $this->logonClient = new AffilinetLogon();
        $this->publisherClient = new AffilinetPublisher($this->logonClient);
        $this->logonClient->setPassword(self::AffilinetPublisherPassword)->setUsername(self::AffilinetPublisherId)->setWebserviceType(WebserviceType::Publisher);
    }

    public function getVouchersAndPromotions(\DateTime $startDate, \DateTime $endDate, $programId = 0,$query = "",$voucherCode = "")
    {
        $vouchers = $this->publisherClient->GetVoucherCodes($startDate,$endDate);
        return $vouchers;
    }

} 
