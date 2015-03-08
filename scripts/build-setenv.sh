#!/bin/sh
LDFLAGS="-L/home/ubuntu/magento/magento-1.9.1.0-1-64-bit/common/lib $LDFLAGS"
export LDFLAGS
CFLAGS="-I/home/ubuntu/magento/magento-1.9.1.0-1-64-bit/common/include $CFLAGS"
export CFLAGS
		    
PKG_CONFIG_PATH="/home/ubuntu/magento/magento-1.9.1.0-1-64-bit/common/lib/pkgconfig"
export PKG_CONFIG_PATH
