<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 08/10/2014
 * Time: 16:30
 */

namespace App\Affiliates\Affilinet\Models;


class VoucherCode {

    /**
     * ID of the voucher
     *
     * @return Integer
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * ID of the advertiser
     *
     * @return Integer
     */
    public function getProgramId()
    {
        return $this->ProgramId;
    }

    /**
     *
     * The string that must be entered at the advertiser’s platform
     * to receive the benefit described in the voucher description.
     * If this is the empty string, then it is not required to enter
     * anything on the advertiser’s platform
     *
     * @return String
     */
    public function getCode()
    {
        return $this->Code;
    }

    /**
     *
     * This describes what benefit the voucher brings, and what
     * prerequisites have to be met in order to use the voucher.
     *
     * @return String
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     *
     * This is when the advertiser starts to accept this voucher.
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->StartDate;
    }

    /**
     *
     * This is when the advertiser no longer accepts this voucher.
     * If no end date has been specified, then 9999-12-31T23:59:59.9999999 is returned.
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->EndDate;
    }

    /**
     *
     * If the requesting publisher has been accepted by this
     * advertiser, this is set to “true”. If not, the publisher has to
     * apply for a partnership in order to use this voucher.
     *
     * @return Boolean
     */
    public function getActivePartnership()
    {
        return $this->ActivePartnership;
    }

    /**
     *
     * The ready-to-use HTML code which the publisher can
     * integrate into his webpage. Decoding might be necessary. If
     * no active partnership exists, this field is empty.
     *
     * @return String
     */
    public function getIntegrationCode()
    {
        return $this->IntegrationCode;
    }

    /**
     *
     * If “true”, then the advertiser has marked this voucher as
     * generally invisible, but has explicitly allowed the requesting
     * publisher to see this voucher. This way, advertisers can
     * distribute tailor-made vouchers for single publishers.
     *
     * @return Boolean
     */
    public function getIsRestricted()
    {
        return $this->IsRestricted;
    }

} 