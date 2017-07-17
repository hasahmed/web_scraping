import functions
import sys
import time

for i in range(0, 100000):
    print i % 100 / 2 * 15
    #sys.stdout.flush()
    time.sleep(1)
