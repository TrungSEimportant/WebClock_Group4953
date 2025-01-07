<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact - World Of Watch  </title>
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
            <div class="lienhe-header">Contact to VTSTORE</div>
            <div class="lienhe-info">
                <div class="info-left">
                    <p>
                        <h2 style="color: gray"> VT JOINT STOCK COMPANY </h2><br />
                        <b>Address:</b> 158A Le Loi, Hai Chau 1 Ward, Hai Chau District, Da Nang City<br /><br />
                        <b>Telephone:</b> 0795625822 <br /><br />
                        <b>Hotline:</b> 0795625822 <br /><br />
                        <b>Website:</b> <a href="https://www.facebook.com/nhatvietax">Facebook</a> <br /><br />
                        <b>E-mail:</b> VTSTORE@gmail.com<br /><br />
                        <b>Tax code:</b> 01 02 03 04 05<br /><br />
                        <b>Bank account: MBBANK</b><br /><br />
                        <b>No. Account:</b> 0795625822 <br /><br />
                        <b>At Bank:</b> MBBANK - Da Nang Branch<br /><br /><br /><br />
                        <b>You can send us your contact by completing the form below. We will reply to your letter, please declare fully. We are pleased to serve and sincerely thank you for your interest and comments to VTSTORE Watches.</b>
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
                    <p style="font-size: 22px; color: gray">Send us your contact information: </p>
                    <hr />
                    <form name="formlh" onsubmit="return nguoidung()">
                        <table cellspacing="10px">
                            <tr>
                                <td>Full Name</td>
                                <td><input type="text" name="ht" size="40" maxlength="40" placeholder="Full name" autocomplete="off" required></td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td><input type="text" name="sdt" size="40" maxlength="11" minlength="10" placeholder="Phone numbers" required></td>
                            </tr>
                            <tr>
                                <td>Email Locate</td>
                                <td><input type="email" name="em" size="40" placeholder="Email" autocomplete="off" required></td>
                            </tr>
                            <tr>
                                <td>Title</td>
                                <td><input type="text" name="tde" size="40" maxlength="100" placeholder="Title" required>
                            </tr>
                            <tr>
                                <td>Content</td>
                                <td><textarea name="nd" rows="5" cols="44" maxlength="500" wrap="physical" placeholder="Contact content" required></textarea></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><button type="submit">Send us contact information</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="thongtinnhom">
                    <p style="font-size: 22px; color: gray">Group member information: </p>
                    <hr />
                    <table>
                        <tr>
                            <th>Full Name</th>
                            <th>Code Student</th>
                            <th>Sex</th>
                            <th>Class</th>
                            <th>Work Rate</th>
                        </tr>
                        <script>
                            var thongtin = [
                                ["Phan Nhất Việt", "22090004", "Nam", "22SE", "100%"],
                                ["Trần Anh Trung", "22090002", "Nam", "22SE", "100%"],
                                ["Lê Quang Lâm", "22090012", "Nam", "22SE", "100%"],


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
