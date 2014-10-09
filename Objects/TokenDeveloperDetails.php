<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 08/10/2014
 * Time: 14:56
 */

namespace App\Affiliates\Affilinet\Objects;


class TokenDeveloperDetails {

    private $sandboxPublisherId;

    public function setSandboxPublisherId($sandboxPublisherId)
    {
        $this->sandboxPublisherId = $sandboxPublisherId;
        return $this;
    }

    public function getSandboxPublisherId()
    {
        return $this->sandboxPublisherId;
    }

} 