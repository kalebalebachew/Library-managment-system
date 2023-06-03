
   function checkUsername() {
            var username = document.getElementById("username").value;
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = xhr.responseText;
                    var usernameError = document.getElementById("username-error");
                    var registerButton = document.getElementById("register-btn");
                    
                    if (response === "exists") {
                        usernameError.textContent = "Username already exists!";
                        registerButton.disabled = true;
                    } else {
                        usernameError.textContent = "";
                        registerButton.disabled = false;
                    }
                }
            };
            xhr.open("POST", "check_username.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("username=" + encodeURIComponent(username));
        }
    