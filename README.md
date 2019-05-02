# dy-segment-to-mysql

Small app using slim to accept segment events and insert them into mysql

1. Pull the repo
2. Run compose update
3. php -S localhost:8080
4. POST to http://localhost:8080/event/new

with the following headers and body

user-agent Segment/version
Content-Type application/json

body:
{"anonymousId":"13455b30-ec4f-41f4-adbb-9f28fd0582b9","channel":"server","context":{"app":{"build":"271","name":"Yello","namespace":"com.driveyello.yello","version":"Yello_v2.6_0408-release"},"device":{"type":"android","adTrackingEnabled":true,"advertisingId":"d3c84868-afcb-4aca-bbd7-1366d91a097c","id":"f0334f47cce75c25","manufacturer":"samsung","model":"SM-G935F","name":"hero2lte"},"ip":"120.18.121.13","library":{"name":"analytics-android","version":"4.4.0-beta1"},"locale":"en-AU","network":{"bluetooth":false,"carrier":"Optus AU | Vivo","cellular":false,"wifi":true},"os":{"name":"Android","version":"8.0.0"},"screen":{"density":3,"height":1920,"width":1080},"timezone":"Australia/Sydney","traits":{"anonymousId":"13455b30-ec4f-41f4-adbb-9f28fd0582b9","email":"jonatas_cabral@outlook.com","userId":"27271"},"userAgent":"Dalvik/2.1.0 (Linux; U; Android 8.0.0; SM-G935F Build/R16NW)"},"event":"Exited Inner Fence","integrations":{},"messageId":"d3406fdd-adc6-4b12-a7d5-686b385f3efb","originalTimestamp":"2019-05-02T03:20:45.244Z","projectId":"FxX6C9u3ex","properties":{"Roaming Request ID":"73e5fbd5-a967-4414-b3d3-165ba65b8d9d","Run ID":"ca526388-8420-4119-a2b6-09287c580726","Shift ID":"null","exitedStoreFence":1556767245242,"triggeredLocation":"{latitude : -33.8759449, longitude: 151.2460626}"},"receivedAt":"2019-05-02T03:19:12.516Z","sentAt":"2019-05-02T03:20:52.362Z","timestamp":"2019-05-02T03:19:05.398Z","type":"track","userId":"27271","version":2,"writeKey":"LbbhfSkNm5uTSamo6TB2NuNMPPVsbkwc"}