<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>REGISTER USER</title>
</head>

<body>
    <style>
        body {
            background: #e9e9e9;
            color: #666666;
            font-family: "RobotoDraft", "Roboto", sans-serif;
            font-size: 14px;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Pen Title */
        .pen-title {
            padding: 50px 0;
            text-align: center;
            letter-spacing: 2px;
        }

        .pen-title h1 {
            margin: 0 0 20px;
            font-size: 48px;
            font-weight: 300;
        }

        .pen-title span {
            font-size: 12px;
        }

        .pen-title span .fa {
            color: #33b5e5;
        }

        .pen-title span a {
            color: #33b5e5;
            font-weight: 600;
            text-decoration: none;
        }

        /* Form Module */
        .form-module {
            position: relative;
            background: #ffffff;
            max-width: 320px;
            width: 100%;
            border-top: 5px solid #33b5e5;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }

        .form-module .toggle {
            cursor: pointer;
            position: absolute;
            top: 0;
            right: 0;
            background: #33b5e5;
            width: 30px;
            height: 30px;
            margin: -5px 0 0;
            color: #ffffff;
            font-size: 12px;
            line-height: 30px;
            text-align: center;
        }

        .form-module .toggle .tooltip {
            position: absolute;
            top: 5px;
            right: -65px;
            display: block;
            background: rgba(0, 0, 0, 0.006);
            width: auto;
            padding: 5px;
            font-size: 10px;
            line-height: 1;
            text-transform: uppercase;
        }

        .form-module .toggle .tooltip:before {
            content: "";
            position: absolute;
            top: 5px;
            left: -5px;
            display: block;
            border-top: 5px solid transparent;
            border-bottom: 5px solid transparent;
            border-right: 5px solid rgba(0, 0, 0, 0.6);
        }

        .form-module .form {
            display: none;
            padding: 40px;
        }

        .form-module .form:nth-child(2) {
            display: block;
        }

        .form-module h2 {
            margin: 0 0 20px;
            color: #33b5e5;
            font-size: 18px;
            font-weight: 400;
            line-height: 1;
        }

        .form-module input {
            outline: none;
            display: block;
            width: 100%;
            border: 1px solid #d9d9d9;
            margin: 0 0 20px;
            padding: 10px 15px;
            box-sizing: border-box;
            font-wieght: 400;
            transition: 0.3s ease;
        }

        .form-module input:focus {
            border: 1px solid #33b5e5;
            color: #333333;
        }

        .form-module button {
            cursor: pointer;
            background: #33b5e5;
            width: 100%;
            border: 0;
            padding: 10px 15px;
            color: #ffffff;
            transition: 0.3s ease;
        }

        .form-module button:hover {
            background: #178ab4;
        }

        .form-module .cta {
            background: #f2f2f2;
            width: 100%;
            padding: 15px 40px;
            box-sizing: border-box;
            color: #666666;
            font-size: 12px;
            text-align: center;
        }

        .form-module .cta a {
            color: red;
        }
    </style>
    <div class="pen-title">
        <h1>REGISTER USER</h1>
    </div>
    <!-- Form Module-->
    <div class="module form-module">

        <div class="form">
            <!-- <h2>LOGIN</h2> -->
            <!-- <form action="login" method="POST">
                <input type="text" placeholder="Username" />
                <input type="password" placeholder="Password" />
                <button>Login</button>
            </form> -->
        </div>
        <div class="form">
            <h2></h2>
            <form action="<?= base_url('login_user/register'); ?>" method="POST">
                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>');
                ?>
                <div class="form-group">
                    <label for="nama">NAMA:</label>
                    <input type="text" name="nama" class="form-control" placeholder="NAMA" value="<?= set_value('nama'); ?>">
                    <div class=" input-group-append">

                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>');
                ?>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" placeholder="EMAIL" value="<?= set_value('email'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('password', '<small class="text-danger pl-3">', '</small>');
                ?>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>