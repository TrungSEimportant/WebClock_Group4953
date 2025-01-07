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

    <!-- owl carousel libraries -->
    <link rel="stylesheet" href="js/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="js/owlcarousel/owl.theme.default.min.css">
    <script src="js/Jquery/Jquery.min.js"></script>
    <script src="js/owlcarousel/owl.carousel.min.js"></script>

    <!-- tidio - live chat -->
    <!-- <script src="//code.tidio.co/bfiiplaaohclhqwes5xivoizqkq56guu.js"></script> -->

    <!-- our files -->
    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/topnav.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="css/taikhoan.css">
    <link rel="stylesheet" href="css/trangchu.css">
    <link rel="stylesheet" href="css/home_products.css">
    <link rel="stylesheet" href="css/pagination_phantrang.css">
    <link rel="stylesheet" href="css/footer.css">
    <!-- js -->
    <script src="/server-serve-products-data.js"></script>
    <script src="js/classes.js"></script>
    <script src="js/dungchung.js"></script>
    <script src="js/trangchu.js"></script>

</head>

<body>
<script> addTopNav(); </script>

<section>
    <script> addHeader(); </script>

    <div class="banner">
        <div class="owl-carousel owl-theme"></div>
    </div> <!-- End Banner -->

    <img src="img/banners/blackFriday.gif" alt="" style="width: 100%;">

    <br>
    <div class="companyMenu group flexContain"></div>

    <div class="flexContain">

        <div class="pricesRangeFilter dropdown">
            <button class="dropbtn">Price</button>
            <div class="dropdown-content"></div>
        </div>

        <div class="promosFilter dropdown">
            <button class="dropbtn">Promotion</button>
            <div class="dropdown-content"></div>
        </div>

        <div class="starFilter dropdown">
            <button class="dropbtn">High Quantity</button>
            <div class="dropdown-content"></div>
        </div>

        <div class="sortFilter dropdown">
            <button class="dropbtn">Arrange</button>
            <div class="dropdown-content"></div>
        </div>

    </div> <!-- End of filter selection frame -->

    <div class="choosedFilter flexContain">
        <a id="deleteAllFilter" style="display: none;">
            <h3>Clear Filter</h3>
        </a>
    </div> <!-- Selected filters -->
    <hr>

    <!--By default, the page will be hidden when you first enter. If there is a filter, the page will appear -->
    <div class="contain-products" style="display:none">
        <div class="filterName">
            <input type="text" placeholder="Filter in page by name..." onkeyup="filterProductsName(this)">
        </div> <!-- End FilterName -->

        <ul id="products" class="homeproduct group flexContain">
            <div id="khongCoSanPham">
                <i class="fa fa-times-circle"></i>
                There are no products
            </div> <!-- End No products available -->
        </ul><!-- End products -->

        <div class="pagination"></div>
    </div>

    <!-- DivDisplay hot product frame, promotion, new launch... -->
    <div class="contain-khungSanPham" ></div>

</section> <!-- End Section -->

<script>
    addContainTaiKhoan(); addPlc();
</script>

<div class="footer"><script>addFooter();</script></div>

<i class="fa fa-arrow-up" id="goto-top-page" onclick="gotoTop()"></i>
</body>

</html>
