<?php

/**
 *
 * @author     Darko Gole? <darko.goles@inchoo.net>
 * @package    Taewol
 * @subpackage RestConnect
 *
 * Url of controller is: http://magento.loc/restconnect/test/[action]
 */
class Taewol_RestConnect_TestController extends Mage_Core_Controller_Front_Action {

    public function indexAction() {

        //Basic parameters that need to be provided for oAuth authentication
        //on Magento
        $params = array(
            'siteUrl' => 'http://ec2-52-11-121-54.us-west-2.compute.amazonaws.com:8080/magento/oauth',
            'requestTokenUrl' => 'http://ec2-52-11-121-54.us-west-2.compute.amazonaws.com:8080/magento/oauth/initiate',
            'accessTokenUrl' => 'http://ec2-52-11-121-54.us-west-2.compute.amazonaws.com:8080/magento/oauth/token',
            'authorizeUrl' => 'http://ec2-52-11-121-54.us-west-2.compute.amazonaws.com:8080/magento/oauth/authorize',//This URL is used only if we authenticate as Admin user type
            'consumerKey' => 'e4c2be0f4497c67455d5c15b2b098dc7',//Consumer key registered in server administration
            'consumerSecret' => '48b5b6501158f6fed9172c56f91ca734',//Consumer secret registered in server administration
            'callbackUrl' => 'http://ec2-52-11-121-54.us-west-2.compute.amazonaws.com:8080/magento/restconnect/test/callback',//Url of callback action below
        );

        // Initiate oAuth consumer with above parameters
        $consumer = new Zend_Oauth_Consumer($params);
        // Get request token
        $requestToken = $consumer->getRequestToken();
        // Get session
        $session = Mage::getSingleton('core/session');
        // Save serialized request token object in session for later use
        $session->setRequestToken(serialize($requestToken));
        // Redirect to authorize URL
        $consumer->redirect();

        return;
    }

    public function callbackAction() {

        //oAuth parameters
        $params = array(
            'siteUrl' => 'http://ec2-52-11-121-54.us-west-2.compute.amazonaws.com:8080/magento/oauth',
            'requestTokenUrl' => 'http://ec2-52-11-121-54.us-west-2.compute.amazonaws.com:8080/magento/oauth/initiate',
            'accessTokenUrl' => 'http://ec2-52-11-121-54.us-west-2.compute.amazonaws.com:8080/magento/oauth/token',
            'consumerKey' => 'e4c2be0f4497c67455d5c15b2b098dc7',
            'consumerSecret' => '48b5b6501158f6fed9172c56f91ca734'
        );

        // Get session
        $session = Mage::getSingleton('core/session');
        // Read and unserialize request token from session
        $requestToken = unserialize($session->getRequestToken());
        // Initiate oAuth consumer
        $consumer = new Zend_Oauth_Consumer($params);
        // Using oAuth parameters and request Token we got, get access token
        $acessToken = $consumer->getAccessToken($_GET, $requestToken);
        // Get HTTP client from access token object
        $restClient = $acessToken->getHttpClient($params);
        // Set REST resource URL
        $restClient->setUri('http://ec2-52-11-121-54.us-west-2.compute.amazonaws.com:8080/magento/api/rest/customers');
        // In Magento it is neccesary to set json or xml headers in order to work
        $restClient->setHeaders('Accept', 'application/json');
        // Get method
        $restClient->setMethod(Zend_Http_Client::GET);
        //Make REST request
        $response = $restClient->request();
        // Here we can see that response body contains json list of products
        Zend_Debug::dump($response);

        return;
    }

}
