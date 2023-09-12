<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
</head>

<body>
    <h2>Login Page</h2>
    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?php echo $this->session->flashdata('message'); ?>
    <form action="<?= base_url('login'); ?>" method="POST">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</body>

</html>