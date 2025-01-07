<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Warrantly - World Of Watch</title>
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
    <link rel="stylesheet" href="css/baohanh.css">
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

        <table>
            <tr>
                <td colspan="4" class="header-table">
                    <marquee behavior="scroll" direction=left>VTSTORE warranty centers</marquee>
                </td>
            </tr>
            <tr>
                <th class="col1">STT</th>
                <th class="col2">Location</th>
                <th class="col3">Phone Number</th>
                <th class="col4">Working Time</th>
            </tr>

            <script>
                var trungtam = [
                    ["158A Le Loi, Hai Chau 1 ward, Hai Chau district, Da Nang city", "0795625822", "8:00 - 17:00"],

                ]

                for (var i = 0; i < trungtam.length; i++) {
                    var link = 'https://maps.google.com/maps?q=' + trungtam[i][0];
                    document.write(`
                        <tr>
                            <td class="col1">` + (i + 1) + `</td>
                            <td class="col2">
                                <a href="` + link + `" target="_blank" title="See Map">
                                    ` + trungtam[i][0] + `
                                </a>
                            </td>
                            <td class="col3">` + trungtam[i][1] + `</td>
                            <td class="col4">` + trungtam[i][2] + `</td>
                        </tr>
                    `)
                }
            </script>
        </table>

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
