<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>World Of Watch </title>
    <link rel="shortcut icon" href="img/favicon.ico" />

    <!-- Load font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        crossorigin="anonymous">

	<!-- owl carousel libraries cho hình nhỏ -->
	<link rel="stylesheet" href="js/owlcarousel/owl.carousel.min.css">
	<link rel="stylesheet" href="js/owlcarousel/owl.theme.default.min.css">
	<script src="js/Jquery/Jquery.min.js"></script>
    <script src="js/owlcarousel/owl.carousel.min.js"></script>

    <!-- our files -->
    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/topnav.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/taikhoan.css">
    <link rel="stylesheet" href="css/trangchu.css">
    <link rel="stylesheet" href="css/home_products.css">
    <link rel="stylesheet" href="css/chitietsanpham.css">
    <link rel="stylesheet" href="css/footer.css">
    <!-- js -->
    <script src="/server-serve-products-data.js"></script>
    <script src="js/classes.js"></script>
    <script src="js/dungchung.js"></script>
    <script src="js/chitietsanpham.js"></script>
</head>

<body>

    <script> addTopNav(); </script>

    <section>
        <script> addHeader(); </script>

        <div id="productNotFound" style="min-height: 50vh; text-align: center; margin: 50px; display: none;">
            <h1 style="color: red; margin-bottom: 10px;">No products found</h1>
            <a href="index.html" style="text-decoration: underline;">Back to home page</a>
        </div>

        <div class="chitietSanpham" style="margin-bottom: 100px">
            <h1>Watches </h1>
            <div class="rating"></div>
            <div class="rowdetail group">
                <div class="picture">
                    <img src="" onclick="opencertain()">
                </div>
                <div class="price_sale">
                    <div class="area_price"> </div>
                    <div class="ship" style="display: none;">
                        <img src="img/chitietsanpham/clock-152067_960_720.png">
                        <div>RECEIVE IN 1 HOUR</div>
                    </div>
                    <div class="area_promo">
                        <strong>promotion</strong>
                        <div class="promo">
                            <img src="img/chitietsanpham/icon-tick.png">
                            <div id="detailPromo"> </div>
                        </div>
                    </div>
                    <div class="policy">
                        <div>
                            <img src="img/chitietsanpham/box.png">
                            <p>The warranty period is calculated from the date of purchase stated on the WARRANTY CARD or BOOK. </p>
                        </div>
                        <div>
                            <img src="img/chitietsanpham/icon-baohanh.png">
                            <p>12 month genuine warranty.</p>
                        </div>
                        <div class="last">
                            <img src="img/chitietsanpham/1-1.jpg">
                            <p>1 for 1 exchange within 1 month if defective, product exchange at home within 1 day.</p>
                        </div>
                    </div>
                    <div class="area_order">
                        <!-- nameProduct là biến toàn cục được khởi tạo giá trị trong phanTich_URL_chiTietSanPham -->
                        <a class="buy_now" onclick="themVaoGioHang(maProduct, nameProduct);">
                            <b><i class="fa fa-cart-plus"></i> Add to cart</b>
                            <p>Delivery within 1 hour or pick up at store</p>
                        </a>
                    </div>
                </div>
                <div class="info_product">
                    <h2>Specifications</h2>
                    <ul class="info">
                    </ul>
                </div>
            </div>
            <div id="overlaycertainimg" class="overlaycertainimg">
                <div class="close" onclick="closecertain()">&times;</div>
                <div class="overlaycertainimg-content">
                    <img id="bigimg" class="bigimg" src="img/chitietsanpham/oppo-f9-red-2-400x460.png">
                    <div class="div_smallimg owl-carousel">
                        <!-- <img src="img/chitietsanpham/oppo-f9-mau-do-1-org.jpg" onclick="changepic(this.src)">
                        <img src="img/chitietsanpham/oppo-f9-mau-do-2-org.jpg" onclick="changepic(this.src)">
                        <img src="img/chitietsanpham/oppo-f9-mau-do-3-org.jpg" onclick="changepic(this.src)"> -->
                    </div>
                </div>
            </div>
        </div>

        <div id="goiYSanPham"></div>
    </section>

    <script>addContainTaiKhoan();</script>

    <div class="footer"><script>addFooter();</script></div>

</body>

</html>
