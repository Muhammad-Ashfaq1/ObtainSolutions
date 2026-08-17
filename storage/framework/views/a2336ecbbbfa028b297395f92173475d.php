<!doctype html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <meta name="robots" content="index, follow" />
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'ObtainSolutions builds web apps, mobile apps, APIs, and SaaS platforms with expert PHP & Laravel engineering to turn your ideas into digital reality.'); ?>" />
    <meta name="keywords" content="<?php echo $__env->yieldContent('meta_keywords', 'web development, app development, laravel development, php development, api development, saas development, software house, custom software, mobile app development'); ?>" />
    <meta name="author" content="<?php echo e(config('app.name')); ?>" />
    <title><?php echo $__env->yieldContent('title', 'ObtainSolutions - Transform Your Ideas Into Digital Reality'); ?></title>

    <link rel="canonical" href="<?php echo e(url()->current()); ?>" />

    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="<?php echo e(config('app.name')); ?>" />
    <meta property="og:title" content="<?php echo $__env->yieldContent('title', 'ObtainSolutions - Transform Your Ideas Into Digital Reality'); ?>" />
    <meta property="og:description" content="<?php echo $__env->yieldContent('meta_description', 'ObtainSolutions builds web apps, mobile apps, APIs, and SaaS platforms with expert PHP & Laravel engineering.'); ?>" />
    <meta property="og:url" content="<?php echo e(url()->current()); ?>" />
    <meta property="og:image" content="<?php echo e(asset('assets/img/logo.png')); ?>" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo $__env->yieldContent('title', 'ObtainSolutions - Transform Your Ideas Into Digital Reality'); ?>" />
    <meta name="twitter:description" content="<?php echo $__env->yieldContent('meta_description', 'ObtainSolutions builds web apps, mobile apps, APIs, and SaaS platforms with expert PHP & Laravel engineering.'); ?>" />
    <meta name="twitter:image" content="<?php echo e(asset('assets/img/logo.png')); ?>" />

    <link rel="icon" type="image/png" href="<?php echo e(asset('assets/img/logo.png')); ?>" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.24.0/dist/tabler-icons.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/public-landing.css')); ?>?v=<?php echo e(filemtime(public_path('assets/css/public-landing.css'))); ?>" />

    <style>
        body { font-family: "Public Sans", system-ui, -apple-system, "Segoe UI", Roboto, sans-serif; }
        h1, h2, h3, h4, h5, h6, .fw-bolder, .hero-title { font-family: "Plus Jakarta Sans", "Public Sans", sans-serif; }
        /* Tabler webfont sizing shim (replaces Vuexy icon utility classes) */
        .icon-base { line-height: 1; }
        .icon-xs { font-size: 0.85rem; }
        .icon-sm { font-size: 1rem; }
        .icon-lg { font-size: 1.6rem; }
        /* Floating WhatsApp button */
        .floating-whatsapp-btn {
            position: fixed; right: 1.4rem; bottom: 1.4rem; z-index: 1030;
            width: 3.4rem; height: 3.4rem; border-radius: 50%;
            display: inline-flex; align-items: center; justify-content: center;
            background: #25d366; color: #fff; font-size: 1.6rem;
            box-shadow: 0 14px 30px rgba(37, 211, 102, 0.45);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .floating-whatsapp-btn:hover { color: #fff; transform: translateY(-3px) scale(1.05); box-shadow: 0 18px 38px rgba(37, 211, 102, 0.55); }
        .error-message { color: #ef4444; font-size: 0.8rem; margin-top: 0.35rem; display: none; }
    </style>

    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>
    <?php echo $__env->yieldContent('content'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH /Users/macbookpro2019/Projects/ObtainSolutions/resources/views/layouts/public.blade.php ENDPATH**/ ?>