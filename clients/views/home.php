
<style>
    .btn-carousel {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 123, 255, 0.8); /* Màu nền xanh mờ */
        color: white; /* Màu chữ trắng */
        border: 2px solid transparent; /* Border mặc định trong suốt */
        border-radius: 50%; /* Bo góc tròn */
        width: 40px; /* Kích thước nhỏ hơn */
        height: 40px; /* Kích thước nhỏ hơn */
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 10;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Hiệu ứng bóng */
        transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease, border 0.3s ease;
    }

    .btn-carousel:hover {
        background-color: rgba(0, 123, 255, 1); /* Màu nền đậm hơn khi hover */
        transform: translateY(-50%) scale(1.1); /* Phóng to nhẹ khi hover */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3); /* Tăng độ bóng khi hover */
    }

    .btn-carousel:active {
        border: 2px solid black; /* Border đen khi nhấn */
        transform: translateY(-50%) scale(0.95); /* Thu nhỏ nhẹ khi nhấn */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Giảm bóng khi nhấn */
    }

    .btn-left {
        left: -5px; /* Vị trí nút bên trái */
    }

    .btn-right {
        right: -5px; /* Vị trí nút bên phải */
    }

    .btn-carousel i {
        font-size: 18px; /* Kích thước icon nhỏ hơn */
    }

    .products-wrapper {
        display: flex;
        overflow-x: auto;
        scroll-behavior: auto; /* Thay đổi từ smooth sang auto để tránh xung đột với custom scrolling */
        -webkit-overflow-scrolling: touch;
        cursor: grab;
        user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        scroll-snap-type: x proximity; /* Thay đổi từ mandatory sang proximity để mượt hơn */
        gap: 10px; /* Thêm khoảng cách giữa các items */
    }

    .products-wrapper::-webkit-scrollbar {
        display: none;
    }

    .products-wrapper.dragging {
        cursor: grabbing;
        scroll-behavior: auto;
        scroll-snap-type: none; /* Tắt snap trong khi kéo */
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
        pointer-events: none; /* Vô hiệu hóa tương tác chuột với hình ảnh */
        -webkit-user-drag: none; /* Ngăn kéo hình ảnh trên Chrome/Safari */
        -khtml-user-drag: none; /* Ngăn kéo hình ảnh trên các trình duyệt khác */
        -moz-user-drag: none;
        -o-user-drag: none;
        -user-drag: none;
    }

</style>

   