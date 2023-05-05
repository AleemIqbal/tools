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
      
            // Update the preferred version status
              // Hide the "Not Checked" text and show the preferred version status table
  document.getElementById('preferred-version-not-checked').style.display = 'none';
  document.getElementById('preferred-version-status').style.display = 'table';

      const preferredVersionStatus = document.getElementById('preferred-version-status');
      const tbody = preferredVersionStatus.querySelector('tbody');
      tbody.innerHTML = '';
      response.version_status_codes.forEach(function(versionStatus) {
        const tr = document.createElement('tr');
        tr.innerHTML = `<td>${versionStatus.url}</td><td>${versionStatus.status_code}</td>`;
        tbody.appendChild(tr);
      });

      // Add an option list with "Passed" and "Failed" options for mobile-friendly status
      const mobileFriendlyStatus = document.getElementById('mobile-friendly-status');
      mobileFriendlyStatus.innerHTML = `
        <div class="form-group">
          <select id="mobile-friendly-select" class="form-control">
          <option value="passed" class="option-passed">Not Checked</option>
            <option value="passed" class="option-passed">Passed</option>
            <option value="failed" class="option-failed">Failed</option>
          </select>
        </div>
        <div class="form-group">
          <button id="mobile-friendly-test" class="btn btn-primary" onclick="window.open('https://search.google.com/test/mobile-friendly?url=${encodeURIComponent(url)}', '_blank')">Test Mobile Friendly</button>
        </div>
      `;
            // Add an option list with "Passed" and "Failed" options for PageSpeed status
      const pagespeedStatus = document.getElementById('pagespeed-status');
      pagespeedStatus.innerHTML = `
        <div class="form-group">
          <select id="pagespeed-select" class="form-control">
          <option value="passed" class="option-passed">Not Checked</option>
            <option value="passed" class="option-passed">Passed</option>
            <option value="failed" class="option-failed">Failed</option>
          </select>
        </div>
        <div class="form-group">
          <button id="pagespeed-test" class="btn btn-primary" onclick="window.open('https://pagespeed.web.dev/analysis?url=${encodeURIComponent(url)}', '_blank')">Test PageSpeed</button>
        </div>
      `;
    }
  };
  xhr.send('url=' + encodeURIComponent(url));
});