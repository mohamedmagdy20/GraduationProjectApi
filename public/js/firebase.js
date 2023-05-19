var firebaseConfig = {
    apiKey: "AIzaSyAGRuRCdS_pk7X6T_D7h07rjiUM2nW7x1Q",
    authDomain: "graduation-project-67da3.firebaseapp.com",
    projectId: "graduation-project-67da3",
    storageBucket: "graduation-project-67da3.appspot.com",
    messagingSenderId: "535819153051",
    appId: "1:535819153051:web:d0c3616ea55f7a21df203e",
    measurementId: "G-GGND858ZQQ"

};

firebase.initializeApp(firebaseConfig);


// function registerNotificationToken() {
//     // Request permission to display notifications
//     firebase.messaging().requestPermission().then(function() {
//       // Retrieve the notification token
//       firebase.messaging().getToken().then(function(token) {
        
//       }).catch(function(error) {
//         console.error('Failed to retrieve notification token:', error);
//       });
//     }).catch(function(error) {
//       console.error('Failed to grant notification permission:', error);
//     });
//   }
  
//   // Call the function to register the notification token when needed
//   registerNotificationToken();
