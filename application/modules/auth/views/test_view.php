<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>
    <p id="removeNotify">Hide help.</p>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <center>
                    <h1 style="background-color:#f7941d;color:#fff; width:5em; border-radius:3em; padding:2em 2em 2em .5em;">Welcome</h1>
                </center>
                <div class="alert alert-danger" role="alert" id="loginerrorBox" style="display:none;">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    <p></p>
                </div>
                <div class="alert alert-success" role="alert" id="loginSuccessBox" style="display:none;">
                    <span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span>
                    <span class="sr-only">Success:</span>
                    <p></p>
                </div>
                <div id="login-form" style="display: block;">
                    <div id="partLogin1">
                        <div id="part1LoginErr"></div>
                        <form id="loginForm" style="color:#fff;padding:0px 1em 0 1em; ">
                            <h2>Login</h2>
                            <div>
                                <input type="email" class="form-control" placeholder="Email" required="true" id="email" name="email" />
                            </div>
                            <div>
                                <input type="password" class="form-control" placeholder="Password" required="true" id="password" name="password" />
                            </div>
                            <div>
                                <input  type="button" name="login-submit" id="part1LoginBtn" value="Login" style="background-color:#f7941d; width:5em; border-radius:1em; padding:.1em .1em .1em .1em;">
                            </div>
                        </form>
                    </div>
                    <div id="partLogin2">
                        <div id="part2LoginErr"></div>
                        <form id="loginForm" style="color:#fff;padding:0px 1em 0 1em; ">
                            <h2>First Time Login</h2>
                            <input type="hidden" name="No" id="No">
                            <input type="hidden" name="type" id="type">
                            <div>
                                <input type="email" class="form-control" placeholder="Email" required="true" id="email2" name="email2" />
                            </div>
                            <div>
                                <input type="text" class="form-control" placeholder="Reset Code" required="true" id="code" name="code" />
                            </div>
                            <div>
                                <input  type="button" name="login-submit" id="part2LoginBtn" value="Verify Account" style="background-color:#f7941d; width:5em; border-radius:1em; padding:.1em .1em .1em .1em;">
                            </div>
                        </form>
                    </div>
                    <div id="partLogin3">
                        <div id="part3LoginErr"></div>
                        <form id="loginForm" style="color:#fff;padding:0px 1em 0 1em; ">
                            <h2>Forgot Password</h2>
                            <div>
                                <input type="email" class="form-control" placeholder="Email" required="true" id="forgot-email" name="forgot-email" />
                            </div>
                            <div>
                                <input type="text" class="form-control" placeholder="No." required="true" id="forgot-number" name="forgot-number" />
                            </div>
                            <div>
                                <input  type="button" name="submit" id="forgotBtn" value="Reset" style="background-color:#f7941d; width:5em; border-radius:1em; padding:.1em .1em .1em .1em;">
                            </div>
                        </form>
                    </div>
                    <div id="partLogin4">
                        <div id="part4LoginErr"></div>
                        <form id="loginForm" style="color:#fff;padding:0px 1em 0 1em; ">
                            <h2>Reset password</h2>
                            <div>
                                <input type="text" class="form-control" placeholder="Reset Code" required="true" id="reset-code" name="reset-code" />
                            </div>
                            <div>
                                <input type="password" class="form-control" placeholder="New Password" required="true" id="reset-password" name="reset-password" />
                            </div>
                            <div>
                                <input type="password" class="form-control" placeholder="Confirm Password" required="true" id="reset-confirm" name="reset-confirm" />
                            </div>
                            <div>
                                <input  type="button" name="submit" id="resetBtn" value="Reset" style="background-color:#f7941d; width:5em; border-radius:1em; padding:.1em .1em .1em .1em;">
                            </div>
                        </form>
                    </div>
                    <div>
                        <p class="change_link">
                            <a href="#" class="to_register" id="register-form-link" style="color:#fff;"> Create Account </a>
                        </p>
                    </div>
                </div>
                <div id="register-form" style="display: none;">
                    <div id="part-1">
                        <form id="loginForm" style="color:#fff;padding:0px 1em 0 1em; ">
                            <h2>Create Account</h2>
                            <div>
                                <input type="text" class="form-control" placeholder="No." required="" id="RegNo" name="RegNo" />
                            </div>
                            <div>
                                <select name="Rtype" id="Rtype" class="form-control" style=" border-radius:1em; padding:.1em .1em .1em .1em;margin-bottom: 1em;">
                                    <option selected="true" disabled="true" value="0" required>Select a Role</option>
                                    <option value="1">Employee</option>
                                    <option value="2">Customer</option>
                                </select>
                            </div>
                            <div>
                                <input  type="button" name="submit" id="part1Btn" value="Next" style="background-color:#f7941d; width:5em; border-radius:1em; padding:.1em .1em .1em .1em;">
                            </div>
                        </form>
                    </div>
                    <div id="part-2">
                        <div id="part2Err"></div>
                        <form role="form" style="color:#fff;padding:0px 1em 0 1em; ">
                            <h2>Create Account</h2>
                            <input type="hidden" name="RegistrationNo" id="RegistrationNo">
                            <input type="hidden" name="roletype" id="roletype">
                            <input type="hidden" name="fName" id="fName">
                            <input type="hidden" name="lName" id="lName">
                            <input type="hidden" name="mName" id="mName">
                            <div>
                                <input type="email" class="form-control" placeholder="Email" required="" id="email1" name="email1" />
                            </div>
                            <div>
                                <input type="password" class="form-control" placeholder="Email" required="" id="password1" name="password1" />
                            </div>
                            <div>
                                <input type="password" class="form-control" placeholder="Confirm Password" required="" id="confirm_password" name="confirm_password" />
                            </div>
                            <div>
                                <input  type="button" name="submit" id="part2Btn" value="Create" style="background-color:#f7941d; width:5em; border-radius:1em; padding:.1em .1em .1em .1em;">
                            </div>
                        </form>
                    </div>
                    <div id="part-3">
                        <div id="part3Err"></div>
                        <form role="form" style="color:#fff;padding:0px 1em 0 1em; ">
                            <h2>Confirm Account</h2>
                            <input type="hidden" name="NoConf" id="NoConf">
                            <input type="hidden" name="typeR" id="typeR">
                            <div>
                                <input type="email" class="form-control" placeholder="Email" required="" id="email2Conf" name="email2Conf" />
                            </div>
                            <div>
                                <input type="text" class="form-control" placeholder="Reset Code" required="" id="codeConf" name="codeConf" />
                            </div>
                            <div>
                                <input  type="button" name="submit" id="part3Btn" value="Register" style="background-color:#f7941d; width:5em; border-radius:1em; padding:.1em .1em .1em .1em;">
                            </div>
                        </form>
                    </div>

                    <div>
                        <p class="change_link">
                            <a href="#" class="to_register" id="login-form-link" style="color:#fff;"> Login </a>
                        </p>
                    </div>
                </div>
                
                <div class="clearfix"></div>

                <div class="separator">
                    <a href="#" id="forgot" style="color:#fff;">Forgot your password?</a>
                </div>
                <div class="clearfix"></div>
                <br />
                <div>
                    <!-- <img src="<?php //echo base_url('assets/images/clientSpecific/logo.png'); ?>" >  -->
                    <p>Powered By DataposIT ©<?php echo date('Y'); ?></p>
                </div>
            <div style="background-color:#f7941d; height:5px; width:100%;"></div>         
            </section>
        </div>
    </div>

    <center>
    <img src="<?php echo base_url('assets/template/images/clientSpecific/Dataposit 2016 logo white.png') ?>" style="height:10%; width:10%;">
    </center>
</div>
<?= $this->load->view('auth/auth_view_footer'); ?>