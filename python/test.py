import MySQLdb
import functions

db = MySQLdb.connect(host = 'silo.soic.indiana.edu',
        user = 'whoever',
        passwd = 'wha55up',
        db = 'DONG',
        port = 32904
        )
cur = db.cursor()
sqlStr = 'insert into links values ' + functions.sqlStringify(['taco.com', 'lettuce.com', 'milk.com'])

print sqlStr
cur.execute(sqlStr) 

db.close();
