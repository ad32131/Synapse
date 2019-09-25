const webpush = require('web-push');
// VAPID keys should only be generated only once.
const vapidKeys = webpush.generateVAPIDKeys();
 
webpush.setGCMAPIKey('Your FCM Clouding Messaging Server Key');
webpush.setVapidDetails(
	'mailto:your E-Mail',
	vapidKeys.publicKey,
	vapidKeys.privateKey
);
