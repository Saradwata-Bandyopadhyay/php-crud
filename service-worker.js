importScripts('https://storage.googleapis.com/workbox-cdn/releases/6.1.5/workbox-sw.js');
workbox.routing.registerRoute(
  ({url}) => url.origin,
  new workbox.strategies.NetworkFirst()
);
