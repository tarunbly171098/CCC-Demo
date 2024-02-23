<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CCC Demo</title>
</head>
<style>
    .frm-form {
        box-shadow: 0 5px 35px 0 rgba(30, 34, 40, .07);
        padding: 20px;
    }

    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<body>
    <div class="container">
        <div class="row justify-content-center ">

            <div class="col-md-8 frm-form">
                <h2 class="text-center mb-4">Demo Form</h2>
                <form action="" method="" id="requestSend">
                    <div class="row">
                        <div class="form-group col-lg-6 mb-4">
                            <label for="name" class="form-label">Names *</label>
                            <input class="form-control " type="text" id="name" name="name" placeholder="Enter your name *">
                            <span id="userName"></span>
                        </div>
                        <div class="form-group col-lg-6 mb-4">
                            <label for="mobile" class="form-label">Mobile *</label>
                            <input class="form-control " type="text" id="mobile" name="mobile" placeholder="Enter mobile number *" maxlength="10">
                            <span id="mobileNo"></span>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="email" class="form-label">Email *</label>
                        <input class="form-control " type="email" id="email" name="email" placeholder="Enter email address *">
                        <span id="emailAddress"></span>
                    </div>
                    <!-- <button class="subscribe" type="submit" id="SendMail" readonly>Send</button> -->
                    <input class="btn btn-primary mb-3" type="submit" id="SendMail" value="Send"></input>
                </form>

                <table id="myTable" style="width: 100%;">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                    
                </table>
            </div>

        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Modal form send request
            $("#requestSend").submit(function(e) {
                e.preventDefault();
                let name = $("#name").val();
                let mobile = $("#mobile").val();
                let email = $("#email").val();
                if (name && mobile && email != null) {
                    // $("#SendMail"). attr("disabled", "disabled");
                    $("#SendMail").prop('disabled', true);
                    $("#SendMail").html("Please wait...");
                    $.ajax({
                        url: "api-key",
                        method: "POST",
                        data: {
                            name: name,
                            mobile: mobile,
                            email: email,
                        },
                        success: function(data) {
                            alert("Data sent successfully");

                        }
                    });
                } else {
                    $('#userName').html('*Please fill the name!').css('color', 'red').css('font-size', '12px');
                    $('#mobileNo').html('*Please fill the mobile!').css('color', 'red').css('font-size', '12px');
                    $('#emailAddress').html('*Please fill the email!').css('color', 'red').css('font-size', '12px');
                }
            });

            $.ajax({
                url: 'http://localhost:3413/api/person',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#myTable').append('<tr><td>' + data.name + '</td><td>' + data.email + '</td><td>' + data.phone + '</td></tr>');
                }
            });
        });
    </script>
</body>

</html>