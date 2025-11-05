// Install the service worker and log the event
self.addEventListener('install', (event) => {
  console.log('Service Worker installing.');
  // Perform install steps such as caching assets
  event.waitUntil(
    caches.open('v1').then((cache) => {
      // Add assets to cache here if needed
      // return cache.addAll(['/index.html', '/styles.css', '/script.js']);
      return Promise.resolve();
    })
  );
});

// Listen to fetch events and log them
self.addEventListener('fetch', (event) => {
  console.log('Service Worker fetching.', event.request.url);
  // You can respond with cached assets or fetch from the network
  event.respondWith(
    caches.match(event.request).then((response) => {
      // Return cached response if found, else fetch from network
      return response || fetch(event.request);
    })
  );
});

// You can add additional event listeners like 'activate', 'sync', etc.
