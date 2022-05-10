<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="icon" href="favicon.ico" type="image/x-icon"/>

<title>Staff || Forgot Password || Harold</title>

<?php $this->load->view('menu/staff/style'); ?>

</head>
<body class="font-muli theme-cyan gradient">

<div class="auth option2">
    <div class="auth_left">
        <div class="card">
            <div class="card-body">
              <form action="<?php echo base_url('staff/account/forgot_password'); ?>" method="POST">
                <div class="text-center">
                    <a class="header-brand" href="<?php echo site_url('account/login'); ?>"><i class="fa fa-graduation-cap brand-logo"></i></a>
                    <div class="card-title mt-3">Forgot your account?</div>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" required placeholder="Enter email">
                </div>
                <div class="text-center">
                    <button type="submit" name="forgot" class="btn btn-primary btn-block" title="">Send</button>
                </div>
              </form>
            <span><?php echo $this->session->flashdata('msgError'); ?></span>
            </div>
        </div>
    </div>
</div>

</body>
</html>
