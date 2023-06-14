function getParameterByName(name) {
  name = name.replace(/[\[\]]/g, "\\$&");
  var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
    results = regex.exec(window.location.href);
  if (!results) return null;
  if (!results[2]) return "";
  return decodeURIComponent(results[2].replace(/\+/g, " "));
}

// Get the clickedValue parameter from the URL
var clickedValue = getParameterByName("clickedValue");

// Set the innerHTML of an element to the clickedValue
var element = document.getElementById("history-preview");
element.innerHTML = clickedValue;