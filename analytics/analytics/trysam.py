#!/usr/bin/env python
import twitter
import operator
import re
import json
import sys
#Setting up Twitter API
api = twitter.Api(
 consumer_key='9N0JugZ0HOyB1tPoceJ8oVvmb',
 consumer_secret='20iW0ERGjrVei9HsxYcrFtfHdFaFHHLomfphwHiGuJoq4BDn1S',
 access_token_key='134418439-ORGHRwzlALoW4tFjXEWBXIAPpAs8RzbY96I11tII',
 access_token_secret='oprhHQMF4teld1PqagELxNozx8svXhLxTPbOwnV3Qa9dd',
 proxy = { 'http'  : 'http://10.8.0.1:8080',
           'https' : 'https://10.8.0.1:8080' } )

query=str(sys.argv[1:]);

g={}
gmap={}

search = api.GetSearch(term=query,lang='en', count=100,max_id='')
#print search
for t in search:

	timeo=t.created_at.split(":")

	if(g.has_key(timeo[0])):
		g[timeo[0]]+=1
	else:
		g[timeo[0]]=1

	place=t.user.time_zone

	if(gmap.has_key(place)):
		gmap[place]+=1
	else:
		gmap[place]=1


max_id=t.id-1
if(max_id):
	search = api.GetSearch(term=query, lang='en', count=100 ,max_id=max_id)
	#print search
	for t in search:
		
		timeo=t.created_at.split(":")

		if(g.has_key(timeo[0])):
			g[timeo[0]]+=1
		else:
			g[timeo[0]]=1


		place=t.user.time_zone

		if(gmap.has_key(place)):
			gmap[place]+=1
		else:
			gmap[place]=1

g_sort = sorted(g.items(), key=operator.itemgetter(0))
gmap_sort = sorted(gmap.items(), key=operator.itemgetter(1))

dataT = {}
dataM= {}

for index, item in enumerate(g_sort):
	dataT[item[0]] = item[1]

for index, item in enumerate(gmap_sort):
	dataM[item[0]] = item[1]
    
data={}
data['map']=dataM
data['time']=dataT
json_data = json.dumps(data)

print json_data