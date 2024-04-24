<?php

namespace WhatPress\Lib;

//require('../vendor/autoload.php');
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use WhatPress\Credential;

class WhatPress extends Credential{
    private $client;
    private $requestOptions;
    private $adminusername;
    private $adminpassword;
    private $apiusername;
    private $apipassword;
    //public $config;
    private $apikey;

    function __construct($apiusername='atpl_tech', $apipassword='atpl@!234'){
        //$this->client = $client;
        $this->client = new Client();
        $this->requestOptions = new RequestOptions;
        //$this->config = parse_ini_file('../../cred.ini');
        $credentials = new Credential;
        $this->adminusername = $credentials->get()['adminusername'];
        $this->adminpassword = $credentials->get()['adminpassword'];
        $this->apikey = $credentials->get()['apikey'];
        $this->apiusername = $apiusername;
        $this->apipassword = $apipassword;
    }

    //send Message
    public function createMessage(string $recieverNumber,array $message, string $imageurl=''){
        $params=array();
        if(!empty($message) && $imageurl!=''){
            $params = [
                'query' => [
                   //'username' => 'Arsaviva Technologies',
                   //'password' => 'atpl@!234',
                   'username' => $this->apiusername,
                   'password' => $this->apipassword,
                   'receiverMobileNo' => $recieverNumber,//'7783047335,9435400139'
                   'message' => $message,//['Hello']
                   'filePathUrl' => $imageurl,//full url
                   'api_key' => $this->apikey
                ]
            ];
        }
        else if(!empty($message) && $imageurl==''){
            $params = [
                'query' => [
                   //'username' => 'Arsaviva Technologies',
                   //'password' => 'atpl@!234',
                   'username' => $this->apiusername,
                   'password' => $this->apipassword,
                   'receiverMobileNo' => $recieverNumber,//'7783047335,9435400139'
                   'message' => $message,//['Hello']
                   //'filePathUrl' => $imageurl,//full url
                   'api_key' => $this->apikey
                ]
            ];
        }
        else if(empty($message) && $imageurl!=''){
            $params = [
                'query' => [
                   //'username' => 'Arsaviva Technologies',
                   //'password' => 'atpl@!234',
                   'username' => $this->apiusername,
                   'password' => $this->apipassword,
                   'receiverMobileNo' => $recieverNumber,//'7783047335,9435400139'
                   //'message' => $message,//['Hello']
                   'filePathUrl' => $imageurl,//full url
                   'api_key' => $this->apikey
                ]
            ];
        }
        //return $recieverNumber;
        try {
            if($response = $this->client->request('GET', 'https://app.messageautosender.com/api/v1/message/create',$params)){
                $body = $response->getBody();
                return json_decode($body);
            }
            else{
                throw new Exception("Message could not be sent!..");
                
            }
        }
        catch (Exception $e) {
            return 'Exception Error: '. $e->getMessage();
        }
    }

    //Customer Details
    public function customerDetails(){
        //$client = new Client();

        $json['username']=$this->adminusername;
        $json['password']=$this->adminpassword;
        $json['customerUsername']=$this->apiusername;
        $json['api_key']=$this->apikey;

        try {
            if($response = $this->client->post('https://app.messageautosender.com/api/v1/reseller/customer/detail', [ $this->requestOptions::JSON => $json // or 'json' => [...]
            ])){
                $body = $response->getBody();
                return json_decode($body);
            }
            else{
                throw new Exception("Customer Details could not be retrieved!..");
            }
            ;
            
        } catch (Exception $e) {
            return 'Exception Message: '. $e->getMessage();
        }
    }

    //getQR and other states
    public function getQR(){
        //$client = new Client();
        $channelid = $this->customerDetails()->result->channels[0]->id;

        $json['username']=$this->adminusername;
        $json['password']=$this->adminpassword;
        $json['customerUsername']=$this->apiusername;
        $json['channelId']=$channelid;

        try {
            if($response = $this->client->POST('https://app.messageautosender.com/api/v1/reseller/customer/channel/status', [
                $this->requestOptions::JSON => $json
            ])){
                $body = $response->getBody();
                return json_decode($body);
            }
            else{
                throw new Exception("Status could not be fetched..");
            }
        } catch (Exception $e) {
            return 'Exception Message: '. $e->getMessage();
        }
    }

    public function sentMessageStatus(string $groupId){
        $params = [
            'query' => [
                'username'=>$this->apiusername,
                'password'=>$this->apipassword,
                //'customerUsername'=>$username,
                'messageId'=>$groupId,
                'api_key' => $this->apikey
            ]
        ];
        try {
            if($response = $this->client->request('GET', 'https://app.messageautosender.com/api/v1/message/status', $params)){
                $body = $response->getBody();
                return json_decode($body);
            }
            else{
                throw new Exception("Message Status could not be fetched..");
            }
        } catch (Exception $e) {
            return 'Exception Error: '. $e->getMessage();
        }
    }
}

