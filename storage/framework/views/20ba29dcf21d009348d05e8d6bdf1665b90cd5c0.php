<p>Hello, <?php echo e($udata[0]['username'] ?? ''); ?></p>
<br>
You can reset password from bellow link:

<a href="<?php echo e(route('reset.password.get', $token)); ?>">Reset Password</a><?php /**PATH E:\xampp\htdocs\airbnb service\resources\views/emails/reset_password.blade.php ENDPATH**/ ?>