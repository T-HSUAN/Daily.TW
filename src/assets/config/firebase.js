//firebase的專案設定的code
// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
// import { getAnalytics } from "firebase/analytics";
import { getAuth } from "firebase/auth";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyBU-PAbjov9dZ72NeSELKAcArTFgaWdz8g",
  authDomain: "test-5ce6a.firebaseapp.com",
  projectId: "test-5ce6a",
  storageBucket: "test-5ce6a.appspot.com",
  messagingSenderId: "469336453357",
  appId: "1:469336453357:web:b0244c36fe85eb1c8e5ce4",
  measurementId: "G-EKME76L4QB"
};

 // Initialize Firebase
 const firebaseApp = initializeApp(firebaseConfig);
 // const analytics = getAnalytics(firebaseApp);
 export const firebaseAuth = getAuth(firebaseApp);
 export default firebaseApp