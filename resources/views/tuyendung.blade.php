<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recruitment - World Of Watch </title>
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
    <link rel="stylesheet" href="css/tuyendung.css">

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

        <div class="body-tuyendung">
            <div class="tuyendung-header">Recruitment</div>
            <div class="tuyendung-info">
                <h1 class="tieude">SALES AGENT</h1><br/>

                <b>1.Describe:</b>
                <ul class="tuyendung-noidung">
                    <li>Cheerfully and politely greet customers when they enter the store.</li>
                    <li>
                        Find out needs, consult information about: Products, services, promotions, after-sales services for customers.
                    </li>
                    <li>Arrange products neatly and reasonably, clean the store at the end of the shift.</li>
                    <li>Capture and update information and features of new products: product form, material, color, design...</li>
                </ul>

                <b>2.WORKING TIME</b>
                <ul class="tuyendung-noidung">
                    <li><span>From 18h - 21h30 p.m every day of the week</span></li>
                    <li>3 Day off / Month</li>
                </ul>

                <b>3.WORK LOCATION</b>
                <ul class="tuyendung-noidung">
                    <span>VTSTORE watch store, VNUK, DA NANG</span>
                </ul>

                <b>4.REQUEST</b>
                <ul class="tuyendung-noidung">
                    <li>Male/Female, age 18 - 25.</li>
                    <li>Good looking, friendly, welcoming.</li>
                    <li>Have good communication, persuasion and negotiation skills with customers.</li>
                    <li>Persistent, dynamic, honest, enthusiastic.</li>
                    <li>Love technology, communication, customer care. Priority is given to candidates who have worked at phone and electronics stores.</li>
                    <li><span>Number of vacancies: 02</span></li>
                </ul>

                <b>5.INTEREST</b>
                <ul class="tuyendung-noidung">
                    <li>Income: <span>10.000.000 - 15.000.000 VNĐ/ Month.</span></li>
                    <li>Commission based on store sales revenue.</li>
                    <li>Additional bonus according to store growth.</li>
                    <li> Allowances and bonuses according to company policies (Overtime, parking, birthdays, holidays, etc.)</li>
                    <li>Enjoy all policies according to labor law.</li>
                    <li>Be trained in expertise and skills before working.</li>
                    <li>Be exposed to the latest technology products today.</li>
                </ul>

                <b>6.CONTACT TO</b>
                <ul class="tuyendung-noidung">
                    <li>Candidates fill in information according to the link:
                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSdNjF8wP7v7ocBDVRUFGqRCHrV0lNPky33Sn3GXVgSVYe7dMA/viewform" target="_blank">
                            <span>Recruitment</span>
                        </a>
                    </li>
                    <li>Or submit your application directly at <b>Administrative and Personnel Department - 158A Le Loi, Hai Chau 1 Ward, Hai Chau District, Da Nang City.</b></li>
                    <li>Or send your CV via email:<b> VTSTORE@gmail.com
                    </b></li>
                </ul>
            </div>
        </div>

    </section>

    <script>
        addContainTaiKhoan()
    </script>

    <div class="footer">
        <script>
            addFooter();
        </script>

    </div>

    <i class="fa fa-arrow-up" id="goto-top-page" onclick="gotoTop()"></i>
</body>

</html>
