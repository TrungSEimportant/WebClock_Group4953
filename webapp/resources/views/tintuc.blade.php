<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tin tức - Thế giới đồng hồ </title>
    <link rel="shortcut icon" href="img/favicon.ico" />

    <!-- Load font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        crossorigin="anonymous">

    <!-- our files -->
    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/topnav.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/taikhoan.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/tintuc.css">

    <!-- js -->
    <script src="/server-serve-products-data.js"></script>
	<script src="js/dungchung.js"></script>
    <script>
        window.onload = function () {
            khoiTao();
            // thêm tags (từ khóa) vào khung tìm kiếm
            var tags = ["Rolex", "Dior", "Seiko", "Concord", "Chariol"];
            for (var t of tags) addTags(t, "index.html?search=" + t);
        }
    </script>

</head>

<body>
    <script> addTopNav();</script>

    <section style="min-height: 85vh">
        <script> addHeader(); </script>

        <div class="body-tintuc">
            <div class="tintuc-info">
                <a href="https://vnexpress.net/citizen-sap-ra-mat-bo-suu-tap-tsuyosa-tai-tp-hcm-4787311.html" target="_blank">
                    <img src="img/tintuc/tintuc1.jpg">
                    <h2>Citizen sắp ra mắt bộ sưu tập Tsuyosa tại TP HCM</h2>
                </a>
                <br/>
                <h5>Doanh ngiệp &emsp;3 giờ</h5>
            </div>
            <div class="tintuc-info">
                <a href="https://vnexpress.net/loat-dong-ho-khien-chu-tich-patek-philippe-tu-hao-4815040.html" target="_blank">
                    <img src="img/tintuc/tintuc2.jpg">
                    <h2>Loạt đồng hồ khiến chủ tịch Patek Philippe tự hào</h2>
                </a>
                <br/>
                <h5>Thanh niên &emsp; 6 giờ</h5>
            </div>
            <div class="tintuc-info">
                <a href="https://vnexpress.net/piaget-trinh-lang-dong-ho-ket-hop-co-huyen-thoai-andy-warhol-4813831.html" target="_blank">
                    <img src="img/tintuc/tintuc3.jpg">
                    <h2>Piaget trình làng đồng hồ kết hợp cố huyền thoại Andy Warhol</h2>
                </a>
                <br/>
                <h5>VOV &emsp; 6 giờ</h5>
            </div>
            <div class="tintuc-info">
                <a href="https://dantri.com.vn/suc-manh-so/nguoi-dung-viet-ngay-cang-chuong-smartwatch-20211217175344510.htm" target="_blank">
                    <img src="img/tintuc/tintuc4.png">
                    <h2>Người dùng Việt ngày càng chuộng smartwatch</h2>
                </a>
                <br/>
                <h5>VietQ &emsp; 13 giờ</h5>
            </div>
            <div class="tintuc-info" style="border-bottom: 0;">
                <a href="https://dantri.com.vn/-manh-so/smartwatch-cao-cap-ngay-cang-duoc-ua-chuong-tai-viet-nam-20231228000755287.htm" target="_blank">
                    <img src="img/tintuc/tintuc5.webp" height="148px" width="224px;">
                    <h2>Smartwatch cao cấp ngày càng được ưa chuộng tại Việt Nam</h2>
                </a>
                <br/>
                <h5>Zing &emsp; 9 giờ</h5>
            </div>

        </div>

    </section>

    <script> addContainTaiKhoan(); </script>

    <div class="footer">
        <script>addFooter();</script>

    </div>

    <i class="fa fa-arrow-up" id="goto-top-page" onclick="gotoTop()"></i>

</body>

</html>
