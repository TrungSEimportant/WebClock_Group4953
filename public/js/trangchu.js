window.onload = function() {
    khoiTao();

    // Add image to banner
    addBanner("img/banners/banner0.jpg", "img/banners/banner0.jpg");
    var numBanner = 9; // Number of images banner
    for (var i = 1; i <= numBanner; i++) {
        var linkimg = "img/banners/banner" + i + ".jpg";
        addBanner(linkimg, linkimg);
    }

    // Start support library banner - Only run when the image is created in the banner
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items: 1.5,
        margin: 100,
        center: true,
        loop: true,
        smartSpeed: 450,
        autoplay: true,
        autoplayTimeout: 3500
    });

    // autocomplete for heart frame
    autocomplete(document.getElementById('search-box'), list_products);

    // add tags (keywords) to the search box
    var tags = ["Rolex", "Dior", "Seiko", "concord", "Chariol"];
    for (var t of tags) addTags(t, "index.html?search=" + t);

    // Add phone company list
    var company = ["hang1.png", "hang2.png", "hang3.png", "hang4.png", "hang5.png", "hang6.png",
        "hang7.png", "hang8.png", "hang9.png", "hang10.png", "hang11.png", "hang12.png",
        "hang13.png", "hang14.png", "hang15.png"
    ];
    for (var c of company) addCompany("img/company/" + c, c.slice(0, c.length - 4));

    //Add products to page
    var sanPhamPhanTich
    var sanPhamPhanTrang;

    var filters = getFilterFromURL();
    if (filters.length) { // with filter
        sanPhamPhanTich = phanTich_URL(filters, true);
        sanPhamPhanTrang = tinhToanPhanTrang(sanPhamPhanTich, filtersFromUrl.page || 1);
        if (!sanPhamPhanTrang.length) alertNotHaveProduct(false);
        else addProductsFrom(sanPhamPhanTrang);

        // Show product list
        document.getElementsByClassName('contain-products')[0].style.display = '';

    } else { // no filter: default main page will display hot products, ...
        var soLuong = (window.innerWidth < 1200 ? 4 : 5); // Small screen displays 4 products, large screen displays 5 products

        // Colors
        var yellow_red = ['#ff9c00', '#ec1f1f'];
        var blue = ['#42bcf4', '#004c70'];
        var green = ['#5de272', '#007012'];

        // Add product frames
        var div = document.getElementsByClassName('contain-khungSanPham')[0];
        addKhungSanPham('MOST OUTSTANDING', yellow_red, ['star=3', 'sort=rateCount-decrease'], soLuong, div);
        addKhungSanPham('NEW PRODUCT', blue, ['promo=moiramat', 'sort=rateCount-decrease'], soLuong, div);
        addKhungSanPham('0% INSTALLMENT', yellow_red, ['promo=tragop', 'sort=rateCount-decrease'], soLuong, div);
        addKhungSanPham('SHOCKING PRICES ONLINE', green, ['promo=giareonline', 'sort=rateCount-decrease'], soLuong, div);
        addKhungSanPham('BIG DISCOUNT', yellow_red, ['promo=giamgia'], soLuong, div);
        addKhungSanPham('CHEAP PRICE FOR EVERY HOUSE', green, ['price=0-3000000', 'sort=price'], soLuong, div);
    }

    //Add price options
    addPricesRange(0, 2000000);
    addPricesRange(2000000, 4000000);
    addPricesRange(4000000, 7000000);
    addPricesRange(7000000, 13000000);
    addPricesRange(13000000, 0);

    // Add promotion options
    addPromotion('giamgia');
    addPromotion('tragop');
    addPromotion('moiramat');
    addPromotion('giareonline');

    // Add select number of stars
    addStarFilter(3);
    addStarFilter(4);
    addStarFilter(5);

    // Add sort options
    addSortFilter('ascending', 'price', 'Price increases gradually');
    addSortFilter('decrease', 'price', 'Price decreases gradually');
    addSortFilter('ascending', 'star', 'Ascending Star');
    addSortFilter('decrease', 'star', 'Descending star');
    addSortFilter('ascending', 'rateCount', 'Ascending Rating');
    addSortFilter('decrease', 'rateCount', 'Descending rating');
    addSortFilter('ascending', 'name', 'Name A-Z');
    addSortFilter('decrease', 'name', 'Name Z-A');

    // Add selected filter
    addAllChoosedFilter();
};

var soLuongSanPhamMaxTrongMotTrang = 15;

// =========== Read data from url ============
var filtersFromUrl = { // Filters found on the url will be saved here.
    company: '',
    search: '',
    price: '',
    promo: '',
    star: '',
    page: '',
    sort: {
        by: '',
        type: 'ascending'
    }
}

function getFilterFromURL() { // split and return the above filter array url
    var fullLocation = window.location.href;
    fullLocation = decodeURIComponent(fullLocation);
    var dauHoi = fullLocation.split('?'); // split by sign ?

    if (dauHoi[1]) {
        var dauVa = dauHoi[1].split('&');
        return dauVa;
    }

    return [];
}

function phanTich_URL(filters, saveFilter) {
    // var filters = getFilterFromURL();
    var result = copyObject(list_products);

    for (var i = 0; i < filters.length; i++) {
        var dauBang = filters[i].split('=');

        switch (dauBang[0]) {
            case 'search':
                dauBang[1] = dauBang[1].split('+').join(' ');
                result = timKiemTheoTen(result, dauBang[1]);
                if (saveFilter) filtersFromUrl.search = dauBang[1];
                break;

            case 'price':
                if (saveFilter) filtersFromUrl.price = dauBang[1];

                var prices = dauBang[1].split('-');
                prices[1] = Number(prices[1]) || 1E10;
                result = timKiemTheoGiaTien(result, prices[0], prices[1]);
                break;

            case 'company':
                result = timKiemTheoCongTySanXuat(result, dauBang[1]);
                if (saveFilter) filtersFromUrl.company = dauBang[1];
                break;

            case 'star':
                result = timKiemTheoSoLuongSao(result, dauBang[1]);
                if (saveFilter) filtersFromUrl.star = dauBang[1];
                break;

            case 'promo':
                result = timKiemTheoKhuyenMai(result, dauBang[1]);
                if (saveFilter) filtersFromUrl.promo = dauBang[1];
                break;

            case 'page': // page is always at the end of the link
                if (saveFilter) filtersFromUrl.page = dauBang[1];
                break;

            case 'sort':
                var s = dauBang[1].split('-');
                var tenThanhPhanCanSort = s[0];

                switch (tenThanhPhanCanSort) {
                    case 'price':
                        if (saveFilter) filtersFromUrl.sort.by = 'price';
                        result.sort(function(a, b) {
                            var giaA = parseInt(a.price.split('.').join(''));
                            var giaB = parseInt(b.price.split('.').join(''));
                            return giaA - giaB;
                        });
                        break;

                    case 'star':
                        if (saveFilter) filtersFromUrl.sort.by = 'star';
                        result.sort(function(a, b) {
                            return a.star - b.star;
                        });
                        break;

                    case 'rateCount':
                        if (saveFilter) filtersFromUrl.sort.by = 'rateCount';
                        result.sort(function(a, b) {
                            return a.rateCount - b.rateCount;
                        });
                        break;

                    case 'name':
                        if (saveFilter) filtersFromUrl.sort.by = 'name';
                        result.sort(function(a, b) {
                            return a.name.localeCompare(b.name);
                        });
                        break;
                }

                if (s[1] == 'decrease') {
                    if (saveFilter) filtersFromUrl.sort.type = 'decrease';
                    result.reverse();
                }

                break;
        }
    }

    return result;
}

// add products from some array variable to the page
function addProductsFrom(list, vitri, soluong) {
    var start = vitri || 0;
    var end = (soluong ? start + soluong : list.length);
    for (var i = start; i < end; i++) {
        addProduct(list[i]);
    }
}

function clearAllProducts() {
    document.getElementById('products').innerHTML = "";
}

// Add products to the product frames
function addKhungSanPham(tenKhung, color, filter, len, ele) {
    // convert color to code
    var gradient = `background-image: linear-gradient(120deg, ` + color[0] + ` 0%, ` + color[1] + ` 50%, ` + color[0] + ` 100%);`
    var borderColor = `border-color: ` + color[0];
    var borderA = `	border-left: 2px solid ` + color[0] + `;
					border-right: 2px solid ` + color[0] + `;`;

    // open tag
    var s = `<div class="khungSanPham" style="` + borderColor + `">
				<h3 class="tenKhung" style="` + gradient + `">* ` + tenKhung + ` *</h3>
				<div class="listSpTrongKhung flexContain">`;

    // add <li> (product) to tag
    var spResult = phanTich_URL(filter, false);
    if (spResult.length < len) len = spResult.length;

    for (var i = 0; i < len; i++) {
        s += addProduct(spResult[i], null, true);
        // pass 'true' to return string and assign to s
    }

    // add view all button then close tag
    s += `	</div>
			<a class="xemTatCa" href="index.html?` + filter.join('&') + `" style="` + borderA + `">
				View all ` + spResult.length + ` Products
			</a>
		</div> <hr>`;

    // add frame to contain-frame
    ele.innerHTML += s;
}

// Pagination button
function themNutPhanTrang(soTrang, trangHienTai) {
    var divPhanTrang = document.getElementsByClassName('pagination')[0];

    var k = createLinkFilter('remove', 'page'); // xóa phân trang cũ
    if (k.indexOf('?') > 0) k += '&';
    else k += '?'; // thêm dấu

    if (trangHienTai > 1) // Nút về phân trang trước
        divPhanTrang.innerHTML = `<a href="` + k + `page=` + (trangHienTai - 1) + `"><i class="fa fa-angle-left"></i></a>`;

    if (soTrang > 1) // Chỉ hiện nút phân trang nếu số trang > 1
        for (var i = 1; i <= soTrang; i++) {
        if (i == trangHienTai) {
            divPhanTrang.innerHTML += `<a href="javascript:;" class="current">` + i + `</a>`

        } else {
            divPhanTrang.innerHTML += `<a href="` + k + `page=` + (i) + `">` + i + `</a>`
        }
    }

    if (trangHienTai < soTrang) { // Nút tới phân trang sau
        divPhanTrang.innerHTML += `<a href="` + k + `page=` + (trangHienTai + 1) + `"><i class="fa fa-angle-right"></i></a>`
    }
}

// Tính toán xem có bao nhiêu trang + trang hiện tại,
// Trả về mảng sản phẩm trong trang hiện tại tính được
function tinhToanPhanTrang(list, vitriTrang) {
    var sanPhamDu = list.length % soLuongSanPhamMaxTrongMotTrang;
    var soTrang = parseInt(list.length / soLuongSanPhamMaxTrongMotTrang) + (sanPhamDu ? 1 : 0);
    var trangHienTai = parseInt(vitriTrang < soTrang ? vitriTrang : soTrang);

    themNutPhanTrang(soTrang, trangHienTai);
    var start = soLuongSanPhamMaxTrongMotTrang * (trangHienTai - 1);

    var temp = copyObject(list);

    return temp.splice(start, soLuongSanPhamMaxTrongMotTrang);
}

// ======== TÌM KIẾM (Từ mảng list truyền vào, trả về 1 mảng kết quả) ============

// function timKiemTheoTen(list, ten, soluong) {}
// hàm Tìm-kiếm-theo-tên được đặt trong dungchung.js , do trang chitietsanpham cũng cần dùng tới nó

function timKiemTheoCongTySanXuat(list, tenCongTy, soluong) {
    var count, result = [];
    if (soluong < list.length) count = soluong;
    else count = list.length;

    for (var i = 0; i < list.length; i++) {
        if (list[i].company.toUpperCase().indexOf(tenCongTy.toUpperCase()) >= 0) {
            result.push(list[i]);
            count--;
            if (count <= 0) break;
        }
    }
    return result;
}

function timKiemTheoSoLuongSao(list, soLuongSaoToiThieu, soluong) {
    var count, result = [];
    if (soluong < list.length) count = soluong;
    else count = list.length;

    for (var i = 0; i < list.length; i++) {
        if (list[i].star >= soLuongSaoToiThieu) {
            result.push(list[i]);
            count--;
            if (count <= 0) break;
        }
    }

    return result;
}

function timKiemTheoGiaTien(list, giaMin, giaMax, soluong) {
    var count, result = [];
    if (soluong < list.length) count = soluong;
    else count = list.length;

    for (var i = 0; i < list.length; i++) {
        var gia = parseInt(list[i].price.split('.').join(''));
        if (gia >= giaMin && gia <= giaMax) {
            result.push(list[i]);
            count--;
            if (count <= 0) break;
        }
    }

    return result;
}

function timKiemTheoKhuyenMai(list, tenKhuyenMai, soluong) {
    var count, result = [];
    if (soluong < list.length) count = soluong;
    else count = list.length;

    for (var i = 0; i < list.length; i++) {
        if (list[i].promo.name == tenKhuyenMai) {
            result.push(list[i]);
            count--;
            if (count <= 0) break;
        }
    }

    return result;
}

function timKiemTheoRAM(list, luongRam, soluong) {
    var count, result = [];
    if (soluong < list.length) count = soluong;
    else count = list.length;

    for (var i = 0; i < list.length; i++) {
        if (parseInt(list[i].detail.ram) == luongRam) {
            result.push(list[i]);
            count--;
            if (count <= 0) break;
        }
    }

    return result;
}

// ========== LỌC ===============
// Thêm bộ lọc đã chọn vào html
function addChoosedFilter(type, textInside) {
    var link = createLinkFilter('remove', type);
    var tag_a = `<a href="` + link + `"><h3>` + textInside + ` <i class="fa fa-close"></i> </h3></a>`;

    var divChoosedFilter = document.getElementsByClassName('choosedFilter')[0];
    divChoosedFilter.innerHTML += tag_a;

    var deleteAll = document.getElementById('deleteAllFilter');
    deleteAll.style.display = "block";
    deleteAll.href = window.location.href.split('?')[0];
}

// Thêm nhiều bộ lọc cùng lúc 
function addAllChoosedFilter() {
    // Thêm từ biến lưu giữ bộ lọc 'filtersFromUrl'

    if (filtersFromUrl.company != '')
        addChoosedFilter('company', filtersFromUrl.company);

    if (filtersFromUrl.search != '')
        addChoosedFilter('search', '"' + filtersFromUrl.search + '"');

    if (filtersFromUrl.price != '') {
        var prices = filtersFromUrl.price.split('-');
        addChoosedFilter('price', priceToString(prices[0], prices[1]));
    }

    if (filtersFromUrl.promo != '')
        addChoosedFilter('promo', promoToString(filtersFromUrl.promo));

    if (filtersFromUrl.star != '')
        addChoosedFilter('star', starToString(filtersFromUrl.star));

    if (filtersFromUrl.sort.by != '') {
        var sortBy = sortToString(filtersFromUrl.sort.by);
        var kieuSapXep = (filtersFromUrl.sort.type == 'decrease' ? 'decreasing' : 'increasing');
        addChoosedFilter('sort', sortBy + kieuSapXep);
    }
}

// Tạo link cho bộ lọc
// type là 'add' hoặc 'remove',
// tương ứng 'thêm' bộ lọc mới có giá trị = valueAdd, hoặc 'xóa' bộ lọc đã có
function createLinkFilter(type, nameFilter, valueAdd) {
    var o = copyObject(filtersFromUrl);
    o.page = ''; // reset phân trang

    if (nameFilter == 'sort') {
        if (type == 'add') {
            o.sort.by = valueAdd.by;
            o.sort.type = valueAdd.type;

        } else if (type == 'remove') {
            o.sort.by = '';
        }

    } else {
        if (type == 'add') o[nameFilter] = valueAdd;
        else if (type == 'remove') o[nameFilter] = '';
    }

    var link = 'index.html'; //window.location.href.split('?')[0].replace('#', '');
    var h = false; // Đã có dấu hỏi hay chưa

    // thêm những filter trước sort
    for (var i in o) {
        if (i != 'sort' && o[i]) {
            link += (h ? '&' : '?') + i + '=' + o[i];
            h = true;
        }
    }

    // thêm sort (do sort trong filtersFromUrl là kiểu object, khác với kiểu string của những loại còn lại)
    // nên lúc tạo link sẽ khác những loại trên
    if (o.sort.by != '')
        link += (h ? '&' : '?') + 'sort=' + o.sort.by + '-' + o.sort.type;

    return link;
}

// Thông báo nếu không có sản phẩm
function alertNotHaveProduct(coSanPham) {
    var thongbao = document.getElementById('khongCoSanPham');
    if (!coSanPham) {
        thongbao.style.width = "auto";
        thongbao.style.opacity = "1";
        thongbao.style.margin = "auto"; // Căn giữa
        thongbao.style.transitionDuration = "1s"; // hiện ra từ từ

    } else {
        thongbao.style.width = "0";
        thongbao.style.opacity = "0";
        thongbao.style.margin = "0";
        thongbao.style.transitionDuration = "0s"; // Ngay lâp tức biến mất
    }
}

// ========== Lọc TRONG TRANG ============
// Hiển thị Sản phẩm
function showLi(li) {
    li.style.opacity = 1;
    li.style.width = "239px";
    li.style.borderWidth = "1px";
}
// Ẩn sản phẩm
function hideLi(li) {
    li.style.width = 0;
    li.style.opacity = 0;
    li.style.borderWidth = "0";
}

// Lấy mảng sản phẩm trong trang hiện tại (ở dạng tag html)
function getLiArray() {
    var ul = document.getElementById('products');
    var listLi = ul.getElementsByTagName('li');
    return listLi;
}

// lọc theo tên
function getNameFromLi(li) {
    var a = li.getElementsByTagName('a')[0];
    var h3 = a.getElementsByTagName('h3')[0];
    var name = h3.innerHTML;
    return name;
}

function filterProductsName(ele) {
    var filter = ele.value.toUpperCase();
    var listLi = getLiArray();
    var coSanPham = false;

    var soLuong = 0;

    for (var i = 0; i < listLi.length; i++) {
        if (getNameFromLi(listLi[i]).toUpperCase().indexOf(filter) > -1 &&
            soLuong < soLuongSanPhamMaxTrongMotTrang) {
            showLi(listLi[i]);
            coSanPham = true;
            soLuong++;

        } else {
            hideLi(listLi[i]);
        }
    }

    // Thông báo nếu không có sản phẩm
    alertNotHaveProduct(coSanPham);
}

// lọc theo số lượng sao
function getStarFromLi(li) {
    var a = li.getElementsByTagName('a')[0];
    var divRate = a.getElementsByClassName('ratingresult');
    if (!divRate) return 0;

    divRate = divRate[0];
    var starCount = divRate.getElementsByClassName('fa-star').length;

    return starCount;
}

function filterProductsStar(num) {
    var listLi = getLiArray();
    var coSanPham = false;

    for (var i = 0; i < listLi.length; i++) {
        if (getStarFromLi(listLi) >= num) {
            showLi(listLi[i]);
            coSanPham = true;

        } else {
            hideLi(listLi[i]);
        }
    }

    // Thông báo nếu không có sản phẩm
    alertNotHaveProduct(coSanPham);
}

// ================= Hàm khác ==================

// Thêm banner
function addBanner(img, link) {
    var newDiv = `<div class='item'>
						<a target='_blank' href=` + link + `>
							<img src=` + img + `>
						</a>
					</div>`;
    var banner = document.getElementsByClassName('owl-carousel')[0];
    banner.innerHTML += newDiv;
}

// Thêm hãng sản xuất
function addCompany(img, nameCompany) {
    var link = createLinkFilter('add', 'company', nameCompany);
    var new_tag = `<a href=` + link + `><img src=` + img + `></a>`;

    var khung_hangSanXuat = document.getElementsByClassName('companyMenu')[0];
    khung_hangSanXuat.innerHTML += new_tag;
}

// Thêm chọn mức giá
function addPricesRange(min, max) {
    var text = priceToString(min, max);
    var link = createLinkFilter('add', 'price', min + '-' + max);

    var mucgia = `<a href="` + link + `">` + text + `</a>`;
    document.getElementsByClassName('pricesRangeFilter')[0]
        .getElementsByClassName('dropdown-content')[0].innerHTML += mucgia;
}

// Thêm chọn khuyến mãi
function addPromotion(name) {
    var link = createLinkFilter('add', 'promo', name);

    var text = promoToString(name);
    var promo = `<a href="` + link + `">` + text + `</a>`;
    document.getElementsByClassName('promosFilter')[0]
        .getElementsByClassName('dropdown-content')[0].innerHTML += promo;
}

// Thêm chọn số lượng sao
function addStarFilter(value) {
    var link = createLinkFilter('add', 'star', value);

    var text = starToString(value);
    var star = `<a href="` + link + `">` + text + `</a>`;
    document.getElementsByClassName('starFilter')[0]
        .getElementsByClassName('dropdown-content')[0].innerHTML += star;
}

// Thêm chọn sắp xếp theo giá
function addSortFilter(type, nameFilter, text) {
    var link = createLinkFilter('add', 'sort', {
        by: nameFilter,
        type: type
    });
    var sortTag = `<a href="` + link + `">` + text + `</a>`;

    document.getElementsByClassName('sortFilter')[0]
        .getElementsByClassName('dropdown-content')[0].innerHTML += sortTag;
}

// Chuyển mức giá về dạng chuỗi tiếng việt
function priceToString(min, max) {
    if (min == 0) return 'Under ' + max / 1E6 + ' million';
    if (max == 0) return 'Above ' + min / 1E6 + ' million';
    return 'From ' + min / 1E6 + ' - ' + max / 1E6 + ' million';
}

// Chuyển khuyến mãi vễ dạng chuỗi tiếng việt
function promoToString(name) {
    switch (name) {
        case 'tragop':
            return 'Installment';
        case 'giamgia':
            return 'Discount';
        case 'giareonline':
            return 'Cheap online';
        case 'moiramat':
            return 'New Release';
    }
}

// Chuyển số sao về dạng chuỗi tiếng việt
function starToString(star) {
    return 'Above ' + (star - 1) + ' start';
}

// Chuyển các loại sắp xếp về dạng chuỗi tiếng việt
function sortToString(sortBy) {
    switch (sortBy) {
        case 'price':
            return 'price ';
        case 'star':
            return 'Start ';
        case 'rateCount':
            return 'Evaluate';
        case 'name':
            return 'Name ';
        default:
            return '';
    }
}

// Hàm Test, chưa sử dụng
function hideSanPhamKhongThuoc(list) {
    var allLi = getLiArray();
    for (var i = 0; i < allLi.length; i++) {
        var hide = true;
        for (var j = 0; j < list.length; j++) {
            if (getNameFromLi(allLi[i]) == list[j].name) {
                hide = false;
                break;
            }
        }
        if (hide) hideLi(allLi[i]);
    }
}