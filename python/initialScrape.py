from lxml import html
import requests
import functions
from functions import DONGLink

#DONGChannelVidsUrl: url of DONG channel dong
DONGChannelVidsUrl = "https://www.youtube.com/watch?v=FfTAx4vlAh4&list=PLL0602iqqyiy6_ude-mFEJ7DRqqf0p-9o" 
#vsauceChannelVidsUrl: the url of a playlist containing all the dongs from vsauce 1
vsauceChannelVidsUrl = "https://www.youtube.com/watch?v=aNgE_hf41NY&list=PLEC0A5E71DE1EDFCE"
#vsauce3ChannelVidsUrl: the url of a playlist containing all the dongs from vsauce3. note* vsauce2 doesn't have a dong playlist
vsauce3ChannelVidsUrl = "https://www.youtube.com/watch?v=2bT5Q8GEp2E&list=PLiyjwVB09t5w78Kt-puO3KpUpBmgUg-JC"



#DONGDONGVids the list of dong videos from the youtube channel called DONG
DONGDONGVids = functions.collectLinksFromPlst(DONGChannelVidsUrl)
#vsauceDONGVids: the list of dong vids collected from vsauce channel
vsauceDONGVids = functions.collectLinksFromPlst(vsauceChannelVidsUrl)
#vsauce3DONGVids: the list of DONG vids collect from vsauce3 channel
vsauce3DONGVids = functions.collectLinksFromPlst(vsauce3ChannelVidsUrl)

#allVids: just all the links to all the DONG videos in a single list
allVids = vsauce3DONGVids + vsauceDONGVids + DONGDONGVids

allDONGLinks = []

for var in allVids:
    allDONGLinks = allDONGLinks + functions.gatherDONGs(var)

#clean links and remove duplicates;
allDONGLinks = functions.cleanDONGLinks(allDONGLinks)
allDONGLinks = functions.removeDups(allDONGLinks)


#create list of DONGLink objects
DONGLinkClassList = []
for var in allDONGLinks:
    DONGLinkClassList.append(DONGLink(var));

#connect to db
db = functions.sqlConnect()
cur = db.cursor()

#insert links and id's into db
for var in DONGLinkClassList:
    pass
#    var.insert(cur)

DONGLink.insertLs(cur, DONGLinkClassList);

db.close();

print len(allDONGLinks), ' links scraped'
