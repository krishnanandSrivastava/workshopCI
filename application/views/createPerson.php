<html>

<head>
    <title>Basic Form</title>
    <link href="<?php echo base_url("assets/css/style.css"); ?>" rel="stylesheet">
    <script src="<?php echo base_url("assets/js/formValidaiton.js"); ?>" type="text/javascript">
    </script>
    <style>
        table,
        th,
        td {
            border: 0px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
        }

        .myformLabel {
            background-color: moccasin;
        }

        .myformControlBackground {
            background-color: #ccc;
        }

        .btn {
            background-color: saddlebrown;
            color: seashell;
        }
    </style>
</head>

<body bgcolor="">
    <!-- <form action="dbLogic.php?pageno=1" method="post" enctype="multipart/form-data" id="frm" name="frm">-->
    <?php
    echo form_open_multipart(site_url("/Person/savePerson"), array("id" => "createPersonFrm", "name" => "createPersonFrm", "class" => "createPersonFrm"));
    ?>
    <?php
    if (validation_errors() != false) {
        echo validation_errors();
    }
    if ($this->session->flashdata("errorMessage"))
        echo $this->session->flashdata("errorMessage");
    ?>
    <table border="0" align="center">
        <tr>
            <td colspan="3">
                <h1 align="center">Form</h1>
            </td>
        </tr>
        <tr>
            <td class="myformLabel">First Name</td>
            <td class="myformControlBackground">
                <input type="text" name="firstName" id="firstName" placeholder="Enter First Name" value="<?php echo set_value("firstName"); ?>">
            </td>
            <td class="myformControlBackground"><?php echo form_error("firstName", "<div style='color:red;'>", "</div>"); ?></td>
        </tr>
        <tr>
            <td class="myformLabel">Last Name</td>
            <td class="myformControlBackground"><input type="text" name="lastName" id="lastName" placeholder="Enter Last Name" value="<?php echo set_value("lastName"); ?>"></td>
            <td class="myformControlBackground"><?php echo form_error("lastName", "<div style='color:red;'>", "</div>"); ?></td>
        </tr>
        <tr>
            <td class="myformLabel">Mobile</td>
            <td class="myformControlBackground"><input type="text" name="mobile" id="mobile" placeholder="Enter Mobile" value="<?php echo set_value("mobile"); ?>"></td>
            <td class="myformControlBackground"><?php echo form_error("mobile", "<div style='color:red;'>", "</div>"); ?></td>
        </tr>
        <tr>
            <td class="myformLabel">Email</td>
            <td class="myformControlBackground"><input type="text" name="email" id="email" placeholder="Enter Email" value="<?php echo set_value("email"); ?>"></td>
            <td class="myformControlBackground"><?php echo form_error("email", "<div style='color:red;'>", "</div>"); ?></td>
        </tr>
        <tr>
            <td class="myformLabel">Gender</td>
            <td class="myformControlBackground">
                <input class="gender" type="radio" name="gender" id="male" value="M" <?php echo set_radio("gender", "M"); ?>>

                <label for="male">Male</label> &nbsp;

                <input <?php echo set_radio("gender", "M") ?> class="gender" type="radio" name="gender" id="female" Value="F">

                <label for="female">Female</label>
            </td>
        </tr>
        <tr>
            <td class="myformLabel">Hobbies</td>
            <td class="myformControlBackground">
                <input type="checkbox" class="hobbies" name="hobbies[]" id="cricket" <?php //echo set_checkbox("hobbies[]", "Cricket", false); 
                                                                                        ?> value="Cricket"> <label for="cricket">Cricket</label>
                <input type="checkbox" class="hobbies" name="hobbies[]" <?php //echo set_checkbox("hobbies[]", "Chess", false); 
                                                                        ?> id="chess" Value="Chess"> <label for="chess">Chess</label>
                <input type="checkbox" class="hobbies" <?php //echo set_checkbox("hobbies[]", "Football", false); 
                                                        ?> name="hobbies[]" id="football" Value="Football"> <label for="football">Football</label>
            </td>
        </tr>
        <tr>
            <td class="myformLabel">City</td>
            <td class="myformControlBackground">
                <select name="city" id="city" onchange="changeBGColor()">
                    <option value="">Select City</option>
                    <option value="LKW">Lucknow</option>
                    <option value="VNS">Varanasi</option>
                    <option value="MGS">Mughalsarai</option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="myformLabel">Address</td>
            <td class="myformControlBackground">
                <textarea name="address" id="address" placeholder="Enter street/Lane No./Flat No./ Address" rows="5" cols="30"></textarea>
            </td>
        </tr>
        <tr>
            <td class="myformLabel">Photograph</td>
            <td class="myformControlBackground">
                <input type="file" name="photo" id="photo">
            </td>
        </tr>
        <tr>
            <td class="myformLabel">Passowrd</td>
            <td class="myformControlBackground"><input type="password" name="password" id="password" placeholder="Enter Password"></td>
            <td class="myformControlBackground"><?php echo form_error("password", "<div style='color:red;'>", "</div>"); ?></td>
        </tr>
        <tr>
            <td class="myformLabel">Confirm Passowrd</td>
            <td class="myformControlBackground"><input type="password" name="cpassword" id="cpassword" placeholder="Enter Password Again"></td>
            <td class="myformControlBackground"><?php echo form_error("cpassword", "<div style='color:red;'>", "</div>"); ?></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input class="btn" style="width: 25em;" type="submit" name="save" value="Save">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <a href="<?php echo site_url("/Person/") ?>">View List Page</a>
            </td>
        </tr>
    </table>
    </form>
</body>

</html>