// Import and configure the Firebase SDK
// These scripts are made available when the app is served or deployed on Firebase Hosting
// If you do not serve/host your project using Firebase Hosting see https://firebase.google.com/docs/web/setup
 importScripts('https://www.gstatic.com/firebasejs/5.8.6/firebase-app.js');
 importScripts('https://www.gstatic.com/firebasejs/5.8.6/firebase-messaging.js');








  var config = {
    apiKey: "AIzaSyAfShYk-3yTo07yJBApbV0Qy_Zf1R426co",
    authDomain: "wooriapp-be48d.firebaseapp.com",
    databaseURL: "https://wooriapp-be48d.firebaseio.com",
    projectId: "wooriapp-be48d",
    storageBucket: "wooriapp-be48d.appspot.com",
    messagingSenderId: "923945451645"
  };

  firebase.initializeApp(config);
 // [END initialize_firebase_in_sw]


// If you would like to customize notifications that are received in the
// background (Web app is closed or not in browser focus) then you should
// implement this optional method.
// [START background_handler]
/*
messaging.setBackgroundMessageHandler(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  // Customize notification here
  var notificationTitle = 'Background Message Title';
  var notificationOptions = {
    body: 'Background Message body.'
  };

  return self.registration.showNotification(notificationTitle,
    notificationOptions);
});
*/
// [END background_handler]

self.addEventListener('push', function(event) {
  console.log('[Service Worker] Push Received.');
  console.log('[Service Worker] Push had this data: "${event.data.text()}"');
  
  const dataJson = event.data.json();
  const notification = dataJson.notification; 
  const title = notification.title;
  const options = {
    body: notification.body,
    icon: '/image/icons/icon-512x512.png'
  };
const notificationPromise = self.registration.showNotification(title, options);
event.waitUntil(notificationPromise);
});

self.addEventListener('notificationclick', function(event) {
  console.log('[Service Worker] Notification click Received.');

  event.notification.close();

  event.waitUntil(
    clients.openWindow('https://wooriappworld.com/')
  );
});
