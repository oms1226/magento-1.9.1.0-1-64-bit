<?php
 
/**
 *
 * @author     Darko Gole? <darko.goles@inchoo.net>
 * @package    Inchoo
 * @subpackage Restconnect
 * 
 * Url of controller is: http://magento.loc/restconnect/test/[action] 
 */
class Taewol_Restconnect_OauthController extends Mage_Core_Controller_Front_Action {
 
    public function indexAction() {
 
        //Basic parameters that need to be provided for oAuth authentication
        //on Magento
        $params = array(
            'siteUrl' => 'http://ec2-52-11-121-54.us-west-2.compute.amazonaws.com:8080/magento/default/oauth',
            'requestTokenUrl' => 'http://ec2-52-11-121-54.us-west-2.compute.amazonaws.com:8080/magento/default/oauth/initiate',
            'accessTokenUrl' => 'http://ec2-52-11-121-54.us-west-2.compute.amazonaws.com:8080/magento/default/oauth/token',
            'authorizeUrl' => 'http://ec2-52-11-121-54.us-west-2.compute.amazonaws.com:8080/magento/default/oauth/authorize',//This URL is used only if we authenticate as Admin user type
            'consumerKey' => 'e4c2be0f4497c67455d5c15b2b098dc7',//Consumer key registered in server administration
            'consumerSecret' => '48b5b6501158f6fed9172c56f91ca734',//Consumer secret registered in server administration
            'callbackUrl' => 'http://ec2-52-11-121-54.us-west-2.compute.amazonaws.com:8080/magento/default/restconnect/oauth/callback',//Url of callback action below            
        );
 
 
				Mage::log("before index");        
        $oAuthClient = Mage::getModel('taewol_restconnect/oauth_client');
        $oAuthClient->reset();
 
        $oAuthClient->init($params);
        $oAuthClient->authenticate();
				Mage::log($oAuthClient);        
 
        return;
    }
 
    public function callbackAction() {
 
        $oAuthClient = Mage::getModel('taewol_restconnect/oauth_client');
        $params = $oAuthClient->getConfigFromSession();
        $oAuthClient->init($params);
 
				Mage::log("before callback");        
        $state = $oAuthClient->authenticate();
 
        if ($state == Taewol_Restconnect_Model_OAuth_Client::OAUTH_STATE_ACCESS_TOKEN) {
            $acessToken = $oAuthClient->getAuthorizedToken();
        }
 
        $restClient = $acessToken->getHttpClient($params);
        // Set REST resource URL
        $restClient->setUri('http://ec2-52-11-121-54.us-west-2.compute.amazonaws.com:8080/magento/api/rest/customers');
        // In Magento it is neccesary to set json or xml headers in order to work
        $restClient->setHeaders('Accept', 'application/json');
        // Get method
        $restClient->setMethod(Zend_Http_Client::GET);
        Mage::log($restClient);
        //Make REST request
        $response = $restClient->request();
        // Here we can see that response body contains json list of products
        Zend_Debug::dump($response);
 
        return;
    }
 
}
