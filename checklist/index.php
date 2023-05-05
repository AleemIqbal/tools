<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Website Checklist</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>
  <style>
    /* custom CSS styles */
    .option-passed {
  color: green;
}
#preferred-version-status {
  display: none;
}

.option-failed {
  color: red;
}
    .container {
      margin-top: 50px;
    }
    h1 {
      margin-bottom: 50px;
    }
    .form-checklist {
      border: 1px solid #ccc;
      padding: 20px;
      border-radius: 5px;
      margin-bottom: 50px;
    }
    .form-checklist .form-group {
      margin-bottom: 20px;
    }
    .form-checklist label {
      font-weight: bold;
    }
    .form-checklist .btn {
      margin-top: 20px;
    }
    .table-checklist {
      margin-bottom: 50px;
    }
    .table-checklist thead {
      background-color: #f1f1f1;
    }
    .table-checklist th, .table-checklist td {
      text-align: left;
    }
    .table-checklist td.status {
      font-weight: bold;
    }
    .table-checklist td.status.checked {
      color: green;
    }
    .table-checklist td.status.not-checked {
      color: red;
    }
  </style>
<body>
  <div class="container">
    <h1>Website Checklist</h1>
    <div class="form-checklist">
      <form id="checklist-form">
        <div class="form-group">
          <label for="url">Website URL:</label>
          <input type="text" class="form-control" id="url" name="url" placeholder="Enter website URL">
        </div>
        <button type="submit" class="btn btn-primary">Check</button>
      </form>
    </div>
    <table class="table table-striped table-checklist">
      <thead>
        <tr>
          <th>Checklist</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Make Sure the SSL is active on Website</td>
          <td id="ssl-status" class="status not-checked">Not Checked</td>
        </tr>
        <tr>
  <td>Make Sure Website Redirects to One Preferred Version</td>
  <td>
  <span id="preferred-version-not-checked" style="color: red;font-weight: bold;">Not Checked</span>
    <table id="preferred-version-status" class="table table-bordered">
      <thead>
        <tr>
          <th>URL</th>
          <th>Status Code</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </td>
</tr>
		<tr>
				<td>Make sure the URL structure is either trailing slash or Non Trailing Slash</td>
				<td id="url-structure-status" class="status not-checked">Not Checked</td>
			</tr>
			<tr>
  <td>Make Sure the Website is Mobile Friendly</td>
  <td id="mobile-friendly-status" class="status not-checked">Not Checked</td>
</tr>
			<tr>
				<td>Make Sure the Website Passes Web Vitals</td>
				<td id="pagespeed-status" class="status not-checked">Not Checked</td>
			</tr>
			<tr>
				<td>Make Sure to use AMP if you have informational Website or Articles</td>
				<td id="amp-status" class="status not-checked">Not Checked</td>
			</tr>
			<tr>
				<td>Make Sure to use CDN (E.G Cloudflare)</td>
				<td id="cdn-status" class="status not-checked">Not Checked</td>
			</tr>
			<tr>
				<td>Add Social Icons in Sidebar or Footer</td>
				<td id="social-icons-status" class="status not-checked">Not Checked</td>
			</tr>
			<tr>
				<td>Add Copyrights Tag in Footer</td>
				<td id="copyrights-status" class="status not-checked">Not Checked</td>
			</tr>
			<tr>
				<td>Add DMCA Tag in Footer</td>
				<td id="dmca-status" class="status not-checked">Not Checked</td>
			</tr>
			<tr>
				<td>Make Sure the Website has Favicon and Logo</td>
				<td id="favicon-status" class="status not-checked">Not Checked</td>
			</tr>
			<tr>
				<td>Make Sure the Footer is linked to About Us,Contact Us,Terms of Service,Privacy Policy,Sitemap</td>
				<td id="footer-links-status" class="status not-checked">Not Checked</td>
			</tr>
			<tr>
				<td>Make Sure to configure Silo Link Structure</td>
				<td id="silo-structure-status" class="status not-checked">Not Checked</td>
			</tr>
			<!-- Optimize Robots.txt -->
<tr>
  <td>Optimize Robots.txt</td>
  <td id="robots-status" class="status not-checked">Not Checked</td>
</tr>

<!-- Use Disqus Comment System with Conditional Load -->
<tr>
  <td>Use Disqus Comment System with Conditional Load</td>
  <td id="disqus-status" class="status not-checked">Not Checked</td>
</tr>

<!-- Make Sure your Website has a Sitemap -->
<tr>
  <td>Make Sure your Website has a Sitemap</td>
  <td id="sitemap-status" class="status not-checked">Not Checked</td>
</tr>

<!-- Make Sure the Key Pages have 1 Crawl Depth -->
<tr>
  <td>Make Sure the Key Pages have 1 Crawl Depth</td>
  <td id="crawl-depth-status" class="status not-checked">Not Checked</td>
</tr>

<!-- Make Sure Every Article has Table of Content -->
<tr>
  <td>Make Sure Every Article has Table of Content</td>
  <td id="toc-status" class="status not-checked">Not Checked</td>
</tr>

<!-- Check if the Domain Name is PMD -->
<tr>
  <td>Check if the Domain Name is PMD</td>
  <td id="pmd-status" class="status not-checked">Not Checked</td>
</tr>

<!-- Make sure your Website was updated in last 2 Weeks -->
<tr>
  <td>Make sure your Website was updated in last 2 Weeks</td>
  <td id="updated-status" class="status not-checked">Not Checked</td>
</tr>

<!-- Important Pages Checklist -->
<tr>
  <td><strong>Important Pages Checklist</strong></td>
  <td></td>
</tr>
<tr>
  <td>Privacy Policy</td>
  <td id="privacy-status" class="status not-checked">Not Checked</td>
</tr>
<tr>
  <td>Terms of Service</td>
  <td id="terms-status" class="status not-checked">Not Checked</td>
</tr>
<tr>
  <td>About Us</td>
  <td id="about-status" class="status not-checked">Not Checked</td>
</tr>
<tr>
  <td>Contact Us</td>
  <td id="contact-status" class="status not-checked">Not Checked</td>
</tr>
<tr>
  <td>Affiliate Disclosure (Only Affiliate Websites)</td>
  <td id="affiliate-status" class="status not-checked">Not Checked</td>
</tr>

<!-- Advanced SEO Checklist -->
<tr>
  <td>Advanced SEO Checklist</td>
  <td></td>
</tr>
<tr>
  <td>Internallink Important Articles from Menu (Affiliate Only)</td>
  <td id="internallink-status" class="status not-checked">Not Checked</td>
</tr>
<tr>
  <td>Configure Uncategorized Category</td>
  <td id="uncategorized-status" class="status not-checked">Not Checked</td>
</tr>
<tr>
  <td>Make Sure Every Category has 100+ Words Content</td>
  <td id="category-status" class="status not-checked">Not Checked</td>
</tr>
<tr>
  <td>Make Sure every Author has Bio</td>
  <td id="author-status" class="status not-checked">Not Checked</td>
</tr>
  <tr>
    <th>Option</th>
    <th>Status</th>
  </tr>
  <tr>
    <td>Consoles Checklist</td>
    <td></td>
  </tr>
  <tr>
    <td>Google Search Console</td>
    <td id="gsc-status" class="status not-checked">Not Checked</td>
  </tr>
  <tr>
    <td>Google Analytics</td>
    <td id="ga-status" class="status not-checked">Not Checked</td>
  </tr>
  <tr>
    <td>Bing Webmasters</td>
    <td id="bing-status" class="status not-checked">Not Checked</td>
  </tr>
  <tr>
    <td>Yandex Webmasters</td>
    <td id="yandex-status" class="status not-checked">Not Checked</td>
  </tr>
  <tr>
    <td>Sitemap Optimization Checklist</td>
    <td></td>
  </tr>
  <tr>
    <td>Make Sure Sitemap Submitted in Google Search Console</td>
    <td id="gsc-sitemap-status" class="status not-checked">Not Checked</td>
  </tr>
  <tr>
    <td>Make Sure Sitemap Submitted in Bing Webmasters</td>
    <td id="bing-sitemap-status" class="status not-checked">Not Checked</td>
  </tr>
      </tbody>
    </table>
  </div>
<script src="checklist.js"></script>
</body>
</html>