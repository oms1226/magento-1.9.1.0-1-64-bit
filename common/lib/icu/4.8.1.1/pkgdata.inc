GENCCODE_ASSEMBLY_TYPE=-a gcc
SO=so
SOBJ=so
A=a
LIBPREFIX=lib
LIB_EXT_ORDER=.48.1.1
COMPILE=gcc -I/bitnami/lampstack-linux-x64/output/sqlite/include -I/home/ubuntu/magento/magento-1.9.1.0-1-64-bit/common/include -I/home/ubuntu/magento/magento-1.9.1.0-1-64-bit/common/include/sasl -I/home/ubuntu/magento/magento-1.9.1.0-1-64-bit/common/include -D_REENTRANT -DU_ATTRIBUTE_DEPRECATED= -I/home/ubuntu/magento/magento-1.9.1.0-1-64-bit/common/include -fPIC -m64 -Wall -ansi -pedantic -Wshadow -Wpointer-arith -Wmissing-prototypes -Wwrite-strings -Wno-long-long  -c
LIBFLAGS=-I/home/ubuntu/magento/magento-1.9.1.0-1-64-bit/common/include -DPIC -fPIC
GENLIB=gcc -I/home/ubuntu/magento/magento-1.9.1.0-1-64-bit/common/include -fPIC -m64 -Wall -ansi -pedantic -Wshadow -Wpointer-arith -Wmissing-prototypes -Wwrite-strings -Wno-long-long  -L/bitnami/lampstack-linux-x64/output/sqlite/lib -L/home/ubuntu/magento/magento-1.9.1.0-1-64-bit/common/lib  -shared -Wl,-Bsymbolic
LDICUDTFLAGS=-nodefaultlibs -nostdlib
LD_SONAME=-Wl,-soname -Wl,
RPATH_FLAGS=
BIR_LDFLAGS=-Wl,-Bsymbolic
AR=ar
ARFLAGS=r
RANLIB=ranlib
INSTALL_CMD=/usr/bin/install -c
