<!-- crypt — One-way string hashing 
password_verify() is compatible with crypt().
Make sure to specify a strong enough salt for better security.
password_hash() uses a strong hash, generates a strong salt, and applies proper rounds automatically.
When validating passwords, a string comparison function that isn't vulnerable 
to timing attacks should be used to compare the output of crypt() to the previously known hash.
PHP provides hash_equals() for this purpose.
-->

<?php
$password = "hello123";
$hashPassword = crypt($password, "10");
echo $hashPassword;
echo "<br>";

$newHash = password_hash($password, PASSWORD_DEFAULT);
echo $newHash;
echo "<br>";

if (password_verify($password, $newHash . "255")) {
    echo "Password verified";
} else{
    echo "Password not verified";
}
?>