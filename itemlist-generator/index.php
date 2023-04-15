<!DOCTYPE html>
<html>
<head>
    <title>Item List Schema Generator</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
        }
        h1, h2, h3, h4, h5, h6 {
            font-weight: 700;
        }
        .btn-new {
            margin-right: 10px;
        }
        .btn-block {
            display: block;
            width: 100%;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        label {
            font-weight: 700;
        }
        pre {
            max-height: 500px;
            overflow-y: auto;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
            <h1 class="text-center mb-5">Item List Schema Generator</h1>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <?php
        $productList = preg_split('/\r\n|\r|\n/', $_POST['products']);
        $url = $_POST['list_url'];
        $doc = new DOMDocument();
        @$doc->loadHTMLFile($url);
        $h1 = $doc->getElementsByTagName('h1')[0]->nodeValue;

        $itemListElement = array();
        $position = 1;

        foreach ($productList as $key => $product) {
        $product = preg_replace('/^[0-9]+\.\s/', '', $product);  // Remove numbering and period from start of line
            $name = $product;
            $product = preg_replace('/[^a-zA-Z0-9\s]/', '', $product);
            $product = preg_replace('/\s+/', '-', strtolower($product));
            $url = $url;
            $item = array(
                '@id' => "#" . $product,
                '@type' => 'ListItem',
                'name' => $name,
                'position' => $position,
                'url' => $url . "#" . $product
            );
            $itemListElement[] = $item;
            $position++;
        }

        $json_ld = array(
            '@context' => 'http://schema.org',
            '@type' => 'ItemList',
            'itemListElement' => $itemListElement,
            'name' => $h1,
            'url' => $url
        );
    ?>

    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="#schema">
                <div class="form-group">
                    <label for="list_url">URL:</label>
                    <input type="url" class="form-control" name="list_url" id="list_url" required>
                </div>

                <h2>Products:</h2>
                <div class="form-group">
                    <textarea name="products" class="form-control" id="products" rows="5" required></textarea>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary d-block mx-auto" value="Generate Schema">
                </div>
            </form>
        </div>
    </div>

    <div id="schema">
        <div class="card">
            <div class="card-header text-center">
                <h2>Generated Schema:</h2>
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-primary btn-block" onclick="newschema();">New</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-success btn-block" onclick="copySchema();">Copy Schema</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <pre><?php echo json_encode($json_ld, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES); ?></pre>
            </div>
        </div>
    </div>

        <?php else: ?>

            <div class="row">
                <div class="col-md-12">
                    <form method="POST"action="#schema">
                        <div class="form-group">
                            <label for="list_url">URL:</label>
                            <input type="url" class="form-control" name="list_url" id="list_url" required>
                        </div>

                        <h2>Products:</h2>
                        <div class="form-group">
                            <textarea name="products" class="form-control" id="products" rows="5" required></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary d-block mx-auto" value="Generate Schema">
                        </div>
                    </form>
                </div>
            </div>

        <?php endif; ?>
	<script>
		document.querySelector('#products').addEventListener('change', function() {
			const products = this.value.split('\n');
			const newProducts = [];

			products.forEach(function(product) {
				if (product.trim()) {
					newProducts.push(product.trim());
				}
			});

			this.value = newProducts.join('\n');
		});
function copySchema() {
  // Get the pre element
  var preElement = document.querySelector('pre');

  // Create a range object for selecting the pre element's contents
  var range = document.createRange();
  range.selectNodeContents(preElement);

  // Create a selection object and add the range to it
  var selection = window.getSelection();
  selection.removeAllRanges();
  selection.addRange(range);

  // Copy the selected text to the clipboard
  document.execCommand('copy');

  // Deselect the text
  selection.removeAllRanges();
}
function newschema() {
	location.reload();
	  document.querySelector('form').reset(); // Clear the form
}
window.onload = function() {
        if(window.location.hash) {
            var target = document.querySelector(window.location.hash);
            if(target) {
                window.scrollTo({
                    top: target.offsetTop,
                    behavior: "smooth"
                });
            }
        }
    }

</script>

</body>
</html>