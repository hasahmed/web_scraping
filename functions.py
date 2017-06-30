from lxml import html
import requests


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
