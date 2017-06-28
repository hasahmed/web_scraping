from lxml import html
import requests
import functions

#DONGChannelVidsUrl = 'https://www.youtube.com/channel/UClq42foiSgl7sSpLupnugGA/videos'
#url of DONG channel dong
DONGChannelVidsUrl = "https://www.youtube.com/watch?v=FfTAx4vlAh4&list=PLL0602iqqyiy6_ude-mFEJ7DRqqf0p-9o" 
dongVids = functions.collectLinksFromPlst(DONGChannelVidsUrl);

for var in dongVids:
    print var

print len(dongVids)
#print len(set(vids))
