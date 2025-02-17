rm -rf /usr/src/aifrus/fc2s/examples/export/*
php /usr/src/aifrus/fc2s/examples/get_latest.php
mv -f /usr/src/aifrus/fc2s/examples/export/* /usr/src/aifrus/nasr_sql_zips/archive/
cd /usr/src/aifrus/nasr_sql_zips && /usr/bin/push
