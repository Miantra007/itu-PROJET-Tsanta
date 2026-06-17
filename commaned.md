rm -f writable/supermarche.db \
&& sqlite3 writable/supermarche.db < base.sql \
&& sqlite3 writable/supermarche.db < data.sql