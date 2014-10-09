<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 08/10/2014
 * Time: 14:57
 */

namespace App\Affiliates\Affilinet\Objects;


class TokenApplicationDetails {

    private $applicationId;
    private $developerId;

    public function setApplicationId($applicationId)
    {
        $this->applicationId = $applicationId;
        return $this;
    }

    public function getApplicationId()
    {
        return $this->applicationId;
    }

    public function setDeveloperId($developerId)
    {
        $this->developerId = $developerId;
        return $this;
    }

    public function getDeveloperId()
    {
        return $this->developerId;
    }

} 