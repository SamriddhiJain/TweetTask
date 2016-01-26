#!/usr/bin/python

import sys
import requests
import json

endpoint = "https://text.s4.ontotext.com/v1/news"
api_key = "s4kk59irbo6u"
key_secret = "qst3rtr0kmpeq13"
data = {
    "document": str(sys.argv[1:]),
    "documentType": "text/plain"
}
jsonData = json.dumps(data)
http_proxy  = "http://10.8.0.1:8080"
https_proxy = "https://10.8.0.1:8080"

proxyDict = { 
              "http"  : http_proxy, 
              "https" : https_proxy
            }

headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
    "Accept-Encoding": "gzip",
}

req = requests.post(
    endpoint, headers=headers,
    data=jsonData, auth=(api_key, key_secret),proxies=proxyDict)

response = json.loads(req.content.decode("utf-8"))
print (response, "\n")