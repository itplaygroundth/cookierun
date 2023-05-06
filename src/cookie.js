
// A $( document ).ready() block.
$( document ).ready(function() {
    // const cookieConsentBtn = document.getElementById('cookie-consent-btn');
    // const cookieBanner = document.getElementById('cookie-banner');
    // const cookieAcceptBtn = document.getElementById('cookie-accept');
    // const cookieDeclineBtn = document.getElementById('cookie-decline');
    
    // cookieConsentBtn.addEventListener('click', function() {
    //   cookieBanner.classList.remove('d-none');
    // });
    
    // cookieAcceptBtn.addEventListener('click', function() {
    //   // Set cookie or perform other actions when user accepts cookies
    //   cookieBanner.classList.add('d-none');
    // });
    
    // cookieDeclineBtn.addEventListener('click', function() {
    //   // Perform actions when user declines cookies, such as disabling cookies or redirecting to a cookie-free version of the site
    //   cookieBanner.classList.add('d-none');
    // });
    
// Check if the user has already given cookie consent

// Check if the user has already given cookie consent
var cookieConsent = getCookie("cookie_consent");
if (checkCookie("cookie_consent")) {
    // The cookie exists
    document.getElementById("cookie-banner").style.display = "none";
  } else {
    // The cookie doesn't exist
    document.getElementById("cookie-banner").style.display = "block";
  }
// if (cookieConsent === "") {
//   // Show the cookie banner if the user has not given consent
//   document.getElementById("cookie-banner").style.display = "block";
// } else {
//   // Hide the cookie banner if the user has already given consent
//   document.getElementById("cookie-banner").style.display = "none";
// }

// // Add event listener for the "Accept" button
// document.getElementById("cookie-accept").addEventListener("click", function() {
//   // Get the selected cookies
//   var cookies = document.querySelectorAll("input[name='cookie']:checked");
//   var cookieValues = [];

//   // Add the values of the selected cookies to an array
//   for (var i = 0; i < cookies.length; i++) {
//     cookieValues.push(cookies[i].value);
//   }

//   // Set the cookie consent to the selected values and hide the cookie banner
//   setCookie("cookie_consent", JSON.stringify(cookieValues), 365);
//   document.getElementById("cookie-banner").style.display = "none";
// });

// Add event listener for the "Decline" button
document.getElementById("cookie-decline").addEventListener("click", function() {
  // Set the cookie consent to an empty array and hide the cookie banner
  setCookie("cookie_consent", "[]", 365);
  document.getElementById("cookie-banner").style.display = "none";
});

// // Add event listener for the "Accept" button in the cookie policy dialog
// document.getElementById("cookie-policy-accept").addEventListener("click", function() {
//   // Get the selected cookies
//   var cookies = document.querySelectorAll("input[name='cookie']:checked");
//   var cookieValues = [];

//   // Add the values of the selected cookies to an array
//   for (var i = 0; i < cookies.length; i++) {
//     cookieValues.push(cookies[i].value);
//   }

//   // Set the cookie consent to the selected values and hide the cookie policy dialog
//   setCookie("cookie_consent", JSON.stringify(cookieValues), 365);
//   $('#cookie-policy-dialog').modal('hide');
// });
// Function to check cookie
function checkCookie(name) {
    var cookies = document.cookie.split(";"); // Split the cookie string into an array of individual cookies
    for (var i = 0; i < cookies.length; i++) {
      var cookie = cookies[i].trim(); // Remove any leading or trailing spaces
      if (cookie.indexOf(name + "=") === 0) { // Check if the cookie starts with the given name
        return true; // Return true if the cookie exists
      }
    }
    return false; // Return false if the cookie doesn't exist
  }


// Function to set a cookie
function setCookie(name, value, days) {
  var expires = "";
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toUTCString();
  }
  document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

// Function to get the value of a cookie
function getCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
  }
  return "";
}

// Add event listener for the "Accept" button
document.getElementById("cookie-accept").addEventListener("click", function() {
    // Get the selected cookies
    var cookieA = document.getElementById("necessary").checked;
    var cookieB = document.getElementById("function").checked;
    var cookieC = document.getElementById("marketing").checked;
   // var cookieD = document.getElementById("cookie-D").checked;
    var cookieValues = [];
  
    // Add the values of the selected cookies to an array
    if (cookieA) {
      cookieValues.push("necessary");
    }
    if (cookieB) {
      cookieValues.push("function");
    }
    if (cookieC) {
      cookieValues.push("marketing");
    }
    // if (cookieD) {
    //   cookieValues.push("D");
    // }
  
    // Set the cookie consent to the selected values and hide the cookie banner
    setCookie("cookie_consent", JSON.stringify(cookieValues), 365);
    document.getElementById("cookie-banner").style.display = "none";
  });
  
  // Add event listener for the "Accept" button in the cookie policy dialog
  document.getElementById("cookie-policy-accept").addEventListener("click", function() {
    // Get the selected cookies
    var cookieA = document.getElementById("necessary").checked;
    var cookieB = document.getElementById("function").checked;
    var cookieC = document.getElementById("marketing").checked;
    //var cookieD = document.getElementById("cookie-D").checked;
    var cookieValues = [];
     
    // Add the values of the selected cookies to an array
    if (cookieA) {
      cookieValues.push("necessary");
    }
    if (cookieB) {
      cookieValues.push("function");
    }
    if (cookieC) {
      cookieValues.push("marketing");
    }
    // if (cookieD) {
    //   cookieValues.push("D");
    // }
  
    // Set the cookie consent to the selected values and hide the cookie policy dialog
    setCookie("cookie_consent", JSON.stringify(cookieValues), 365);
    $('#cookie-policy-dialog').modal('hide');
  });
  


});