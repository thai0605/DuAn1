<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="clients/clients/assets/css/thongtin.css">
    <style>
        .password-section {
            max-width: 600px;
            margin: 0 auto;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .password-strength {
            height: 5px;
            margin-top: 5px;
            background-color: #e9ecef;
            border-radius: 5px;
            overflow: hidden;
        }
        .password-strength-bar {
            height: 100%;
            width: 0%;
            transition: width 0.3s ease, background-color 0.3s ease;
        }
        .password-requirements {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 10px;
        }
        .requirement {
            margin-bottom: 5px;
        }
        .requirement i {
            width: 20px;
            text-align: center;
        }
        .requirement.valid {
            color: #28a745;
        }
        .input-group-text {
            cursor: pointer;
        }
        .alert {
            border-left: 4px solid;
        }
        .alert-danger {
            border-left-color: #dc3545;
        }
        .alert-success {
            border-left-color: #28a745;
        }
    </style>
</head>

<body>
    <div class="container my-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 mb-4 mb-md-0">
                <div class="list-group">
                    <div class="profile-section p-3 border-bottom text-center">
                        <!-- Avatar và tên người dùng -->
                        <img src="<?php echo htmlspecialchars($_SESSION['user']['avatar'] ?? './uploads/user/default.jpg'); ?>" class="img-fluid rounded-circle" width="100">
                        <h5 class="fw-bold mt-2">
                            <?php
                            if (isset($_SESSION['user']['name'])) {
                                echo htmlspecialchars($_SESSION['user']['name']);
                            } else {
                                echo 'Người dùng';
                            }
                            ?>
                        </h5>
                    </div>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-9">
                <!-- Thông báo lỗi -->
                <?php if (isset($_SESSION['error'])): ?>
                    <div id="error-message" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i> <?= $_SESSION['error'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>

                <!-- Thông báo thành công -->
                <?php if (isset($_SESSION['success'])): ?>
                    <div id="success-message" class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i> <?= $_SESSION['success'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['success']); ?>
                <?php endif; ?>

                <!-- Change Password Section -->
                <section id="change-password" class="password-section p-4 mb-4">
                    <h2 class="h4 fw-bold mb-4 text-center"><i class="fas fa-key me-2"></i>Đổi mật khẩu</h2>

                    <form method="POST" id="passwordForm" onsubmit="return validatePassword()">
                        <div class="mb-3">
                            <label for="current-password" class="form-label">Mật khẩu hiện tại <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="current-password" name="current-password" required>
                                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('current-password', 'current-password-icon')">
                                    <i class="fas fa-eye" id="current-password-icon"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="new-password" class="form-label">Mật khẩu mới <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="new-password" name="new-password" required 
                                       oninput="checkPasswordStrength(this.value)">
                                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('new-password', 'new-password-icon')">
                                    <i class="fas fa-eye" id="new-password-icon"></i>
                                </button>
                            </div>
                            <div class="password-strength">
                                <div class="password-strength-bar" id="password-strength-bar"></div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="confirm-password" class="form-label">Xác nhận mật khẩu mới <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirm-password" name="confirm-password" required>
                                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('confirm-password', 'confirm-password-icon')">
                                    <i class="fas fa-eye" id="confirm-password-icon"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback" id="confirm-feedback">
                                Mật khẩu xác nhận không khớp!
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save me-2"></i>Đổi mật khẩu
                            </button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Toggle password visibility
        // Kiểm tra độ mạnh mật khẩu
function checkPasswordStrength(password) {
    const strengthBar = document.getElementById('password-strength-bar');
    const lengthReq = document.getElementById('length-req');
    const numberReq = document.getElementById('number-req');
    const specialReq = document.getElementById('special-req');
    
    // Reset tất cả
    strengthBar.style.width = '0%';
    strengthBar.style.backgroundColor = '#e9ecef';
    
    // Kiểm tra các yêu cầu
    const hasLength = password.length >= 8;
    const hasNumber = /[0-9]/.test(password);
    const hasSpecial = /[!@#$%^&*(),.?":{}|<>]/.test(password);
    
    // Cập nhật giao diện yêu cầu
    updateRequirement(lengthReq, hasLength);
    updateRequirement(numberReq, hasNumber);
    updateRequirement(specialReq, hasSpecial);
    
    // Tính toán độ mạnh
    let strength = 0;
    if (hasLength) strength += 25;
    if (hasNumber) strength += 25;
    if (hasSpecial) strength += 25;
    
    // Cập nhật thanh độ mạnh
    strengthBar.style.width = strength + '%';
    
    // Đặt màu sắc dựa trên độ mạnh
    if (strength < 50) {
        strengthBar.style.backgroundColor = '#dc3545'; // Đỏ
    } else if (strength < 75) {
        strengthBar.style.backgroundColor = '#fd7e14'; // Cam
    } else {
        strengthBar.style.backgroundColor = '#28a745'; // Xanh lá
    }
}

// Cập nhật chỉ báo yêu cầu
function updateRequirement(element, isValid) {
    if (isValid) {
        element.classList.add('valid');
        element.querySelector('i').className = 'fas fa-check-circle';
    } else {
        element.classList.remove('valid');
        element.querySelector('i').className = 'fas fa-circle';
    }
}
        // Auto close alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>
</body>
</html>