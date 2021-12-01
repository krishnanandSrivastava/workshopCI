<?php   var_dump($this->session->userdata("person"));?>


<html lang="en">

<head>
    <title>List Page</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
        }

        tr:hover {
            background-color: lightgray;
        }

        td:hover {
            background-color: white;
        }
    </style>
</head>

<body>
    <a href="<?php echo site_url("/Person/logout");?>">Logout</a>
    <table border="1" align="center">
        <h3 align="center">Person List</h3>
        <thead>
            <tr>
                <td colspan="10" style="text-align:center"><a href="<?php echo site_url("/Person/createPerson/ ") ?>">Add More Data</a></td>
            </tr>
            <tr>
                <td>Sno.</td>
                <td>Name</td>
                <td>Mobile</td>
                <td>Email</td>
                <td>Gender</td>
                <td>City</td>
                <td>Address</td>
                <td>hobbies</td>
                <td>Photo</td>
                <td>Action</td>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td>Sno.</td>
                <td>Name</td>
                <td>Mobile</td>
                <td>Email</td>
                <td>Gender</td>
                <td>City</td>
                <td>Address</td>
                <td>hobbies</td>
                <td>Photo</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
                <?php
                if (sizeof($personData)) {
                    for ($i = 0; $i < sizeof($personData); $i++) {
                        $row = $personData[$i]; //0
                ?>
                        <tr>
                            <td><?php echo $i + 1; ?></td>
                            <td><?php echo $row->firstName . " " . $row->lastName; ?></td>
                            <td><?php echo $row->mobile; ?></td>
                            <td><?php echo $row->email; ?></td>
                            <td><?php echo ($row->gender == "M") ? "Male" : "Female"; ?></td>
                            <td><?php echo $row->city; ?></td>
                            <td><?php echo $row->address; ?></td>
                            <td><?php echo $row->hobbies; ?></td>
                            <td>
                                <img width="50" src="<?php echo base_url($row->photo); ?>">
                            </td>
                            <td>
                                <a onclick="return confirm('Are you sure want to delete?')" href="<?php echo site_url("/Person/deletePerson/") . $row->id; ?>">Del</a>
                                | 
                                
                                <a onclick="return confirm('Are you sure want to edit this record?')" href="<?php echo site_url("/Person/editPerson/") . $row->id; ?>">Edit</a>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="10" style="color:red; text-align:center;">No Records Found</td>
                    </tr>
                <?php
                }
                ?>

                <?php
                if ($this->session->flashdata("successMessage")) {
                ?>
                    <tr>
                        <td colspan="10" style="color:green">
                            <?php echo $this->session->flashdata("successMessage"); ?>
                        </td>
                    </tr>
                <?php
                }
                if ($this->session->flashdata("errorMessage")) {
                    ?>
                        <tr>
                            <td colspan="10" style="color:red">
                                <?php echo $this->session->flashdata("errorMessage"); ?>
                            </td>
                        </tr>
                    <?php
                    }
                ?>

            </tbody>
    </table>
</body>

</html>