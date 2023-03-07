<?php
if (isset($_POST['submit'])) {
    $length = $_POST['length'];
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+{}[]|:;"<>,.?/~`';
    $password = substr(str_shuffle($characters), 0, $length);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Password Generator</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-BFbxczhLg9rGdWtM5ue5l4/4f/E4gVpGh/1xvV1e/+SItIQXNc3oq81LQV7Cn6A2MQVzWIlbTfTm7xpG6+9Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Password Generator</h1>

    <form method="post" action="">
        <label for="length">Password Length:</label>
        <input type="text" name="length" id="length" placeholder="Enter password length" required>
        <span id="length-error" class="error-message">Length must be between 8 and 50.</span>

        <input type="submit" name="submit" value="Generate Password">
    </form>

    <?php if(isset($password)) { ?>
    <div class="password">
        <h2>Your Password:</h2>
        <p><?php echo $password; ?></p>
        <button class="copy-button" onclick="copyPassword()"><i class="far fa-copy"></i>Copy Password</button>
    </div>
    <?php } ?>

    <script>
        function copyPassword() {
            var password = document.querySelector('.password p');
            var range = document.createRange();
            range.selectNode(password);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
            document.execCommand('copy');
            alert('Password copied to clipboard');
        }

        var lengthInput = document.getElementById("length");
        var lengthError = document.getElementById("length-error");
        lengthInput.addEventListener("input", function() {
            if (lengthInput.value < 8 || lengthInput.value > 50) {
                lengthError.classList.add("show");
                lengthInput.setCustomValidity("Length must be between 8 and 50.");
            } else {
                lengthError.classList.remove("show");
                lengthInput.setCustomValidity("");
            }
        });
    </script>
</body>

</html>
