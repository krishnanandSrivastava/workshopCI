<html lang="en">

<head>
    <title>login</title>
</head>

<body>
    <?php
    echo form_open(site_url("/Person/validateLogin"));
    ?>
    <table>
        <tr>
            <th>Username/ Email</th>
            <td>
                <input type="text" name="username" placeholder="Enter Username/Email">
            </td>
        </tr>
        <tr>
            <th>Password</th>
            <td>
                <input type="password" name="password" placeholder="Enter Password">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Login">
            </td>
        </tr>
    </table>
    <?php
    echo form_close();
    ?>
</body>

</html>