# Usage
```
# Runs the nats-streaming in debug and trace mode
docker-compose up nats-streaming

# Runs the PHP client and publish 1 message to 4 channels
docker-compose up php
```

# Problem
If you look at the log you see a break for ~40MS between SUB and UNSUB

```
....
nats-streaming_1  | [1] 2018/11/09 14:06:06.883282 [TRC] 172.151.4.3:35908 - cid:4 - ->> [SUB _STAN.acks.5be5944ed78e5 HC565Ll2LN31hhEK]
nats-streaming_1  | [1] 2018/11/09 14:06:06.925549 [TRC] 172.151.4.3:35908 - cid:4 - ->> [UNSUB HC565Ll2LN31hhEK 1]
....
nats-streaming_1  | [1] 2018/11/09 14:06:06.927518 [TRC] 172.151.4.3:35908 - cid:4 - ->> [SUB _INBOX.5be5944ee250e rFxZvkqdhAqZZIgG]
nats-streaming_1  | [1] 2018/11/09 14:06:06.969480 [TRC] 172.151.4.3:35908 - cid:4 - ->> [UNSUB rFxZvkqdhAqZZIgG 1]
```

# Logs

```
nats-streaming_1  | [1] 2018/11/09 14:05:53.614958 [INF] STREAM: Starting nats-streaming-server[test-cluster] version 0.11.2
nats-streaming_1  | [1] 2018/11/09 14:05:53.615001 [INF] STREAM: ServerID: 5OrFl4PSSBuCPqmBsC1Qpa
nats-streaming_1  | [1] 2018/11/09 14:05:53.615006 [INF] STREAM: Go version: go1.11.1
nats-streaming_1  | [1] 2018/11/09 14:05:53.615757 [INF] Starting nats-server version 1.3.0
nats-streaming_1  | [1] 2018/11/09 14:05:53.615774 [DBG] Go build version go1.11.1
nats-streaming_1  | [1] 2018/11/09 14:05:53.615780 [INF] Git commit [not set]
nats-streaming_1  | [1] 2018/11/09 14:05:53.615943 [INF] Starting http monitor on 0.0.0.0:8222
nats-streaming_1  | [1] 2018/11/09 14:05:53.616010 [INF] Listening for client connections on 0.0.0.0:4222
nats-streaming_1  | [1] 2018/11/09 14:05:53.616020 [DBG] Server id is S9yTrp5YxjQkol8qg9webI
nats-streaming_1  | [1] 2018/11/09 14:05:53.616024 [INF] Server is ready
nats-streaming_1  | [1] 2018/11/09 14:05:53.640921 [TRC] STREAM:  NATS conn opts: { [nats://127.0.0.1:4222] false false _NSS-test-cluster-send false false false <nil> true -1 250ms 2s 30s 0s 2m0s 2 0x91e3a0 0x91e3f0 0x91e350 <nil> 0x91e2e0 -1 8192    <nil> <nil> false}
nats-streaming_1  | [1] 2018/11/09 14:05:53.641317 [DBG] 127.0.0.1:59918 - cid:1 - Client connection created
nats-streaming_1  | [1] 2018/11/09 14:05:53.641938 [TRC] 127.0.0.1:59918 - cid:1 - ->> [CONNECT {"verbose":false,"pedantic":false,"tls_required":false,"name":"_NSS-test-cluster-send","lang":"go","version":"1.6.0","protocol":1,"echo":true}]
nats-streaming_1  | [1] 2018/11/09 14:05:53.642027 [TRC] 127.0.0.1:59918 - cid:1 - ->> [PING]
nats-streaming_1  | [1] 2018/11/09 14:05:53.642041 [TRC] 127.0.0.1:59918 - cid:1 - <<- [PONG]
nats-streaming_1  | [1] 2018/11/09 14:05:53.642211 [TRC] STREAM:  NATS conn opts: { [nats://127.0.0.1:4222] false false _NSS-test-cluster-general false false false <nil> true -1 250ms 2s 30s 0s 2m0s 2 0x91e3a0 0x91e3f0 0x91e350 <nil> 0x91e2e0 -1 8192    <nil> <nil> false}
nats-streaming_1  | [1] 2018/11/09 14:05:53.642558 [DBG] 127.0.0.1:59920 - cid:2 - Client connection created
nats-streaming_1  | [1] 2018/11/09 14:05:53.642938 [TRC] 127.0.0.1:59920 - cid:2 - ->> [CONNECT {"verbose":false,"pedantic":false,"tls_required":false,"name":"_NSS-test-cluster-general","lang":"go","version":"1.6.0","protocol":1,"echo":true}]
nats-streaming_1  | [1] 2018/11/09 14:05:53.642981 [TRC] 127.0.0.1:59920 - cid:2 - ->> [PING]
nats-streaming_1  | [1] 2018/11/09 14:05:53.642994 [TRC] 127.0.0.1:59920 - cid:2 - <<- [PONG]
nats-streaming_1  | [1] 2018/11/09 14:05:53.643158 [TRC] STREAM:  NATS conn opts: { [nats://127.0.0.1:4222] false false _NSS-test-cluster-acks false false false <nil> true -1 250ms 2s 30s 0s 2m0s 2 0x91e3a0 0x91e3f0 0x91e350 <nil> 0x91e2e0 -1 8192    <nil> <nil> false}
nats-streaming_1  | [1] 2018/11/09 14:05:53.643448 [DBG] 127.0.0.1:59922 - cid:3 - Client connection created
nats-streaming_1  | [1] 2018/11/09 14:05:53.643693 [TRC] 127.0.0.1:59922 - cid:3 - ->> [CONNECT {"verbose":false,"pedantic":false,"tls_required":false,"name":"_NSS-test-cluster-acks","lang":"go","version":"1.6.0","protocol":1,"echo":true}]
nats-streaming_1  | [1] 2018/11/09 14:05:53.643732 [TRC] 127.0.0.1:59922 - cid:3 - ->> [PING]
nats-streaming_1  | [1] 2018/11/09 14:05:53.643742 [TRC] 127.0.0.1:59922 - cid:3 - <<- [PONG]
nats-streaming_1  | [1] 2018/11/09 14:05:53.643881 [INF] STREAM: Recovering the state...
nats-streaming_1  | [1] 2018/11/09 14:05:53.643892 [INF] STREAM: No recovered state
nats-streaming_1  | [1] 2018/11/09 14:05:53.644020 [TRC] 127.0.0.1:59920 - cid:2 - ->> [SUB _INBOX.5OrFl4PSSBuCPqmBsC1R0H.*  1]
nats-streaming_1  | [1] 2018/11/09 14:05:53.644051 [TRC] 127.0.0.1:59920 - cid:2 - ->> [PUB _STAN.discover.test-cluster _INBOX.5OrFl4PSSBuCPqmBsC1R0H.5OrFl4PSSBuCPqmBsC1R3q 45]
nats-streaming_1  | [1] 2018/11/09 14:05:53.644060 [TRC] 127.0.0.1:59920 - cid:2 - ->> MSG_PAYLOAD: [
nats-streaming_1  | 
                    test-cluster_INBOX.5OrFl4PSSBuCPqmBsC1Qwi]
nats-streaming_1  | [1] 2018/11/09 14:05:53.894105 [DBG] STREAM: Did not detect another server instance
nats-streaming_1  | [1] 2018/11/09 14:05:53.894223 [DBG] STREAM: Discover subject:           _STAN.discover.test-cluster
nats-streaming_1  | [1] 2018/11/09 14:05:53.894235 [DBG] STREAM: Publish subject:            _STAN.pub.5OrFl4PSSBuCPqmBsC1Qt9.>
nats-streaming_1  | [1] 2018/11/09 14:05:53.894240 [DBG] STREAM: Subscribe subject:          _STAN.sub.5OrFl4PSSBuCPqmBsC1Qt9
nats-streaming_1  | [1] 2018/11/09 14:05:53.894245 [DBG] STREAM: Subscription Close subject: _STAN.subclose.5OrFl4PSSBuCPqmBsC1Qt9
nats-streaming_1  | [1] 2018/11/09 14:05:53.894249 [DBG] STREAM: Unsubscribe subject:        _STAN.unsub.5OrFl4PSSBuCPqmBsC1Qt9
nats-streaming_1  | [1] 2018/11/09 14:05:53.894253 [DBG] STREAM: Close subject:              _STAN.close.5OrFl4PSSBuCPqmBsC1Qt9
nats-streaming_1  | [1] 2018/11/09 14:05:53.894351 [TRC] 127.0.0.1:59920 - cid:2 - ->> [SUB _STAN.discover.test-cluster  2]
nats-streaming_1  | [1] 2018/11/09 14:05:53.894384 [TRC] 127.0.0.1:59920 - cid:2 - ->> [SUB _STAN.pub.5OrFl4PSSBuCPqmBsC1Qt9.>  3]
nats-streaming_1  | [1] 2018/11/09 14:05:53.894397 [TRC] 127.0.0.1:59920 - cid:2 - ->> [SUB _STAN.sub.5OrFl4PSSBuCPqmBsC1Qt9  4]
nats-streaming_1  | [1] 2018/11/09 14:05:53.894406 [TRC] 127.0.0.1:59920 - cid:2 - ->> [SUB _STAN.unsub.5OrFl4PSSBuCPqmBsC1Qt9  5]
nats-streaming_1  | [1] 2018/11/09 14:05:53.894415 [TRC] 127.0.0.1:59920 - cid:2 - ->> [SUB _STAN.subclose.5OrFl4PSSBuCPqmBsC1Qt9  6]
nats-streaming_1  | [1] 2018/11/09 14:05:53.894429 [TRC] 127.0.0.1:59920 - cid:2 - ->> [SUB _STAN.close.5OrFl4PSSBuCPqmBsC1Qt9  7]
nats-streaming_1  | [1] 2018/11/09 14:05:53.894449 [TRC] 127.0.0.1:59920 - cid:2 - ->> [SUB _STAN.discover.test-cluster.pings  8]
nats-streaming_1  | [1] 2018/11/09 14:05:53.894464 [TRC] 127.0.0.1:59920 - cid:2 - ->> [PING]
nats-streaming_1  | [1] 2018/11/09 14:05:53.894474 [TRC] 127.0.0.1:59920 - cid:2 - <<- [PONG]
nats-streaming_1  | [1] 2018/11/09 14:05:53.894552 [INF] STREAM: Message store is MEMORY
nats-streaming_1  | [1] 2018/11/09 14:05:53.894595 [INF] STREAM: ---------- Store Limits ----------
nats-streaming_1  | [1] 2018/11/09 14:05:53.894601 [INF] STREAM: Channels:                  100 *
nats-streaming_1  | [1] 2018/11/09 14:05:53.894604 [INF] STREAM: --------- Channels Limits --------
nats-streaming_1  | [1] 2018/11/09 14:05:53.894607 [INF] STREAM:   Subscriptions:          1000 *
nats-streaming_1  | [1] 2018/11/09 14:05:53.894609 [INF] STREAM:   Messages     :       1000000 *
nats-streaming_1  | [1] 2018/11/09 14:05:53.894612 [INF] STREAM:   Bytes        :     976.56 MB *
nats-streaming_1  | [1] 2018/11/09 14:05:53.894615 [INF] STREAM:   Age          :     unlimited *
nats-streaming_1  | [1] 2018/11/09 14:05:53.894618 [INF] STREAM:   Inactivity   :     unlimited *
nats-streaming_1  | [1] 2018/11/09 14:05:53.894621 [INF] STREAM: ----------------------------------
nats-streaming_1  | [1] 2018/11/09 14:06:06.700212 [DBG] 172.151.4.3:35908 - cid:4 - Client connection created
nats-streaming_1  | [1] 2018/11/09 14:06:06.700458 [TRC] 172.151.4.3:35908 - cid:4 - ->> [CONNECT {"lang":"php","version":"0.8.2","verbose":false,"pedantic":false}]
nats-streaming_1  | [1] 2018/11/09 14:06:06.701121 [TRC] 172.151.4.3:35908 - cid:4 - ->> [PING]
nats-streaming_1  | [1] 2018/11/09 14:06:06.701144 [TRC] 172.151.4.3:35908 - cid:4 - <<- [PONG]
nats-streaming_1  | [1] 2018/11/09 14:06:06.702231 [TRC] 172.151.4.3:35908 - cid:4 - ->> [SUB _INBOX.5be5944eab53a /WFJFuOpkWgkoWV2]
nats-streaming_1  | [1] 2018/11/09 14:06:06.745544 [TRC] 172.151.4.3:35908 - cid:4 - ->> [SUB _INBOX.5be5944eac4ce ZIo/I2Pq9wvYqFvg]
nats-streaming_1  | [1] 2018/11/09 14:06:06.745585 [TRC] 172.151.4.3:35908 - cid:4 - ->> [UNSUB ZIo/I2Pq9wvYqFvg 1]
nats-streaming_1  | [1] 2018/11/09 14:06:06.745594 [DBG] 172.151.4.3:35908 - cid:4 - Deferring actual UNSUB(_INBOX.5be5944eac4ce): 1 max, 0 received
nats-streaming_1  | [1] 2018/11/09 14:06:06.745603 [TRC] 172.151.4.3:35908 - cid:4 - ->> [PUB _STAN.discover.test-cluster _INBOX.5be5944eac4ce 29]
nats-streaming_1  | [1] 2018/11/09 14:06:06.745609 [TRC] 172.151.4.3:35908 - cid:4 - ->> MSG_PAYLOAD: [
nats-streaming_1  | testc_INBOX.5be5944eab53a]
nats-streaming_1  | [1] 2018/11/09 14:06:06.745622 [TRC] 127.0.0.1:59920 - cid:2 - <<- [MSG _STAN.discover.test-cluster 2 _INBOX.5be5944eac4ce 29]
nats-streaming_1  | [1] 2018/11/09 14:06:06.745807 [DBG] STREAM: [Client:testc] Connected (Inbox=_INBOX.5be5944eab53a)
nats-streaming_1  | [1] 2018/11/09 14:06:06.745891 [TRC] 127.0.0.1:59920 - cid:2 - ->> [PUB _INBOX.5be5944eac4ce 181]
nats-streaming_1  | [1] 2018/11/09 14:06:06.745926 [TRC] 127.0.0.1:59920 - cid:2 - ->> MSG_PAYLOAD: [
nats-streaming_1  |  _STAN.pub.5OrFl4PSSBuCPqmBsC1Qt9 _STAN.sub.5OrFl4PSSBuCPqmBsC1Qt9"_STAN.unsub.5OrFl4PSSBuCPqmBsC1Qt9""_STAN.close.5OrFl4PSSBuCPqmBsC1Qt92%_STAN.subclose.5OrFl4PSSBuCPqmBsC1Qt9P]
nats-streaming_1  | [1] 2018/11/09 14:06:06.745950 [DBG] 127.0.0.1:59920 - cid:2 - Auto-unsubscribe limit of 1 reached for sid 'ZIo/I2Pq9wvYqFvg'
nats-streaming_1  | [1] 2018/11/09 14:06:06.745961 [TRC] 172.151.4.3:35908 - cid:4 - <<- [MSG _INBOX.5be5944eac4ce ZIo/I2Pq9wvYqFvg 181]
nats-streaming_1  | [1] 2018/11/09 14:06:06.745971 [TRC] 172.151.4.3:35908 - cid:4 - <-> [DELSUB ZIo/I2Pq9wvYqFvg]
nats-streaming_1  | [1] 2018/11/09 14:06:06.750760 [TRC] 172.151.4.3:35908 - cid:4 - ->> [SUB _STAN.acks.5be5944eb7328 XbN7D6yf6VtmVuDh]
nats-streaming_1  | [1] 2018/11/09 14:06:06.793513 [TRC] 172.151.4.3:35908 - cid:4 - ->> [UNSUB XbN7D6yf6VtmVuDh 1]
nats-streaming_1  | [1] 2018/11/09 14:06:06.793535 [DBG] 172.151.4.3:35908 - cid:4 - Deferring actual UNSUB(_STAN.acks.5be5944eb7328): 1 max, 0 received
nats-streaming_1  | [1] 2018/11/09 14:06:06.793562 [TRC] 172.151.4.3:35908 - cid:4 - ->> [PUB _STAN.pub.5OrFl4PSSBuCPqmBsC1Qt9.special.subject0 _STAN.acks.5be5944eb7328 71]
nats-streaming_1  | [1] 2018/11/09 14:06:06.793571 [TRC] 172.151.4.3:35908 - cid:4 - ->> MSG_PAYLOAD: [
nats-streaming_1  | testcxyvBX3rln/BH3oPUspecial.subject0*some serialized payload...]
nats-streaming_1  | [1] 2018/11/09 14:06:06.793593 [TRC] 127.0.0.1:59920 - cid:2 - <<- [MSG _STAN.pub.5OrFl4PSSBuCPqmBsC1Qt9.special.subject0 3 _STAN.acks.5be5944eb7328 71]
nats-streaming_1  | [1] 2018/11/09 14:06:06.793689 [INF] STREAM: Channel "special.subject0" has been created
nats-streaming_1  | [1] 2018/11/09 14:06:06.793708 [TRC] STREAM: [Client:testc] Acking Publisher subj=special.subject0 guid=xyvBX3rln/BH3oPU
nats-streaming_1  | [1] 2018/11/09 14:06:06.794263 [TRC] 127.0.0.1:59918 - cid:1 - ->> [PUB _STAN.acks.5be5944eb7328 18]
nats-streaming_1  | [1] 2018/11/09 14:06:06.794281 [TRC] 127.0.0.1:59918 - cid:1 - ->> MSG_PAYLOAD: [
nats-streaming_1  | xyvBX3rln/BH3oPU]
nats-streaming_1  | [1] 2018/11/09 14:06:06.794301 [DBG] 127.0.0.1:59918 - cid:1 - Auto-unsubscribe limit of 1 reached for sid 'XbN7D6yf6VtmVuDh'
nats-streaming_1  | [1] 2018/11/09 14:06:06.794309 [TRC] 172.151.4.3:35908 - cid:4 - <<- [MSG _STAN.acks.5be5944eb7328 XbN7D6yf6VtmVuDh 18]
nats-streaming_1  | [1] 2018/11/09 14:06:06.794319 [TRC] 172.151.4.3:35908 - cid:4 - <-> [DELSUB XbN7D6yf6VtmVuDh]
nats-streaming_1  | [1] 2018/11/09 14:06:06.795953 [TRC] 172.151.4.3:35908 - cid:4 - ->> [SUB _STAN.acks.5be5944ec23ff xsht+pE0CvQ7eT9g]
nats-streaming_1  | [1] 2018/11/09 14:06:06.837502 [TRC] 172.151.4.3:35908 - cid:4 - ->> [UNSUB xsht+pE0CvQ7eT9g 1]
nats-streaming_1  | [1] 2018/11/09 14:06:06.837522 [DBG] 172.151.4.3:35908 - cid:4 - Deferring actual UNSUB(_STAN.acks.5be5944ec23ff): 1 max, 0 received
nats-streaming_1  | [1] 2018/11/09 14:06:06.837531 [TRC] 172.151.4.3:35908 - cid:4 - ->> [PUB _STAN.pub.5OrFl4PSSBuCPqmBsC1Qt9.special.subject1 _STAN.acks.5be5944ec23ff 71]
nats-streaming_1  | [1] 2018/11/09 14:06:06.837544 [TRC] 172.151.4.3:35908 - cid:4 - ->> MSG_PAYLOAD: [
nats-streaming_1  | testc6vIf7EkHOYDsI7mZspecial.subject1*some serialized payload...]
nats-streaming_1  | [1] 2018/11/09 14:06:06.837563 [TRC] 127.0.0.1:59920 - cid:2 - <<- [MSG _STAN.pub.5OrFl4PSSBuCPqmBsC1Qt9.special.subject1 3 _STAN.acks.5be5944ec23ff 71]
nats-streaming_1  | [1] 2018/11/09 14:06:06.837712 [INF] STREAM: Channel "special.subject1" has been created
nats-streaming_1  | [1] 2018/11/09 14:06:06.837733 [TRC] STREAM: [Client:testc] Acking Publisher subj=special.subject1 guid=6vIf7EkHOYDsI7mZ
nats-streaming_1  | [1] 2018/11/09 14:06:06.837814 [TRC] 127.0.0.1:59918 - cid:1 - ->> [PUB _STAN.acks.5be5944ec23ff 18]
nats-streaming_1  | [1] 2018/11/09 14:06:06.837844 [TRC] 127.0.0.1:59918 - cid:1 - ->> MSG_PAYLOAD: [
nats-streaming_1  | 6vIf7EkHOYDsI7mZ]
nats-streaming_1  | [1] 2018/11/09 14:06:06.837864 [DBG] 127.0.0.1:59918 - cid:1 - Auto-unsubscribe limit of 1 reached for sid 'xsht+pE0CvQ7eT9g'
nats-streaming_1  | [1] 2018/11/09 14:06:06.837885 [TRC] 172.151.4.3:35908 - cid:4 - <<- [MSG _STAN.acks.5be5944ec23ff xsht+pE0CvQ7eT9g 18]
nats-streaming_1  | [1] 2018/11/09 14:06:06.837896 [TRC] 172.151.4.3:35908 - cid:4 - <-> [DELSUB xsht+pE0CvQ7eT9g]
nats-streaming_1  | [1] 2018/11/09 14:06:06.838897 [TRC] 172.151.4.3:35908 - cid:4 - ->> [SUB _STAN.acks.5be5944eccb8f KqJxbtFpKNFnZFYO]
nats-streaming_1  | [1] 2018/11/09 14:06:06.881605 [TRC] 172.151.4.3:35908 - cid:4 - ->> [UNSUB KqJxbtFpKNFnZFYO 1]
nats-streaming_1  | [1] 2018/11/09 14:06:06.881660 [DBG] 172.151.4.3:35908 - cid:4 - Deferring actual UNSUB(_STAN.acks.5be5944eccb8f): 1 max, 0 received
nats-streaming_1  | [1] 2018/11/09 14:06:06.881681 [TRC] 172.151.4.3:35908 - cid:4 - ->> [PUB _STAN.pub.5OrFl4PSSBuCPqmBsC1Qt9.special.subject2 _STAN.acks.5be5944eccb8f 71]
nats-streaming_1  | [1] 2018/11/09 14:06:06.881694 [TRC] 172.151.4.3:35908 - cid:4 - ->> MSG_PAYLOAD: [
nats-streaming_1  | testcpgv7Cd9faL5pOhImspecial.subject2*some serialized payload...]
nats-streaming_1  | [1] 2018/11/09 14:06:06.881721 [TRC] 127.0.0.1:59920 - cid:2 - <<- [MSG _STAN.pub.5OrFl4PSSBuCPqmBsC1Qt9.special.subject2 3 _STAN.acks.5be5944eccb8f 71]
nats-streaming_1  | [1] 2018/11/09 14:06:06.881933 [INF] STREAM: Channel "special.subject2" has been created
nats-streaming_1  | [1] 2018/11/09 14:06:06.881957 [TRC] STREAM: [Client:testc] Acking Publisher subj=special.subject2 guid=pgv7Cd9faL5pOhIm
nats-streaming_1  | [1] 2018/11/09 14:06:06.882073 [TRC] 127.0.0.1:59918 - cid:1 - ->> [PUB _STAN.acks.5be5944eccb8f 18]
nats-streaming_1  | [1] 2018/11/09 14:06:06.882095 [TRC] 127.0.0.1:59918 - cid:1 - ->> MSG_PAYLOAD: [
nats-streaming_1  | pgv7Cd9faL5pOhIm]
nats-streaming_1  | [1] 2018/11/09 14:06:06.882152 [DBG] 127.0.0.1:59918 - cid:1 - Auto-unsubscribe limit of 1 reached for sid 'KqJxbtFpKNFnZFYO'
nats-streaming_1  | [1] 2018/11/09 14:06:06.882178 [TRC] 172.151.4.3:35908 - cid:4 - <<- [MSG _STAN.acks.5be5944eccb8f KqJxbtFpKNFnZFYO 18]
nats-streaming_1  | [1] 2018/11/09 14:06:06.882192 [TRC] 172.151.4.3:35908 - cid:4 - <-> [DELSUB KqJxbtFpKNFnZFYO]
nats-streaming_1  | [1] 2018/11/09 14:06:06.883282 [TRC] 172.151.4.3:35908 - cid:4 - ->> [SUB _STAN.acks.5be5944ed78e5 HC565Ll2LN31hhEK]
nats-streaming_1  | [1] 2018/11/09 14:06:06.925549 [TRC] 172.151.4.3:35908 - cid:4 - ->> [UNSUB HC565Ll2LN31hhEK 1]
nats-streaming_1  | [1] 2018/11/09 14:06:06.925571 [DBG] 172.151.4.3:35908 - cid:4 - Deferring actual UNSUB(_STAN.acks.5be5944ed78e5): 1 max, 0 received
nats-streaming_1  | [1] 2018/11/09 14:06:06.925580 [TRC] 172.151.4.3:35908 - cid:4 - ->> [PUB _STAN.pub.5OrFl4PSSBuCPqmBsC1Qt9.special.subject3 _STAN.acks.5be5944ed78e5 71]
nats-streaming_1  | [1] 2018/11/09 14:06:06.925593 [TRC] 172.151.4.3:35908 - cid:4 - ->> MSG_PAYLOAD: [
nats-streaming_1  | testcboQ3ygFmrc9oNMjospecial.subject3*some serialized payload...]
nats-streaming_1  | [1] 2018/11/09 14:06:06.925619 [TRC] 127.0.0.1:59920 - cid:2 - <<- [MSG _STAN.pub.5OrFl4PSSBuCPqmBsC1Qt9.special.subject3 3 _STAN.acks.5be5944ed78e5 71]
nats-streaming_1  | [1] 2018/11/09 14:06:06.925746 [INF] STREAM: Channel "special.subject3" has been created
nats-streaming_1  | [1] 2018/11/09 14:06:06.925761 [TRC] STREAM: [Client:testc] Acking Publisher subj=special.subject3 guid=boQ3ygFmrc9oNMjo
nats-streaming_1  | [1] 2018/11/09 14:06:06.925844 [TRC] 127.0.0.1:59918 - cid:1 - ->> [PUB _STAN.acks.5be5944ed78e5 18]
nats-streaming_1  | [1] 2018/11/09 14:06:06.925860 [TRC] 127.0.0.1:59918 - cid:1 - ->> MSG_PAYLOAD: [
nats-streaming_1  | boQ3ygFmrc9oNMjo]
nats-streaming_1  | [1] 2018/11/09 14:06:06.925877 [DBG] 127.0.0.1:59918 - cid:1 - Auto-unsubscribe limit of 1 reached for sid 'HC565Ll2LN31hhEK'
nats-streaming_1  | [1] 2018/11/09 14:06:06.925886 [TRC] 172.151.4.3:35908 - cid:4 - <<- [MSG _STAN.acks.5be5944ed78e5 HC565Ll2LN31hhEK 18]
nats-streaming_1  | [1] 2018/11/09 14:06:06.925895 [TRC] 172.151.4.3:35908 - cid:4 - <-> [DELSUB HC565Ll2LN31hhEK]
nats-streaming_1  | [1] 2018/11/09 14:06:06.927518 [TRC] 172.151.4.3:35908 - cid:4 - ->> [SUB _INBOX.5be5944ee250e rFxZvkqdhAqZZIgG]
nats-streaming_1  | [1] 2018/11/09 14:06:06.969480 [TRC] 172.151.4.3:35908 - cid:4 - ->> [UNSUB rFxZvkqdhAqZZIgG 1]
nats-streaming_1  | [1] 2018/11/09 14:06:06.969517 [DBG] 172.151.4.3:35908 - cid:4 - Deferring actual UNSUB(_INBOX.5be5944ee250e): 1 max, 0 received
nats-streaming_1  | [1] 2018/11/09 14:06:06.969529 [TRC] 172.151.4.3:35908 - cid:4 - ->> [PUB _STAN.close.5OrFl4PSSBuCPqmBsC1Qt9 _INBOX.5be5944ee250e 7]
nats-streaming_1  | [1] 2018/11/09 14:06:06.969538 [TRC] 172.151.4.3:35908 - cid:4 - ->> MSG_PAYLOAD: [
nats-streaming_1  | testc]
nats-streaming_1  | [1] 2018/11/09 14:06:06.969561 [TRC] 127.0.0.1:59920 - cid:2 - <<- [MSG _STAN.close.5OrFl4PSSBuCPqmBsC1Qt9 7 _INBOX.5be5944ee250e 7]
nats-streaming_1  | [1] 2018/11/09 14:06:06.969737 [TRC] 127.0.0.1:59922 - cid:3 - ->> [PING]
nats-streaming_1  | [1] 2018/11/09 14:06:06.969753 [TRC] 127.0.0.1:59922 - cid:3 - <<- [PONG]
nats-streaming_1  | [1] 2018/11/09 14:06:06.969856 [DBG] STREAM: [Client:testc] Closed (Inbox=_INBOX.5be5944eab53a)
nats-streaming_1  | [1] 2018/11/09 14:06:06.969937 [TRC] 127.0.0.1:59920 - cid:2 - ->> [PUB _INBOX.5be5944ee250e 0]
nats-streaming_1  | [1] 2018/11/09 14:06:06.969950 [TRC] 127.0.0.1:59920 - cid:2 - ->> MSG_PAYLOAD: []
nats-streaming_1  | [1] 2018/11/09 14:06:06.969976 [DBG] 127.0.0.1:59920 - cid:2 - Auto-unsubscribe limit of 1 reached for sid 'rFxZvkqdhAqZZIgG'
nats-streaming_1  | [1] 2018/11/09 14:06:06.969990 [TRC] 172.151.4.3:35908 - cid:4 - <<- [MSG _INBOX.5be5944ee250e rFxZvkqdhAqZZIgG 0]
nats-streaming_1  | [1] 2018/11/09 14:06:06.970001 [TRC] 172.151.4.3:35908 - cid:4 - <-> [DELSUB rFxZvkqdhAqZZIgG]
nats-streaming_1  | [1] 2018/11/09 14:06:06.970252 [DBG] 172.151.4.3:35908 - cid:4 - Client connection closed
nats-streaming_1  | [1] 2018/11/09 14:06:06.970419 [TRC] 172.151.4.3:35908 - cid:4 - <<- [PING]
nats-streaming_1  | [1] 2018/11/09 14:07:53.641794 [DBG] 127.0.0.1:59918 - cid:1 - Client Ping Timer
nats-streaming_1  | [1] 2018/11/09 14:07:53.641818 [DBG] 127.0.0.1:59918 - cid:1 - Delaying PING due to activity 1m47s ago
nats-streaming_1  | [1] 2018/11/09 14:07:53.642302 [TRC] 127.0.0.1:59918 - cid:1 - ->> [PING]
nats-streaming_1  | [1] 2018/11/09 14:07:53.642318 [TRC] 127.0.0.1:59918 - cid:1 - <<- [PONG]
nats-streaming_1  | [1] 2018/11/09 14:07:53.642820 [DBG] 127.0.0.1:59920 - cid:2 - Client Ping Timer
nats-streaming_1  | [1] 2018/11/09 14:07:53.642835 [DBG] 127.0.0.1:59920 - cid:2 - Delaying PING due to activity 1m47s ago
nats-streaming_1  | [1] 2018/11/09 14:07:53.643245 [TRC] 127.0.0.1:59920 - cid:2 - ->> [PING]
nats-streaming_1  | [1] 2018/11/09 14:07:53.643259 [TRC] 127.0.0.1:59920 - cid:2 - <<- [PONG]
nats-streaming_1  | [1] 2018/11/09 14:07:53.643628 [DBG] 127.0.0.1:59922 - cid:3 - Client Ping Timer
nats-streaming_1  | [1] 2018/11/09 14:07:53.643640 [DBG] 127.0.0.1:59922 - cid:3 - Delaying PING due to activity 2m0s ago
nats-streaming_1  | [1] 2018/11/09 14:07:53.644013 [TRC] 127.0.0.1:59922 - cid:3 - ->> [PING]
nats-streaming_1  | [1] 2018/11/09 14:07:53.644029 [TRC] 127.0.0.1:59922 - cid:3 - <<- [PONG]

```