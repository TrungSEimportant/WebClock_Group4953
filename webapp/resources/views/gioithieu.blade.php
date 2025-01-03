<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giới thiệu - Thế giới đồng hồ</title>
    <link rel="shortcut icon" href="img/favicon.ico" />

    <!-- Load font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">

    <!-- our files -->
    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/topnav.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/taikhoan.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/gioithieu.css">

    <!-- js -->
    <script src="/server-serve-products-data.js"></script>
    <script src="js/dungchung.js"></script>
    <script>
        window.onload = function() {
            khoiTao();
            // thêm tags (từ khóa) vào khung tìm kiếm
            var tags = ["Rolex", "Dior", "Seiko", "Concord", "Chariol"];
            for (var t of tags) addTags(t, "index.html?search=" + t);
        }
    </script>

</head>

<body>
    <script>
        addTopNav();
    </script>

    <section style="min-height: 85vh">
        <script>
            addHeader();
        </script>

        <div class="page-gt">
            <h4 class="page-header">
                Giới thiệu
            </h4>
            <div class="page-info">
                <p>VTTSTORE không chỉ là một cửa hàng đồng hồ, mà còn là điểm đến lý tưởng cho những ai đam mê nghệ thuật chế tác thời gian và khẳng định phong cách cá nhân.
                </p>
                <br />
                <p>
                    Với phương châm "Chất lượng khẳng định đẳng cấp", chúng tôi tự hào mang đến cho quý khách hàng những bộ sưu tập đồng hồ chính hãng, tinh xảo đến từ các thương hiệu danh tiếng hàng đầu thế giới.<br /> Đến với VTSTORE, quý khách sẽ được
                    trải nghiệm:

                    <br />Sự đa dạng về mẫu mã: Từ những thiết kế cổ điển, thanh lịch đến những mẫu đồng hồ hiện đại, thể thao, phù hợp với mọi phong cách và cá tính.
                    <br /> Chất lượng đảm bảo: Cam kết 100% sản phẩm chính hãng, đi kèm chế độ bảo hành uy tín và dịch vụ hậu mãi chu đáo.
                    <br />Tư vấn chuyên nghiệp: Đội ngũ nhân viên am hiểu sâu sắc về đồng hồ, sẵn sàng tư vấn và hỗ trợ quý khách lựa chọn sản phẩm ưng ý nhất. Không gian sang trọng: Mang đến trải nghiệm mua sắm đẳng cấp và thoải mái. VTSTORE - Nơi thời
                    gian thăng hoa cùng phong cách của bạn!
                </p>
            </div>
        </div>
    </section>

    <script>
        addContainTaiKhoan();
    </script>

    <div class="footer">
        <script>
            addFooter();
        </script>

    </div>

    <i class="fa fa-arrow-up" id="goto-top-page" onclick="gotoTop()"></i>
</body>

</html>
