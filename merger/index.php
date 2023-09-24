<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merge Tool</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <form method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="input1" class="form-label">Input 1</label>
                        <textarea class="form-control" id="input1" name="input1" rows="6"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="input2" class="form-label">Input 2</label>
                        <textarea class="form-control" id="input2" name="input2" rows="6"></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Merge</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $input1 = $_POST["input1"];
            $input2 = $_POST["input2"];

            $input1Lines = explode("\n", $input1);
            $input2Lines = explode("\n", $input2);

            $mergedLines = [];
            for ($i = 0; $i < count($input1Lines); $i++) {
                preg_match_all('/"(.*?)"/', $input1Lines[$i], $matches);
                $example = $matches[1][0];
                $prompt = preg_replace('/"([^"]+)"/', '', $input1Lines[$i]);

                $merged = preg_replace('/(\'prompt\' => \')\',/', '$1' . addslashes($prompt) . '\',', $input2Lines[$i]);
                $merged = preg_replace('/(\'example\' => \')\',/', '$1' . addslashes($example) . '\',', $merged);
                $mergedLines[] = $merged;
            }

            echo '<div class="mt-4">';
            echo '<label for="output" class="form-label">Output</label>';
            echo '<textarea class="form-control" id="output" rows="6" readonly>';
            echo htmlspecialchars(implode("\n", $mergedLines));
            echo '</textarea>';
            echo '<button class="btn btn-primary mt-2" onclick="copyToClipboard()">Copy to Clipboard</button>';
            echo '</div>';
        }
        ?>
    </div>
    
    <script>
        function copyToClipboard() {
            const output = document.getElementById("output");
            output.select();
            document.execCommand("copy");
        }
    </script>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>