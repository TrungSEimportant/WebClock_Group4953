<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Admin - World Of Watch </title>
    <link rel="shortcut icon" href="img/favicon.ico" />

    <!-- Load font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">

    <!-- Chart JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

    <!-- Our files -->
    <link rel="stylesheet" href="css/admin/style.css">
    <link rel="stylesheet" href="css/admin/progress.css">

    <script src="/server-serve-products-data.js"></script>
    <script src="js/classes.js"></script>
    <script src="js/dungchung.js"></script>
    <script src="js/admin.js"></script>
</head>

<body>
    <header>
        <h2>VTT Store - Admin</h2>
    </header>

    <!-- Menu -->
    <aside class="sidebar">
        <ul class="nav">
            <li class="nav-title">MENU</li>
            <li class="nav-item"><a class="nav-link active"><i class="fa fa-home"></i> Home Page</a></li>
            <li class="nav-item"><a class="nav-link"><i class="fa fa-th-large"></i>Product</a></li>
            <li class="nav-item"><a class="nav-link"><i class="fa fa-file-text-o"></i> Order</a></li>
            <li class="nav-item"><a class="nav-link"><i class="fa fa-address-book-o"></i>Client</a></li>
            <li class="nav-item">
                <hr>
            </li>
            <li class="nav-item">
                <a href="index.html" class="nav-link" onclick="logOutAdmin(); return true;">
                    <i class="fa fa-arrow-left"></i> Log out (back to Home page)
                </a>
            </li>
        </ul>
    </aside>

    <!-- Khung hiển thị chính -->
    <div class="main">
        <div class="home">
            <div class="canvasContainer">
                <canvas id="myChart1"></canvas>
            </div>

            <div class="canvasContainer">
                <canvas id="myChart2"></canvas>
            </div>

            <div class="canvasContainer">
                <canvas id="myChart3"></canvas>
            </div>

            <div class="canvasContainer">
                <canvas id="myChart4"></canvas>
            </div>
        </div>

        <!-- Sản Phẩm -->
        <div class="sanpham">
            <table class="table-header">
                <tr>
                    <!-- Theo độ rộng của table content -->
                    <th title="Sắp xếp" style="width: 5%" onclick="sortProductsTable('stt')">Numerical order <i class="fa fa-sort"></i></th>
                    <th title="Sắp xếp" style="width: 10%" onclick="sortProductsTable('masp')">Code <i class="fa fa-sort"></i></th>
                    <th title="Sắp xếp" style="width: 40%" onclick="sortProductsTable('ten')">Name <i class="fa fa-sort"></i></th>
                    <th title="Sắp xếp" style="width: 15%" onclick="sortProductsTable('gia')">Price <i class="fa fa-sort"></i></th>
                    <th title="Sắp xếp" style="width: 15%" onclick="sortProductsTable('khuyenmai')">Promotion <i class="fa fa-sort"></i></th>
                    <th style="width: 15%">Action</th>
                </tr>
            </table>

            <div class="table-content">
            </div>

            <div class="table-footer">
                <select name="kieuTimSanPham">
                    <option value="ma">Search by Code</option>
                    <option value="ten">Search by Name</option>
                </select>
                <input type="text" placeholder="Search..." onkeyup="timKiemSanPham(this)">
                <button onclick="document.getElementById('khungThemSanPham').style.transform = 'scale(1)'; autoMaSanPham()">
                    <i class="fa fa-plus-square"></i>
                    Add Products
                </button>
            </div>

            <div id="khungThemSanPham" class="overlay">
                <span class="close" onclick="this.parentElement.style.transform = 'scale(0)';">&times;</span>
                <table class="overlayTable table-outline table-content table-header">
                    <tr>
                        <th colspan="2">Add Products</th>
                    </tr>
                    <tr>
                        <td>Product Code:</td>
                        <td><input type="text" id="maspThem"></td>
                    </tr>
                    <tr>
                        <td>Product Name:</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>Brand:</td>
                        <td>
                            <select name="chonCompany" onchange="autoMaSanPham(this.value)">
                                <script>
                                    var company = ["Omega", "Rolex", "Dior", "Casio", "Citizen", "Gucci","Concoro", "BVLGARI", "Philips", "Orizon", "Seiko"];
                                    for(var c of company) {
                                        document.writeln(`<option value="`+c+`">`+c+`</option>`);
                                    }
                                </script>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Image:</td>
                        <td>
                            <img class="hinhDaiDien" id="anhDaiDienSanPhamThem" src="">
                            <input type="file" accept="image/*" onchange="capNhatAnhSanPham(this.files, 'anhDaiDienSanPhamThem')">
                        </td>
                    </tr>
                    <tr>
                        <td>Price:</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>Number of Stars (Integer number 0->5):</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>Rating (Integer number):</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>Promotion:</td>
                        <td>
                            <select>
                                <option value="">Are not</option>
                                <option value="tragop">Installment</option>
                                <option value="giamgia">Discount</option>
                                <option value="giareonline">Cheap prices online</option>
                                <option value="moiramat">Newly released</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Promotion value:</td>
                        <td><input type="text" placeholder=""></td>
                    </tr>
                    <tr>
                        <th colspan="2">Technical Specifications</th>
                    </tr>
                    <tr>
                        <td>Brand Name:</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>Object:</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>Water resistant:</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>Glass material:</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>Size:</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>Machine Type:</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>Wire Material:</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>Thickness:</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>Utilities:</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="table-footer"> <button onclick="themSanPham()">ADD</button> </td>
                    </tr>
                </table>
            </div>
            <div id="khungSuaSanPham" class="overlay"></div>
        </div>
        <!-- // sanpham -->


        <!-- Đơn Hàng -->
        <div class="donhang">
            <table class="table-header">
                <tr>
                    <!-- Theo độ rộng của table content -->
                    <th title="Sắp xếp" style="width: 5%" onclick="sortDonHangTable('stt')">Numerical order <i class="fa fa-sort"></i></th>
                    <th title="Sắp xếp" style="width: 13%" onclick="sortDonHangTable('madon')">Code Order <i class="fa fa-sort"></i></th>
                    <th title="Sắp xếp" style="width: 7%" onclick="sortDonHangTable('khach')">Guest <i class="fa fa-sort"></i></th>
                    <th title="Sắp xếp" style="width: 20%" onclick="sortDonHangTable('sanpham')">Products <i class="fa fa-sort"></i></th>
                    <th title="Sắp xếp" style="width: 15%" onclick="sortDonHangTable('tongtien')">Total <i class="fa fa-sort"></i></th>
                    <th title="Sắp xếp" style="width: 10%" onclick="sortDonHangTable('ngaygio')">Day Time <i class="fa fa-sort"></i></th>
                    <th title="Sắp xếp" style="width: 10%" onclick="sortDonHangTable('trangthai')">Status <i class="fa fa-sort"></i></th>
                    <th style="width: 10%">Action</th>
                </tr>
            </table>

            <div class="table-content">
            </div>

            <div class="table-footer">
                <div class="timTheoNgay">
                    From: <input type="date" id="fromDate"> to: <input type="date" id="toDate">

                    <button onclick="locDonHangTheoKhoangNgay()"><i class="fa fa-search"></i> Search</button>
                </div>

                <select name="kieuTimDonHang">
                    <option value="ma">Search by Code</option>
                    <option value="khachhang">Search by Guest name</option>
                    <option value="trangThai">Search by Status</option>
                </select>
                <input type="text" placeholder="Tìm kiếm..." onkeyup="timKiemDonHang(this)">
            </div>

        </div>
        <!-- // don hang -->


        <!-- Khách hàng -->
        <div class="khachhang">
            <table class="table-header">
                <tr>
                    <!-- Theo độ rộng của table content -->
                    <th title="Sắp xếp" style="width: 5%" onclick="sortKhachHangTable('stt')">Numercial order <i class="fa fa-sort"></i></th>
                    <th title="Sắp xếp" style="width: 15%" onclick="sortKhachHangTable('hoten')">Fullname <i class="fa fa-sort"></i></th>
                    <th title="Sắp xếp" style="width: 20%" onclick="sortKhachHangTable('email')">Email <i class="fa fa-sort"></i></th>
                    <th title="Sắp xếp" style="width: 20%" onclick="sortKhachHangTable('taikhoan')">Account <i class="fa fa-sort"></i></th>
                    <th title="Sắp xếp" style="width: 10%" onclick="sortKhachHangTable('matkhau')">Password <i class="fa fa-sort"></i></th>
                    <th style="width: 10%">Action</th>
                </tr>
            </table>

            <div class="table-content">
            </div>

            <div class="table-footer">
                <select name="kieuTimKhachHang">
                    <option value="ten">Search by Name</option>
                    <option value="email">Search by Email</option>
                    <option value="taikhoan">Search by Account</option>
                </select>
                <input type="text" placeholder="Search..." onkeyup="timKiemNguoiDung(this)">
                <button onclick="openThemNguoiDung()"><i class="fa fa-plus-square"></i> ADD USER</button>
            </div>
        </div>
        <!-- // khach hang -->
    </div>
    <!-- // main -->


    <footer>

    </footer>
</body>

</html>
