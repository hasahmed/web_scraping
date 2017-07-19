from lxml import html
import requests
import MySQLdb
import hashlib
import sys


def getTitle(url):
    try:
        page = requests.get(url, timeout=5)
    except:
        return -1 #-1 is the code which means delete this link because it doesn't work
    try:
        tree = html.fromstring(page.content)
    except(html.etree.XMLSyntaxError):
        return False
    title = tree.xpath('//title/text()')
    if not title: return False #false means that the page searched doesn't have a title
    elif "404" in title[0] or "403" in title[0] or "no such app" in title[0].lower(): return -1
    else: return title[0]#if the page does have a title strip it form the list
   # else: return title[0].strip('"').strip("'") #if the page does have a title strip it form the list
    #else: return title[0].replace("'", '').replace('"', '').strip('"').strip("'") #if the page does have a title strip it form the list


#gatherDONGs: takes the url of a youtube video and gathers all the links from the videos description
#returns an array containing the links from the particular video
def gatherDONGs(DONGVidUrl):
    page = requests.get(DONGVidUrl)
    tree = html.fromstring(page.content)
    print "Gathering DONGs..."
    return tree.xpath('//*[@id="eow-description"]/a/@href')

#cleanDONGLinks: removes (or at least trys to) non-dong links
# note to self. make function that removes most of this stuff
# based on a few patterns. Utilize regex
def cleanDONGLinks(links, ignoreContentList = [
    'http://www.soundcloud.com/JakeChudnow',
    'http://goo.gl/xKcZZ',
    'fb.me',
    'http://www.jakechudnow.com/',
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
    'youtu.be',
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
            continue
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

#collects the vsauce DONG video links from a playlist containing all the videos
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

def sqlInsertDONGLinkList(ls):
    db = sqlConnect();
    cur = db.cursor();
    for var in ls:
        var.insert(cur)
    db.close();


class DONGLink:
    'This object describes the characteristics of a DONG link'
    def __init__(self, url):
        self.link = url
        self.id = hashlib.sha1(url) 
        self.title = getTitle(url)
        if not self.title:
            self.title = url
        elif self.title == -1:
            pass
        else: self.title = self.title
        self.printDONG()
    def printDONG(self):
        print self.title
        print self.id
        print self.link
        print ""
    def insert(self, cur):
        print "Inserting..."
        if self.title != -1:
            try:
                cmd = 'INSERT IGNORE INTO links SET link = %s, id = %s, title = %s'
                cur.execute(cmd, (self.link, self.id, self.title))
            except:
                pass
