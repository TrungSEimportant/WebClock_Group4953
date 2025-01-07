<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Introduce - World Of Watch</title>
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
                Introduce
            </h4>
            <div class="page-info">
                <p>VTTSTORE is not only a watch store, but also an ideal destination for those who are passionate about the art of timekeeping and affirming personal style.
                </p>
                <br />
                <p>
                With the motto "Quality affirms class", we are proud to bring customers genuine, sophisticated watch collections from the world's leading prestigious brands.<br /> Coming to VTSTORE, you will experience:

                <br />Diversity of designs: From classic, elegant designs to modern, sporty watch models, suitable for all styles and personalities.

                <br /> Guaranteed quality: 100% commitment to genuine products, accompanied by a reputable warranty and thoughtful after-sales service.

                <br /> Professional advice: A team of staff with in-depth knowledge of watches, ready to advise and support you in choosing the most satisfactory product. Luxurious space: Bringing a classy and comfortable shopping experience. VTSTORE - Where time
                    sublimates with your style!
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
