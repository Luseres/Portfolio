const version = "1";
const cacheName = `joshuaCache-v${version}`;
self.addEventListener('install', e => {
  e.waitUntil(
    caches.open(cacheName).then(cache => {
      return cache.addAll([
        `/`,
        `/index.php`,
        `/public/img/project.jpg`,
        `/public/img/skills/hardware.png`,
        `/public/img/skills/seo.png`,
        `/public/img/skills/security.png`,
        `/public/img/skills/backend.png`,
        `/public/img/check.svg`,
        `/public/img/skills/frontend.png`,
        `/public/img/joshuavdpoll.jpg`,
        `/public/img/cross.svg`,
        `/public/img/hamburger.svg`,
        `/public/img/logo.svg`,
        `/public/img/logo.ico`,
        `/public/css/home.css`,
        `/public/css/main.css`,
        `/public/css/reset.css`,
        `/sw.js`
      ])
          .then(() => self.skipWaiting());
    })
  );
});

self.addEventListener('activate', event => {
  event.waitUntil(self.clients.claim());
});

self.addEventListener('fetch', event => {
  event.respondWith(
    caches.open(cacheName)
      .then(cache => cache.match(event.request, {ignoreSearch: true}))
      .then(response => {
      return response || fetch(event.request);
    })
  );
});