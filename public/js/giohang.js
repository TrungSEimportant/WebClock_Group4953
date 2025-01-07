var currentuser; // user hiện tại, biến toàn cục
window.onload = function() {
    khoiTao();

    // autocomplete cho khung tim kiem
    autocomplete(document.getElementById('search-box'), list_products);

    // thêm tags (từ khóa) vào khung tìm kiếm
    var tags = ["Rolex", "Dior", "Seiko", "Concord", "Citizen"];
    for (var t of tags) addTags(t, "index.html?search=" + t)

    currentuser = getCurrentUser();
    addProductToTable(currentuser);
}

function addProductToTable(user) {
    var table = document.getElementsByClassName('listSanPham')[0];

    var s = `
		<tbody>
			<tr>
				<th>Numerical order</th>
				<th>Product</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Make money</th>
				<th>Time</th>
				<th>Delete</th>
			</tr>`;

    if (!user) {
        s += `
			<tr>
				<td colspan="7"> 
					<h1 style="color:red; background-color:white; font-weight:bold; text-align:center; padding: 15px 0;">
						You are not logged in yet!!
					</h1> 
				</td>
			</tr>
		`;
        table.innerHTML = s;
        return;
    } else if (user.products.length == 0) {
        s += `
			<tr>
				<td colspan="7"> 
					<h1 style="color:green; background-color:white; font-weight:bold; text-align:center; padding: 15px 0;">
						Cart is empty!!
					</h1> 
				</td>
			</tr>
		`;
        table.innerHTML = s;
        return;
    }

    var totalPrice = 0;
    for (var i = 0; i < user.products.length; i++) {
        var masp = user.products[i].ma;
        var soluongSp = user.products[i].soluong;
        var p = timKiemTheoMa(list_products, masp);
        var price = (p.promo.name == 'giareonline' ? p.promo.value : p.price);
        var thoigian = new Date(user.products[i].date).toLocaleString();
        var thanhtien = stringToNum(price) * soluongSp;

        s += `
			<tr>
				<td>` + (i + 1) + `</td>
				<td class="noPadding imgHide">
					<a target="_blank" href="chitietsanpham.html?` + p.name.split(' ').join('-') + `" title="See details">
						` + p.name + `
						<img src="` + p.img + `">
					</a>
				</td>
				<td class="alignRight">` + price + ` ₫</td>
				<td class="soluong" >
					<button onclick="giamSoLuong('` + masp + `')"><i class="fa fa-minus"></i></button>
					<input size="1" onchange="capNhatSoLuongFromInput(this, '` + masp + `')" value=` + soluongSp + `>
					<button onclick="tangSoLuong('` + masp + `')"><i class="fa fa-plus"></i></button>
				</td>
				<td class="alignRight">` + numToString(thanhtien) + ` ₫</td>
				<td style="text-align: center" >` + thoigian + `</td>
				<td class="noPadding"> <i class="fa fa-trash" onclick="xoaSanPhamTrongGioHang(` + i + `)"></i> </td>
			</tr>
		`;
        // Chú ý nháy cho đúng ở giamsoluong, tangsoluong
        totalPrice += thanhtien;
    }

    s += `
			<tr style="font-weight:bold; text-align:center">
				<td colspan="4">TOTAL: </td>
				<td class="alignRight">` + numToString(totalPrice) + ` ₫</td>
				<td class="thanhtoan" onclick="thanhToan()"> Pay </td>
				<td class="xoaHet" onclick="xoaHet()"> Delete all </td>
			</tr>
		</tbody>
	`;

    table.innerHTML = s;
}

function xoaSanPhamTrongGioHang(i) {
    if (window.confirm('Confirm cancellation of purchase')) {
        currentuser.products.splice(i, 1);
        capNhatMoiThu();
    }
}

function thanhToan() {
    var c_user = getCurrentUser();
    if (c_user.off) {
        alert('Your account is currently locked so purchases cannot be made!');
        addAlertBox('Your account has been locked by Admin.', '#aa0000', '#fff', 10000);
        return;
    }

    if (!currentuser.products.length) {
        addAlertBox('There are no items to pay for!!', '#ffb400', '#fff', 2000);
        return;
    }
    if (window.confirm('Checkout cart?')) {
        currentuser.donhang.push({
            "sp": currentuser.products,
            "ngaymua": new Date(),
            "tinhTrang": 'Pending'
        });
        currentuser.products = [];
        capNhatMoiThu();
        addAlertBox('The products have been placed on the order and are awaiting processing.', '#17c671', '#fff', 4000);
    }
}

function xoaHet() {
    if (currentuser.products.length) {
        if (window.confirm('Are you sure you want to delete all products in your cart!!')) {
            currentuser.products = [];
            capNhatMoiThu();
        }
    }
}

// Cập nhật số lượng lúc nhập số lượng vào input
function capNhatSoLuongFromInput(inp, masp) {
    var soLuongMoi = Number(inp.value);
    if (!soLuongMoi || soLuongMoi <= 0) soLuongMoi = 1;

    for (var p of currentuser.products) {
        if (p.ma == masp) {
            p.soluong = soLuongMoi;
        }
    }

    capNhatMoiThu();
}

function tangSoLuong(masp) {
    for (var p of currentuser.products) {
        if (p.ma == masp) {
            p.soluong++;
        }
    }

    capNhatMoiThu();
}

function giamSoLuong(masp) {
    for (var p of currentuser.products) {
        if (p.ma == masp) {
            if (p.soluong > 1) {
                p.soluong--;
            } else {
                return;
            }
        }
    }

    capNhatMoiThu();
}

function capNhatMoiThu() { // Mọi thứ
    animateCartNumber();

    // cập nhật danh sách sản phẩm trong localstorage
    setCurrentUser(currentuser);
    updateListUser(currentuser);

    // cập nhật danh sách sản phẩm ở table
    addProductToTable(currentuser);

    // Cập nhật trên header
    capNhat_ThongTin_CurrentUser();
}