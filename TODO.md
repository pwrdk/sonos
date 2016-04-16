Drop caching by default, allow a PSR-16 cache to be injected if needed, but avoid bugs by not caching anything by default.

How is caching handled in DeviceCollection? Do we need to handle multicast address and network interface?
What about manually added devices? Should we cache those?

There's a bug in 1.* where the cache is cleared from the network, but not the speakers, so if a speakers meta data changes it isn't re-fetched

AVTransport
  ReorderTracksInQueue
  ReorderTracksInSavedQueue

Handle stereo pairs better, currently we present them as 2 separate speakers, but most of their actions are paired

Test interrupting a stream with an announcement, has it ever worked?

What's this mess in Controller.php
        if ((string) $parser->getTag("streamContent")) {
            $info = $this->getMediaInfo();
            $meta = new XmlParser($info["CurrentURIMetaData"]);
            if (!$state->stream = (string) $meta->getTag("title")) {
                $state->setStream = new Stream("", $parser->getTag("title"));
            }
        }


Immutability?
