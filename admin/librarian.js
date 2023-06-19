function renderCurrentTime() {
  var currentTime = new Date();
  var timeString = currentTime.toLocaleTimeString();
  var dateString = currentTime.toLocaleDateString();
  document.getElementById("current-date").textContent = dateString;
  document.getElementById("current-time").textContent = timeString;
}

// Update the current time every second
setInterval(renderCurrentTime, 1000);
