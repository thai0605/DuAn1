
<?php

if (!empty($sanphamCT)): ?>
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    <div class="carousel-item active">
                        <img id="product-image" class="w-100 h-100" src="<?= removeFirstChar($sanphamCT['image']) ?? '' ?>" alt="Image">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold"><?= $sanphamCT['title'] ?? '' ?></h3>
            <div class="product-details mb-4">
                <?php if (!empty($sanphamCT['variants'])): ?>
                    <div class="variants-container">
                        <?php foreach ($sanphamCT['variants'] as $variant): ?>

                            <button class="btn btn-outline-primary variant-btn"
                                data-price="<?= $variant['price'] ?>"
                                data-stock="<?= $variant['stock_quantity'] ?>"
                                data-image="<?= removeFirstChar($variant['image']) ?>"
                                data-format="<?= $variant['format'] ?>"
                                data-language="<?= $variant['language'] ?>"
                                data-sale-value="<?= $variant['sale_value'] ?>"
                                onclick="updateVariantInfo(this)">
                                <?= $variant['format'] ?> + <?= $variant['language'] ?>
                            </button>
                        <?php endforeach; ?>
                    </div>

                <?php endif; ?>
            </div>
            <p class="mb-4" id="stock-display">Còn : <?= $sanphamCT['stock_quantity'] ?? '' ?> sản phẩm</p>


            <div class="mb-4">
                <h3 class="font-weight-semi-bold d-inline" id="product-price">
                    <?php
                    if (!empty($sanphamCT['sale_value'])) {
                        $original_price =  $sanphamCT['price'];
                        $sale_value = $sanphamCT['sale_value'];

                        // Tính giá sau khuyến mãi
                        if ($sale_value < 100) {
                            // Giảm giá theo phần trăm
                            $final_price = $original_price - ($original_price * $sale_value / 100);
                        } else {
                            // Giảm giá theo số tiền cố định
                            $final_price = $original_price - $sale_value;
                        }
                        echo number_format(max($final_price, 0), 0, ',', '.') . ' đ';
                    } else {
                        // Không có khuyến mãi, hiển thị giá gốc
                        echo number_format($sanphamCT['price'] ?? 0, 0, ',', '.') . ' đ';
                    }
                    ?>
                </h3>
                <?php if (!empty($sanphamCT['sale_value'])): ?>
                    <h5 class="font-weight-semi-bold d-inline text-muted ml-2" id="original-price" style="text-decoration: line-through;">
                        <?= number_format($sanphamCT['original_price'] ?? $sanphamCT['price'], 0, ',', '.') ?> đ
                    </h5>
                <?php endif; ?>

            </div>
            <p class="mb-4"><?= $sanphamCT['description'] ?? '' ?></p>

            <form action="?act=add-item-to-cart" method="POST" class="d-flex align-items-center mb-4 pt-2">
                <!-- ID sản phẩm hoặc biến thể -->
                <input type="hidden" name="variant_id" value="<?= htmlspecialchars($sanphamCT['id'] ?? '') ?>">
                <input type="hidden" name="comic_id" value="<?= htmlspecialchars($sanphamCT['comic_id'] ?? $sanphamCT['id'] ?? '') ?>">

                <?php if (($sanphamCT['stock_quantity'] ?? 0) > 0): ?>
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-primary btn-minus" onclick="decreaseValue()">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" name="quantity" id="quantity" class="form-control bg-secondary text-center"
                            style="padding: 10px;" value="1" min="1" max="<?= (int) $sanphamCT['stock_quantity'] ?>">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-primary btn-plus" onclick="increaseValue()">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button type="submit" name="view-shopping-cart" class="btn btn-primary px-3">
                        <i class="fa fa-shopping-cart mr-1"></i> Add To Cart
                    </button>
                <?php else: ?>
                    <div class="alert alert-warning mb-0">Out of stock</div>
                <?php endif; ?>
            </form>
            <form action="?act=checkout" method="POST" style="display: inline;" onsubmit="return validateBeforeCheckout()">
                <input type="hidden" name="buy_now" value="1">
                <input type="hidden" name="comic_id" value="<?= htmlspecialchars($sanphamCT['id'] ?? '') ?>">
                <input type="hidden" name="quantity" id="buy_now_quantity" value="1">
                <input type="hidden" name="price" value="<?= htmlspecialchars($final_price ?? $sanphamCT['price'] ?? '') ?>">
                <input type="hidden" name="title" value="<?= htmlspecialchars($sanphamCT['title'] ?? '') ?>">
                <input type="hidden" name="image" value="<?= htmlspecialchars($sanphamCT['image'] ?? '') ?>">
                <button type="submit" class="btn btn-danger px-3 ml-2">
                    <i class="fa fa-flash mr-1"></i> Mua ngay
                </button>
            </form>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-warning">No product details available.</div>
<?php endif; ?>

<div class="d-flex pt-2">
    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
    <div class="d-inline-flex">
        <a class="text-dark px-2" href="">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a class="text-dark px-2" href="">
            <i class="fab fa-twitter"></i>
        </a>
        <a class="text-dark px-2" href="">
            <i class="fab fa-linkedin-in"></i>
        </a>
        <a class="text-dark px-2" href="">
            <i class="fab fa-pinterest"></i>
        </a>
    </div>
</div>

<div class="row px-xl-5">
    <div class="col">
        <!-- Tabs for Comments and Reviews -->
        <div class="nav nav-tabs justify-content-center border-secondary mb-4">
            <a class="nav-item nav-link active" data-toggle="tab" href="#comments-tab"><strong>Comments</strong></a>
            <a class="nav-item nav-link" data-toggle="tab" href="#reviews-tab"><strong>Reviews</strong></a>
        </div>


           
           


            <script>
                function increaseValue() {
                    var input = document.getElementById('quantity');
                    var max = parseInt(input.getAttribute('max'));
                    var value = parseInt(input.value);

                    if (value < max) {
                        input.value = value + 1;
                    }
                }

                function decreaseValue() {
                    var input = document.getElementById('quantity');
                    var value = parseInt(input.value);

                    if (value > 1) {
                        input.value = value - 1;
                    }
                }

                // Thêm validation khi người dùng nhập trực tiếp
                document.getElementById('quantity').addEventListener('change', function() {
                    var value = parseInt(this.value);
                    var max = parseInt(this.getAttribute('max'));

                    if (isNaN(value) || value < 1) {
                        this.value = 1;
                    } else if (value > max) {
                        this.value = max;
                    }
                });

                function updateVariantInfo(button) {
                    // Lấy các giá trị từ data-* của nút
                    var price = parseFloat(button.getAttribute('data-price'));
                    var stock = parseInt(button.getAttribute('data-stock'));
                    var image = button.getAttribute('data-image');
                    var saleValue = parseFloat(button.getAttribute('data-sale-value') || 0);

                    // Kiểm tra các giá trị đã được lấy đúng chưa
                    console.log('Price:', price, 'Stock:', stock, 'Image:', image, 'Sale Value:', saleValue);

                    // Tính giá sau giảm giá nếu có
                    var finalPrice = price;
                    if (saleValue > 0) {
                        if (saleValue < 100) {
                            // Giảm giá theo phần trăm
                            finalPrice = price - (price * saleValue / 100);
                        } else {
                            // Giảm giá theo số tiền cố định
                            finalPrice = price - saleValue;
                        }
                    }

                    // Cập nhật giá hiển thị
                    document.getElementById('product-price').textContent =
                        new Intl.NumberFormat('vi-VN').format(Math.max(finalPrice, 0)) + ' đ';

                    // Cập nhật số lượng tồn kho
                    var stockDisplay = document.getElementById('stock-display');
                    stockDisplay.textContent = `Còn : ${stock} sản phẩm`;

                    // Cập nhật hình ảnh sản phẩm
                    document.getElementById('product-image').src = image ? image : '';

                    // Cập nhật số lượng tối đa (max) cho input số lượng
                    var quantityInput = document.getElementById('quantity');
                    quantityInput.setAttribute('max', stock);
                    quantityInput.value = Math.min(quantityInput.value, stock);

                    // Cập nhật giá trị số lượng "mua ngay"
                    document.getElementById('buy_now_quantity').value = Math.min(1, stock);
                }


                function validateBeforeCheckout() {
                    // Kiểm tra đăng nhập
                    <?php if (!isset($_SESSION['user'])): ?>
                        Swal.fire({
                            title: 'Thông báo',
                            text: 'Vui lòng đăng nhập để mua hàng!',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Đăng nhập',
                            cancelButtonText: 'Hủy'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'index.php?act=login';
                            }
                        });
                        return false;
                    <?php endif; ?>

                    // Kiểm tra số lượng tồn kho
                    const quantity = parseInt(document.getElementById('quantity').value);
                    const stock = parseInt(document.getElementById('quantity').getAttribute('max'));

                    if (quantity > stock) {
                        Swal.fire({
                            title: 'Lỗi',
                            text: 'Số lượng vượt quá tồn kho!',
                            icon: 'error'
                        });
                        return false;
                    }

                    // Cập nhật số lượng cho form mua ngay
                    document.getElementById('buy_now_quantity').value = quantity;
                    return true;
                }

                // Hiển thị giá gốc nếu có giảm giá
                if (saleValue > 0) {
                    document.getElementById('original-price').style.display = 'inline';
                    document.getElementById('original-price').textContent =
                        new Intl.NumberFormat('vi-VN').format(price) + ' đ';
                } else {
                    document.getElementById('original-price').style.display = 'none';
                }

                // Cập nhật số lượng tồn kho
                document.querySelector('.variant-stock').textContent = stock ? stock : '0';

                // Cập nhật hình ảnh
                document.getElementById('product-image').src = image ? image : '';

                // Cập nhật thông tin biến thể đã chọn
                document.querySelector('.selected-variant-info').style.display = 'block';


                function validateBeforeCheckout() {
                    // Kiểm tra đăng nhập
                    <?php if (!isset($_SESSION['user'])): ?>
                        Swal.fire({
                            title: 'Thông báo',
                            text: 'Vui lòng đăng nhập để mua hàng!',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Đăng nhập',
                            cancelButtonText: 'Hủy'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'index.php?act=login';
                            }
                        });
                        return false;
                    <?php endif; ?>

                    // Kiểm tra số lượng tồn kho
                    const quantity = parseInt(document.getElementById('quantity').value);
                    const stock = parseInt('<?= $sanphamCT['stock_quantity'] ?? 0 ?>');

                    if (quantity > stock) {
                        Swal.fire({
                            title: 'Lỗi',
                            text: 'Số lượng vượt quá tồn kho!',
                            icon: 'error'
                        });
                        return false;
                    }

                    // Cập nhật số lượng cho form mua ngay
                    document.getElementById('buy_now_quantity').value = quantity;
                    return true;
                }
                //
                document.addEventListener("DOMContentLoaded", function() {
                    const loadMoreBtn = document.getElementById("load-more-comments");
                    const closeCommentsBtn = document.getElementById("close-comments");
                    const commentItems = document.querySelectorAll(".comment-item");
                    let visibleCount = 5;

                    if (loadMoreBtn) {
                        loadMoreBtn.addEventListener("click", function() {
                            // Hiển thị các bình luận tiếp theo
                            for (let i = visibleCount; i < visibleCount + 5; i++) {
                                if (commentItems[i]) {
                                    commentItems[i].style.display = "block";
                                }
                            }
                            visibleCount += 5;

                            // Hiển thị nút "Đóng" khi có nhiều hơn 5 bình luận
                            if (visibleCount > 5) {
                                closeCommentsBtn.style.display = "inline-block";
                            }

                            // Ẩn nút "Xem thêm" nếu không còn bình luận
                            if (visibleCount >= commentItems.length) {
                                loadMoreBtn.style.display = "none";
                            }
                        });
                    }

                    if (closeCommentsBtn) {
                        closeCommentsBtn.addEventListener("click", function() {
                            // Ẩn các bình luận và chỉ hiển thị 5 bình luận đầu
                            for (let i = 5; i < commentItems.length; i++) {
                                commentItems[i].style.display = "none";
                            }
                            visibleCount = 5;

                            // Hiển thị lại nút "Xem thêm" và ẩn nút "Đóng"
                            loadMoreBtn.style.display = "inline-block";
                            closeCommentsBtn.style.display = "none";
                        });
                    }
                });

                function increaseValue() {
                    var value = parseInt(document.getElementById('quantity').value);
                    value = isNaN(value) ? 0 : value;
                    value++;
                    document.getElementById('quantity').value = value;
                }

                function decreaseValue() {
                    var value = parseInt(document.getElementById('quantity').value);
                    value = isNaN(value) ? 0 : value;
                    if (value > 1) {
                        value--;
                        document.getElementById('quantity').value = value;
                    }
                }
            </script>
            <style>
                .text-warning {
                    color: gold;
                    /* Màu vàng cho biểu tượng sao */
                }
            </style>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const productContainers = document.querySelectorAll('.products-container');

                    productContainers.forEach(container => {
                        const wrapper = container.querySelector('.products-wrapper');
                        const btnLeft = container.parentElement.querySelector('.btn-left');
                        const btnRight = container.parentElement.querySelector('.btn-right');

                        // Ngăn chặn kéo hình ảnh
                        wrapper.querySelectorAll('img').forEach(img => {
                            img.addEventListener('dragstart', (e) => e.preventDefault());
                            img.style.pointerEvents = 'none'; // Vô hiệu hóa tương tác chuột với hình ảnh
                        });

                        let isDragging = false;
                        let startX;
                        let scrollLeft;
                        let momentum = 0;
                        let animationId;

                        // Mouse events với momentum scrolling
                        wrapper.addEventListener('mousedown', (e) => {
                            isDragging = true;
                            wrapper.classList.add('dragging');
                            startX = e.pageX;
                            scrollLeft = wrapper.scrollLeft;
                            momentum = 0;
                            cancelAnimationFrame(animationId);
                            e.preventDefault(); // Ngăn chặn hành vi mặc định
                        });

                        wrapper.addEventListener('mousemove', (e) => {
                            if (!isDragging) return;
                            e.preventDefault();

                            const x = e.pageX;
                            const delta = (startX - x);
                            wrapper.scrollLeft = scrollLeft + delta;

                            momentum = delta * 0.1;
                            startX = x;
                            scrollLeft = wrapper.scrollLeft;
                        });

                        // Thêm event listener cho document để xử lý mouseup bên ngoài wrapper
                        document.addEventListener('mouseup', finishDragging);
                        document.addEventListener('mouseleave', finishDragging);

                        function finishDragging() {
                            if (!isDragging) return;
                            isDragging = false;
                            wrapper.classList.remove('dragging');

                            function momentumScroll() {
                                if (Math.abs(momentum) > 0.1) {
                                    wrapper.scrollLeft += momentum;
                                    momentum *= 0.95;
                                    animationId = requestAnimationFrame(momentumScroll);
                                }
                            }
                            momentumScroll();
                        }

                        // Button navigation với animation mượt
                        btnLeft.addEventListener('click', () => {
                            const scrollAmount = wrapper.offsetWidth * 0.8;
                            smoothScroll(wrapper, -scrollAmount);
                        });

                        btnRight.addEventListener('click', () => {
                            const scrollAmount = wrapper.offsetWidth * 0.8;
                            smoothScroll(wrapper, scrollAmount);
                        });

                        function smoothScroll(element, amount) {
                            const start = element.scrollLeft;
                            const target = start + amount;
                            const duration = 500; // ms
                            const startTime = performance.now();

                            function animation(currentTime) {
                                const elapsed = currentTime - startTime;
                                const progress = Math.min(elapsed / duration, 1);

                                // Easing function for smoother animation
                                const easeProgress = 1 - Math.pow(1 - progress, 4);

                                element.scrollLeft = start + (amount * easeProgress);

                                if (progress < 1) {
                                    requestAnimationFrame(animation);
                                }
                            }

                            requestAnimationFrame(animation);
                        }
                    });
                });
            </script>




            <style>
                .btn-carousel {
                    position: absolute;
                    top: 50%;
                    transform: translateY(-50%);
                    background-color: rgba(0, 123, 255, 0.8);
                    /* Màu nền xanh mờ */
                    color: white;
                    /* Màu chữ trắng */
                    border: 2px solid transparent;
                    /* Border mặc định trong suốt */
                    border-radius: 50%;
                    /* Bo góc tròn */
                    width: 40px;
                    /* Kích thước nhỏ hơn */
                    height: 40px;
                    /* Kích thước nhỏ hơn */
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    cursor: pointer;
                    z-index: 10;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                    /* Hiệu ứng bóng */
                    transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease, border 0.3s ease;
                }

                .btn-carousel:hover {
                    background-color: rgba(0, 123, 255, 1);
                    /* Màu nền đậm hơn khi hover */
                    transform: translateY(-50%) scale(1.1);
                    /* Phóng to nhẹ khi hover */
                    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
                    /* Tăng độ bóng khi hover */
                }

                .btn-carousel:active {
                    border: 2px solid black;
                    /* Border đen khi nhấn */
                    transform: translateY(-50%) scale(0.95);
                    /* Thu nhỏ nhẹ khi nhấn */
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                    /* Giảm bóng khi nhấn */
                }

                .btn-left {
                    left: -5px;
                    /* Vị trí nút bên trái */
                }

                .btn-right {
                    right: -5px;
                    /* Vị trí nút bên phải */
                }

                .btn-carousel i {
                    font-size: 18px;
                    /* Kích thước icon nhỏ hơn */
                }

                .products-wrapper {
                    display: flex;
                    overflow-x: auto;
                    scroll-behavior: auto;
                    /* Thay đổi từ smooth sang auto để tránh xung đột với custom scrolling */
                    -webkit-overflow-scrolling: touch;
                    cursor: grab;
                    user-select: none;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    scroll-snap-type: x proximity;
                    /* Thay đổi từ mandatory sang proximity để mượt hơn */
                    gap: 10px;
                    /* Thêm khoảng cách giữa các items */
                }

                .products-wrapper::-webkit-scrollbar {
                    display: none;
                }

                .products-wrapper.dragging {
                    cursor: grabbing;
                    scroll-behavior: auto;
                    scroll-snap-type: none;
                    /* Tắt snap trong khi kéo */
                }

                .product-card {
                    flex: 0 0 20%;
                    max-width: 20%;
                    padding: 0 10px;
                    box-sizing: border-box;
                    scroll-snap-align: start;
                    transition: transform 0.3s ease;
                }

                .product-card:hover {
                    transform: translateY(-5px);
                }

                /* Thêm media query để điều chỉnh vị trí nút trên màn hình nhỏ */
                @media (max-width: 1200px) {
                    .btn-left {
                        left: 10px;
                    }

                    .btn-right {
                        right: 10px;
                    }
                }

                /* Thêm overflow-x: hidden cho container để tránh thanh cuộn ngang */
                .container-fluid {
                    overflow-x: hidden;
                }

                /* Đảm bảo scroll smooth hoạt động trên tất cả các trình duyệt */
                @supports (scroll-behavior: smooth) {
                    .products-wrapper {
                        scroll-behavior: smooth;
                    }
                }

                /* Thêm styles để ngăn chặn việc chọn text */
                .products-wrapper {
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    user-select: none;
                }

                .product-img img {
                    pointer-events: none;
                    /* Vô hiệu hóa tương tác chuột với hình ảnh */
                    -webkit-user-drag: none;
                    /* Ngăn kéo hình ảnh trên Chrome/Safari */
                    -khtml-user-drag: none;
                    /* Ngăn kéo hình ảnh trên các trình duyệt khác */
                    -moz-user-drag: none;
                    -o-user-drag: none;
                    -user-drag: none;
                }
            </style>