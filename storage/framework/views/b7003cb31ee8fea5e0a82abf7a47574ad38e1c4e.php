<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
    <style>
        html{
            width: 100%;
            background-color: gainsboro;
        }
        body{
            padding: 20px 30px 30px 30px;            
            background-color: #ffffff;                     
        }
    </style>
</head>
<body>

    <header>
        <img style="max-width: 250px; width: 100%;" src="<?php echo e(asset('assets/img/home-logo.png')); ?>" alt="">
    </header>

    <section class="mail-body">        
        <?php if (! empty(trim($__env->yieldContent('mailbody')))): ?>
        <?php echo $__env->yieldContent('mailbody'); ?>
        <?php else: ?>
        Mail is Send from the MatrimonyBD
        <?php endif; ?>
    </section>
    </body>
</html>