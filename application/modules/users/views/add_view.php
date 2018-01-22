<div class="wrapper wrapper-content">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Add New User</h5>
                    </div>
                    <div class="ibox-content">
                        <div id="ErrorDiv"></div>
                        <form class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">First Name:</label>
                                    <div class="col-sm-10"><input type="text" name="fName" id="fName" class="form-control" required></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Middle Name:</label>
                                    <div class="col-sm-10"><input type="text" name="mName" id="mName" class="form-control" required></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Last Name:</label>
                                    <div class="col-sm-10"><input type="text" name="lName" id="lName" class="form-control" required></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Email:</label>
                                    <div class="col-sm-10"><input type="email" name="email" id="email" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit" name="submit" id="submit">Save Conti-Partner</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("#submit").click(function(e){
        e.preventDefault();

        fName = $.trim($("#fName").val());
        mName = $.trim($("#mName").val());
        lName = $.trim($("#lName").val());
        email = $.trim($("#email").val());

        if (fName == null || mName == null || lName == null || email == null) {
            $("#ErrorDiv").attr("class", "alert alert-danger");
            $("#ErrorDiv").html("Please fill in all the fields below!");
            setTimeout(function(){
                $("#ErrorDiv").removeAttr("class");
                $("#ErrorDiv").html(""); 
            },3000);
        } else {
            registrationData = {
                "fName"   : fName,
                "mName"   : mName,
                "lName"   : lName,
                "email"   : email
            };
            // console.log(registrationData);
            $.post("<?= @base_url();?>users/register",registrationData,function(data){
                obj = JSON.parse(data);
                console.log(data);
                if (obj['status'] == 0) {
                    $("#ErrorDiv").attr("class", "alert alert-success");
                    $("#ErrorDiv").html(obj['message']);
                    setTimeout(function(){
                        $("#ErrorDiv").removeAttr("class");
                        $("#ErrorDiv").html(""); 
                        window.location.replace("<?= @base_url();?>users");
                    },3000);
                } else if (obj['status'] == 1) {
                    $("#ErrorDiv").attr("class", "alert alert-danger");
                    $("#ErrorDiv").html(obj['message']);
                    setTimeout(function(){
                        $("#ErrorDiv").removeAttr("class");
                        $("#ErrorDiv").html("");
                    },3000);
                } else {
                    $("#ErrorDiv").attr("class", "alert alert-warning");
                    $("#ErrorDiv").html(obj['message']);
                    setTimeout(function(){
                        $("#ErrorDiv").removeAttr("class");
                        $("#ErrorDiv").html("");
                    },3000);
                }
            });
        }
    });
});
    
</script>