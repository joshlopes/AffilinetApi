<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 08/10/2014
 * Time: 16:58
 */

namespace App\Affiliates\Affilinet\Messages;


class GetVoucherCodesRequestMessage {

    private $ProgramId = null;
    private $Query = null;
    private $VoucherCode = null;
    private $EndDate;
    private $StartDate;

    /**
     * @param Integer $program
     *
     * @return $this
     */
    public function setProgramId($program)
    {
        $this->ProgramId = $program;
        return $this;
    }

    /**
     * @param String $Query
     *
     * @return $this
     */
    public function setQuery($Query)
    {
        $this->Query = $Query;
        return $this;
    }

    /**
     * @param String $VoucherCode
     *
     * @return $this
     */
    public function setVoucherCode($VoucherCode)
    {
        $this->VoucherCode = $VoucherCode;
        return $this;
    }

    /**
     * @param \DateTime $StartDate
     *
     * @return $this
     */
    public function setStartDate(\DateTime $StartDate)
    {
        $this->StartDate = $StartDate->format('Y-m-d');
        return $this;
    }

    /**
     * @param \DateTime $EndDate
     *
     * @return $this
     */
    public function setEndDate(\DateTime $EndDate)
    {
        $this->EndDate = $EndDate->format('Y-m-d');
        return $this;
    }

} 