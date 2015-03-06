#!/bin/sh
echo $LD_LIBRARY_PATH | egrep "/home1/p11600/magento-1.9.1.0-1-64-bit/common" > /dev/null
if [ $? -ne 0 ] ; then
PATH="/home1/p11600/magento-1.9.1.0-1-64-bit/varnish/bin:/home1/p11600/magento-1.9.1.0-1-64-bit/sqlite/bin:/home1/p11600/magento-1.9.1.0-1-64-bit/php/bin:/home1/p11600/magento-1.9.1.0-1-64-bit/mysql/bin:/home1/p11600/magento-1.9.1.0-1-64-bit/apache2/bin:/home1/p11600/magento-1.9.1.0-1-64-bit/common/bin:$PATH"
export PATH
LD_LIBRARY_PATH="/home1/p11600/magento-1.9.1.0-1-64-bit/varnish/lib:/home1/p11600/magento-1.9.1.0-1-64-bit/varnish/lib/varnish:/home1/p11600/magento-1.9.1.0-1-64-bit/varnish/lib/varnish/vmods:/home1/p11600/magento-1.9.1.0-1-64-bit/sqlite/lib:/home1/p11600/magento-1.9.1.0-1-64-bit/mysql/lib:/home1/p11600/magento-1.9.1.0-1-64-bit/apache2/lib:/home1/p11600/magento-1.9.1.0-1-64-bit/common/lib:$LD_LIBRARY_PATH"
export LD_LIBRARY_PATH
fi

TERMINFO=/home1/p11600/magento-1.9.1.0-1-64-bit/common/share/terminfo
export TERMINFO
##### VARNISH ENV #####
		
      ##### SQLITE ENV #####
			
SASL_CONF_PATH=/home1/p11600/magento-1.9.1.0-1-64-bit/common/etc
export SASL_CONF_PATH
SASL_PATH=/home1/p11600/magento-1.9.1.0-1-64-bit/common/lib/sasl2 
export SASL_PATH
LDAPCONF=/home1/p11600/magento-1.9.1.0-1-64-bit/common/etc/openldap/ldap.conf
export LDAPCONF
##### PHP ENV #####
		    
##### MYSQL ENV #####

##### APACHE ENV #####

##### CURL ENV #####
CURL_CA_BUNDLE=/home1/p11600/magento-1.9.1.0-1-64-bit/common/openssl/certs/curl-ca-bundle.crt
export CURL_CA_BUNDLE
##### SSL ENV #####
SSL_CERT_FILE=/home1/p11600/magento-1.9.1.0-1-64-bit/common/openssl/certs/curl-ca-bundle.crt
export SSL_CERT_FILE
OPENSSL_CONF=/home1/p11600/magento-1.9.1.0-1-64-bit/common/openssl/openssl.cnf
export OPENSSL_CONF
OPENSSL_ENGINES=/home1/p11600/magento-1.9.1.0-1-64-bit/common/lib/engines
export OPENSSL_ENGINES


. /home1/p11600/magento-1.9.1.0-1-64-bit/scripts/build-setenv.sh
