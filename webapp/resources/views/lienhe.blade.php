<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liên hệ - Thế giới Đồng hồ </title>
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
    <link rel="stylesheet" href="css/lienhe.css">

    <!-- js -->
    <script src="/server-serve-products-data.js"></script>
    <script src="js/dungchung.js"></script>
    <script src="js/lienhe.js"></script>

</head>

<body>
    <script>
        addTopNav();
    </script>

    <section style="min-height: 85vh">
        <script>
            addHeader();
        </script>

        <div class="body-lienhe">
            <div class="lienhe-header">Liên hệ cửa hàng VTSTORE</div>
            <div class="lienhe-info">
                <div class="info-left">
                    <p>
                        <h2 style="color: gray"> CÔNG TY CỔ PHẦN VT </h2><br />
                        <b>Địa chỉ:</b> 158A Lê Lợi, phường Hải Châu 1, quận Hải Châu, thành phố Đà Nẵng<br /><br />
                        <b>Telephone:</b> 0795625822 <br /><br />
                        <b>Hotline:</b> 0795625822 <br /><br />
                        <b>Website:</b> <a href="https://www.facebook.com/nhatvietax">Facebook</a> <br /><br />
                        <b>E-mail:</b> VTSTORE@gmail.com<br /><br />
                        <b>Mã số thuế:</b> 01 02 03 04 05<br /><br />
                        <b>Tài khoản ngân hàng : MBBANK</b><br /><br />
                        <b>Số TK:</b> 0795625822 <br /><br />
                        <b>Tại Ngân hàng:</b> MBBANK - Chi nhánh Đà Nẵng<br /><br /><br /><br />
                        <b>Quý khách có thể gửi liên hệ tới chúng tôi bằng cách hoàn tất biểu mẫu dưới đây. Chúng tôi sẽ trả lời thư của quý khách, xin vui lòng khai báo đầy đủ. Hân hạnh phục vụ và chân thành cảm ơn sự quan tâm, đóng góp ý kiến đến Đồng hồ VTSTORE.</b>
                    </p>
                </div>
                <div class="info-right">
                    <iframe width="100%" height="450" src="https://maps.google.com/maps?width=100%&amp;height=450&amp;hl=en&amp;coord=10.759660000323064,106.68192160315813&amp;q=16.071068294331155, 108.220247143475+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=16&amp;iwloc=B&amp;output=embed"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/create-google-map/">Embed
                            Google Map
                        </a>
                    </iframe>
                    <br />
                </div>
            </div>
            <div class="lienhe-info">

                <div class="guithongtin">
                    <p style="font-size: 22px; color: gray">Gửi thông tin liên lạc cho chúng tôi: </p>
                    <hr />
                    <form name="formlh" onsubmit="return nguoidung()">
                        <table cellspacing="10px">
                            <tr>
                                <td>Họ và tên</td>
                                <td><input type="text" name="ht" size="40" maxlength="40" placeholder="Họ tên" autocomplete="off" required></td>
                            </tr>
                            <tr>
                                <td>Điện thoại liên hệ</td>
                                <td><input type="text" name="sdt" size="40" maxlength="11" minlength="10" placeholder="Điện thoại" required></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ Email</td>
                                <td><input type="email" name="em" size="40" placeholder="Email" autocomplete="off" required></td>
                            </tr>
                            <tr>
                                <td>Tiêu đề</td>
                                <td><input type="text" name="tde" size="40" maxlength="100" placeholder="Tiêu đề" required>
                            </tr>
                            <tr>
                                <td>Nội dung</td>
                                <td><textarea name="nd" rows="5" cols="44" maxlength="500" wrap="physical" placeholder="Nội dung liên hệ" required></textarea></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><button type="submit">Gửi thông tin liên hệ</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="thongtinnhom">
                    <p style="font-size: 22px; color: gray">Thông tin thành viên nhóm: </p>
                    <hr />
                    <table>
                        <tr>
                            <th>Họ tên</th>
                            <th>MSSV</th>
                            <th>Giới tính</th>
                            <th>Lớp</th>
                            <th>Tỉ lệ công việc</th>
                        </tr>
                        <script>
                            var thongtin = [
                                ["Phan Nhất Việt", "22090004", "Nam", "22SE", "100%"],
                                ["Trần Anh Trung", "220900..", "Nam", "22SE", "100%"],
                                ["Lê Quang Lâm", "220900..", "Nam", "22SE", "100%"],
                                ["Ngọc Nghĩa", "220900..", "Nam", "22SE", "100%"],
                                ["Duy Bảo", "220900..", "Nam", "22SE", "100%"],

                            ]
                            for (var i = 0; i < thongtin.length; i++) {
                                document.write(
                                    `
                                    <tr>
                                        <td>` +
                                    thongtin[i][0] + `</td>
                                        <td>` +
                                    thongtin[i][1] + `</td>
                                        <td>` +
                                    thongtin[i][2] + `</td>
                                        <td>` +
                                    thongtin[i][3] + `</td>
                                        <td>` +
                                    thongtin[i][4] +
                                    `</td>
                                    </tr>
                                `
                                )
                            }
                        </script>
                    </table>
                </div>

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
