<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-12">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">กรุณาล็อคอินเข้าระบบ</h1>
                                    </div>
                                    <form role="form" action="<?= site_url('login/authen'); ?>" method="post" class="user">
                                        <div class="form-group">
                                            <input name="username" type="text" class="form-control form-control-user text-center" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input name="password" type="password" class="form-control form-control-user text-center" placeholder="Password">
                                        </div>
                                        <button class="btn btn-primary w-100 rounded" type="submit">Login</button>
                                    </form>

                                    <!-- <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo site_url('Auth/forgot_password/'); ?>">Forgot Password?</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>