from lxml import html
import requests
import MySQLdb
import uuid


#gatherDONGs: takes the url of a youtube video and gathers all the links from the videos description
def gatherDONGs(DONGVidUrl):
    page = requests.get(DONGVidUrl)
    tree = html.fromstring(page.content)
    return tree.xpath('//*[@id="eow-description"]/a/@href')

#cleanDONGLinks: removes (or at least trys to) non-dong links
# note to self. make function that removes most of this stuff
# based on a few patterns. Utilize regex
def cleanDONGLinks(links, ignoreContentList = [
    'http://www.soundcloud.com/JakeChudnow',
    'http://goo.gl/xKcZZ',
    'https://docs.google.com/document/d/1UDrmnu6hVlLkx3jGdOXje_dmMeOQO3uEHDHwgY5sxyE/edit',
    'http://www.facebook.com/Vsauce3',
    'http://www.instagr.am/jakerawr',
    'http://steamcommunity.com/groups/vsauce3',
    'http://goo.gl/lXy3CX',
    'http://www.twitter.com/vsaucethree',
    'http://www.districtlines.com/vsauce',
    'http://www.youtube.com/user/jakechudnow',
    'http://www.youtube.com/user/JAKECHUDNOW',
    'http://www.youtube.com/Vsauce',
    'http://www.youtube.com/Vsauce2',
    'http://www.youtube.com/Vsauce3',
    'http://www.youtube.com/wesauce',
    'vsauce',
    'facebook',
    'myspace',
    'instagram',
    'jakechundnow',
    'twitter.com',
    'http://youtu.be/xsRiQQBQpCE',
    'https://www.youtube.com/watch?v=DbobB1V0mL8&feature=mr_meh&list=PL9F828611D869B9BB&index=2&playnext=0',
    'http://www.myspace.com/jakechudnow',
    'https://www.curiositybox.com/',
    'https://www.youtube.com/c/HannahCanetti',
    'http://youtube.com/ericlanglay',
    'https://www.facebook.com/VsauceGaming',
    'http://goo.gl/XEWDI',
    'http://www.trevorvanmeter.com/flyguy/flyGuy.swf'
    ]):
    newLs = list(links)
    toRemove = []
    for i in range(0, len(links)):
        for j in range(0, len(ignoreContentList)):
            if ignoreContentList[j].lower() in links[i].lower():
                toRemove.append(links[i])
            if 'youtube' in links[i].lower() and 'list' not in links[i].lower():
                toRemove.append(links[i])
    for var in toRemove:
        try:
            newLs.remove(var)
        except ValueError:
            pass
    return newLs

#used to get all of the links of all of the dongs from the dong youtube channel
#from there these links will be used to load those pages and collect those dongs
def getAllLinks(url):
    page = requests.get(url)
    tree = html.fromstring(page.content)
    return tree.xpath('//a/@href')

#removes the non playlist links from all the links collected from a playlist youtube page
def rmNonPlstLinks(ls):
    newList = []
    for var in ls :
        if "&list=" in var: 
            newList.append(var)
    return newList


#removes the excess encoded url data from a video link string collected from a playlist
def stripPlstInfo(url):
    endIndex = url.find("&")
    if endIndex == -1:
        raise ValueError("It appears you are trying to clean a string with no encoded data")
    return url[0:endIndex]

#preforms stripPlistInfo on every element of a list
def stripPlstInfo_ls(ls):
    for i in range(0, len(ls)) :
        ls[i] = stripPlstInfo(ls[i])

def prependYouTube(url):
    youtubeURL = 'https://www.youtube.com'
    if youtubeURL not in url:
        url = youtubeURL + url
    return url

def prependYouTube_ls(listOfURLs):
    for i in range(0, len(listOfURLs)):
        listOfURLs[i] = prependYouTube(listOfURLs[i])

#just removes the duplicates of a list
def removeDups(ls):
    return list(set(ls))

def collectLinksFromPlst(url):
    vids = getAllLinks(url)
    vids = rmNonPlstLinks(vids)
    stripPlstInfo_ls(vids)
    prependYouTube_ls(vids)
    vids = removeDups(vids)
    return vids

def sqlStringify(ls):
    sqlString = ''
    for i in range(0, len(ls)):
        sqlString = sqlString + '(' +'\"' + ls[i] + '\"' + ')' + ', '
    sqlString = sqlString[0:len(sqlString) -2]
    return sqlString

def sqlConnect():
    db = MySQLdb.connect(host = 'silo.soic.indiana.edu',
            user = 'whoever',
            passwd = 'wha55up',
            db = 'DONG',
            port = 32904)
    return db

class DONGLink:
    'This object describes the characteristics of a DONG link'
    def __init__(self, url):
        self.link = url;
        self.id = uuid.uuid4()
    def insert(self, cur):
        cur.execute('INSERT INTO links SET link = "%s", id = "%s"' %(self.link, self.id))

