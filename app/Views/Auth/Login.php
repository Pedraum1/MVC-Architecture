<?php ?>

<h1>Login</h1>

<a href="/">Homepage</a>
<a href="/contacts">Contacts</a>
<a href="/posts">Posts</a>

<form action="http://localhost:8080/login" method="post">
    <div>
        <label for="email_input">Email</label><br>
        <input type="email" name="email_input" id="email_input">
    </div>
    <div>
        <label for="password_input">Password</label><br>
        <input type="password" name="password_input" id="password_input">
    </div>

    <input type="submit" name="submit">
</form>