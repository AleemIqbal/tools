document.getElementById('checklist-form').addEventListener('submit', function(event) {
  event.preventDefault();
  const url = document.getElementById('url').value;

  // Send an AJAX request to checklist.php
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'checklist.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      const response = JSON.parse(xhr.responseText);

          // Update the SSL status
          const sslStatus = document.getElementById('ssl-status');
          sslStatus.innerHTML = response.ssl_status.text;
          sslStatus.className = 'status ' + response.ssl_status.class;

      // Update the Google Analytics status
      const gaStatus = document.getElementById('ga-status');
      gaStatus.innerHTML = response.ga_status.text;
      gaStatus.className = 'status ' + response.ga_status.class;

      // Update other statuses here
      // ...
    }
  };
  xhr.send('url=' + encodeURIComponent(url));
});