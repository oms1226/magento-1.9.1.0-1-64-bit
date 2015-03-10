./ctlscript.sh stop \
&& find . -name '*.pid' -exec git rm --cached {} \; \
&& find . -name '*.log' -exec git rm --cached {} \; \
&& echo "pid is deleted!" \
&& git add . \
&& echo "add is completed!" \
&& git rm --cached -r ./apps/magento/htdocs/var/session \
&& echo "session is deleted!" \
&& git rm --cached -r ./apache2/var/cache/mod_pagespeed \
&& echo "mod_pagespedd is deleted!" \
&& echo "git log" \
&& echo "log is ended!" \
&& git status \
&& echo "argument0:${1}" \
&& git commit -m "${1}" \
&& git push -u oms1226 taewolInAWS
