<html>

<head>
    <title>Basic Form</title>
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>assets/js/formValidaiton.js" type="text/javascript">
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
    <?php 
        echo form_open(site_url("Person/savePerson"),["id"=>"createPersonfrm","class"=>"personfrm","enctype"=>"multipart/form-data"]);
    ?>
    <!-- <form action="PersonManagement.php?pageno=1" method="post" enctype="multipart/form-data" id="frm" name="frm"> -->
     <?php
     if(validation_errors()!=false){
         echo validation_errors();
     }
     ?>  
    <table border="0" align="center">
            <tr>
                <td colspan="2">
                    <h1 align="center">Form</h1>
                </td>
            </tr>
            <tr>
                <td class="myformLabel">First Name</td>
                <td class="myformControlBackground"><input type="text" name="firstName" id="firstName"
                        placeholder="Enter First Name" value="<?php echo set_value('firstName') ?>"></td>
            </tr>
            <tr>
                <td class="myformLabel">Last Name</td>
                <td class="myformControlBackground"><input type="text" name="lastName" value="<?php echo set_value('lastName') ?>" id="lastName"
                        placeholder="Enter Last Name"></td>
            </tr>
            <tr>
                <td class="myformLabel">Mobile</td>
                <td class="myformControlBackground"><input type="text" value="<?php echo set_value('mobile') ?>" name="mobile" id="mobile"
                        placeholder="Enter Mobile"></td>
            </tr>
            <tr>
                <td class="myformLabel">Email</td>
                <td class="myformControlBackground"><input type="text" name="email" id="email"
                        placeholder="Enter Email" value="<?php echo set_value('email') ?>"></td>
            </tr>
            <tr>
                <td class="myformLabel">Gender</td>
                <td class="myformControlBackground">
                    <input class="gender" type="radio" name="gender" id="male"
                        value="M"<?php echo set_radio("gender","M") ?>> <label for="male">Male</label> &nbsp; 
                        <input class="gender" type="radio"
                        name="gender" id="female" Value="F"<?php echo set_radio("gender","F") ?>> <label for="female">Female</label></td>
            </tr>
            <tr>
                <td class="myformLabel">Hobbies</td>
                <td class="myformControlBackground">
                    <input type="checkbox" class="hobbies"<?php echo set_checkbox("hobbies","Cricket",false) ?> name="hobbies" id="cricket" value="Cricket"> <label
                        for="cricket">Cricket</label>
                    <input type="checkbox" class="hobbies" name="hobbies"<?php echo set_checkbox("hobbies","Chess",false) ?> id="chess" Value="Chess"> <label
                        for="chess">Chess</label>
                    <input type="checkbox" class="hobbies"<?php echo set_checkbox("hobbies","Football",false) ?> name="hobbies" id="football" Value="Football"> <label
                        for="football">Football</label>
                </td>
            </tr>
            <tr>
                <td class="myformLabel">City</td>
                <td class="myformControlBackground">
                    <select name="city" id="city" onchange="changeBGColor()" value="<?php echo set_value('city') ?>">
                        <option value="">Select City</option>
                        <option value="LKW"<?php echo set_select("city","LKW") ?>>Lucknow</option>
                        <option value="VNS"<?php echo set_select("city","VNS") ?>>Varanasi</option>
                        <option value="MGS"<?php echo set_select("city","MGS") ?>>Mughalsarai</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="myformLabel">Address</td>
                <td class="myformControlBackground">
                    <textarea name="address" id="address" placeholder="Enter street/Lane No./Flat No./ Address" rows="5"
                        cols="30" value="<?php echo set_value('address') ?>"></textarea>
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
                <td class="myformControlBackground"><input type="password" name="password" id="password"
                        placeholder="Enter Password"></td>
            </tr>
            <tr>
                <td class="myformLabel">Confirm Passowrd</td>
                <td class="myformControlBackground"><input type="password" name="cpassword" id="cpassword"
                        placeholder="Enter Password Again"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input class="btn" style="width: 25em;" type="submit" name="save" value="Save">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <a href="<?php echo site_url("/Person/viewPerson/") ?>">View List Page</a>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>