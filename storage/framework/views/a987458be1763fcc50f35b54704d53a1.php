

<?php $__env->startSection('title', 'Контактная форма'); ?>

<?php $__env->startSection('content'); ?>
    <h2>Контактная форма</h2>
    
    <form id="contactForm" method="POST" class="needs-validation">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="name" class="form-label">Имя:</label>
            <input type="text" name="name" id="name" required class="form-control">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Телефон:</label>
            <input type="tel" name="phone" id="phone" required class="form-control">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" required class="form-control">
        </div>
        <button class="btn btn-primary" type="submit">Отправить</button>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\last-task\resources\views/contact-form.blade.php ENDPATH**/ ?>