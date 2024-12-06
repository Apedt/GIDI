<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* Resetting default styles */
        body, h2, p {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        /* Background and main container styling */
        body {
            background-color: #f4f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .register-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Form Styling */
        label {
            display: block;
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="email"], input[type="password"], select {
            width: 100%;
            padding: 12px;
            margin: 8px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, select:focus {
            border-color: #6c63ff;
            outline: none;
        }

        button[type="submit"] {
            width: 100%;
            padding: 14px;
            background-color: #6c63ff;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #5a54e3;
        }

        /* Error message styling */
        .error-message {
            color: red;
            font-size: 12px;
            margin-top: -12px;
            margin-bottom: 15px;
        }

        /* Registration link */
        .register-link {
            text-align: center;
            margin-top: 15px;
        }

        .register-link a {
            color: #6c63ff;
            text-decoration: none;
            font-weight: bold;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        /* Responsive design */
        @media (max-width: 600px) {
            .register-container {
                padding: 20px;
            }

            h2 {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>

    <div class="register-container">
        <h2>Register</h2>

        <form action="<?= site_url('/auth/doRegister') ?>" method="post">
            <?= csrf_field() ?>

            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?= old('username') ?>" required>
            <?php if (\Config\Services::validation()->getError('username')): ?>
                <div class="error-message"><?= \Config\Services::validation()->getError('username') ?></div>
            <?php endif; ?>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= old('email') ?>" required>
            <?php if (\Config\Services::validation()->getError('email')): ?>
                <div class="error-message"><?= \Config\Services::validation()->getError('email') ?></div>
            <?php endif; ?>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <?php if (\Config\Services::validation()->getError('password')): ?>
                <div class="error-message"><?= \Config\Services::validation()->getError('password') ?></div>
            <?php endif; ?>

            <label for="role">Role</label>
            <select name="role" id="role" required>
                <option value="admin" <?= old('role') == 'admin' ? 'selected' : '' ?>>Admin</option>
                <option value="jemaat" <?= old('role') == 'jemaat' ? 'selected' : '' ?>>Jemaat</option>
            </select>
            <?php if (\Config\Services::validation()->getError('role')): ?>
                <div class="error-message"><?= \Config\Services::validation()->getError('role') ?></div>
            <?php endif; ?>

            <button type="submit">Register</button>
        </form>

        <div class="register-link">
            <p>Already have an account? <a href="<?= site_url('/login') ?>">Login</a></p>
        </div>
    </div>

</body>
</html>
