<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 08/10/2014
 * Time: 15:53
 */

namespace App\Affiliates\Affilinet\SoapServers;

use App\Affiliates\Affilinet\Objects\TokenApplicationDetails;
use App\Affiliates\Affilinet\Objects\TokenDeveloperDetails;

class AffilinetLogon {

    private $password;
    private $username;
    private $webserviceType;
    private $tokenDeveloperDetails;
    private $tokenApplicationDetails;
    private $token;
    private $expireDate;

    public function __construct()
    {
        $logonWsdl = "https://api.affili.net/V2.0/Logon.svc?wsdl";
        $this->logonClient = new \SoapClient($logonWsdl,[]);
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function setWebserviceType($webserviceType)
    {
        $this->webserviceType = $webserviceType;
        return $this;
    }

    public function setTokenDeveloperDetails(TokenDeveloperDetails $developersSettings)
    {
        $this->tokenDeveloperDetails = $developersSettings;
        return $this;
    }

    public function setTokenApplicationDetails(TokenApplicationDetails $applicationSettings)
    {
        $this->tokenApplicationDetails = $applicationSettings;
    }

    public function getToken()
    {
        if(!$this->isLogged()) {
            $this->Logon();
        }
        return $this->token;
    }

    private function isLogged()
    {
        if(!$this->expireDate && $this->token) {
            $this->GetIdentifierExpiration();
        }
        if(!$this->token || empty($this->expireDate) || (!empty($this->expireDate) && strtotime($this->expireDate) <= time())) {
            return false;
        }
        return true;
    }

    public function Logon()
    {
        if(!$this->isLogged()) {
            $parameters = ['Username'            => $this->username,
                           'Password'            => $this->password,
                           'WebServiceType'      => $this->webserviceType,
                           'DevelopersSettings'  => $this->tokenDeveloperDetails,
                           'ApplicationSettings' => $this->tokenApplicationDetails
            ];
            $this->token = $this->logonClient->Logon($parameters);
        }
        return $this->token;
    }

    public function GetIdentifierExpiration()
    {
        $parameters = ['CredentialToken' => $this->token];
        $this->expireDate = $this->logonClient->GetIdentifierExpiration($parameters);
    }

} 