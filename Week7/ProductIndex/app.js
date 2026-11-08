import TheSanPham from "./components/TheSanPham.js";

const { createApp } = Vue;

createApp({
    // Đăng ký component
    components: {
        "the-san-pham": TheSanPham
    },

    // Dữ liệu của component cha
    data() {
        return {
            products: [
                {
                    id: 1,
                    name: "IPhone 18 Pro Max",
                    price: 42000000,
                    image: "images/iphone.jpg",
                    descript: "IPhone 18 Pro Max là mẫu điện thoại flagship tối tân nhất của Apple vừa được ra mắt. Chiếc máy này đánh dấu bước chuyển mình vượt bậc nhờ thiết kế cụm Dynamic Island tinh gọn, hệ thống ba camera sau toàn bộ 48MP với khẩu độ biến thiên chuyên nghiệp và con chip A20 Pro mạnh mẽ vượt trội tối ưu cho các mô hình trí tuệ nhân tạo Apple Intelligence.",
                    quantity: 10
                },
                {
                    id: 2,
                    name: "Samsung Galaxy S25 Ultra",
                    price: 35000000,
                    image: "images/samsung.jpg",
                    descript: "Samsung Galaxy S25 Ultra là mẫu smartphone flagship tối tân nhất thuộc dòng S Series của Samsung. Chiếc điện thoại này khẳng định vị thế \"chiến thần Android\" nhờ sự lột xác về thiết kế mỏng nhẹ hơn, hiệu năng áp đảo từ vi xử lý tiến trình 3nm đầu tiên và hệ sinh thái Galaxy AI thấu hiểu ngôn ngữ bản địa sâu sắc.",
                    quantity: 5
                },
                {
                    id: 3,
                    name: "Realme 15 5G",
                    price: 8000000,
                    image: "images/realme.jpg",
                    descript: "Realme 15 5G là mẫu smartphone tầm trung bứt phá mạnh mẽ của realme, gây ấn tượng mạnh nhờ việc sở hữu viên pin \"khủng long\" dung lượng lớn hàng đầu phân khúc, màn hình siêu mượt và độ bền bỉ đạt chuẩn kháng nước tối đa.",
                    quantity: 0
                },
                {
                    id: 4,
                    name: "MacBook Air M3",
                    price: 28000000,
                    image: "images/macbook.jpg",
                    descript: "MacBook Air M3 là dòng laptop siêu mỏng nhẹ cao cấp của Apple, kết hợp hoàn hảo giữa độ mỏng ấn tượng, thời lượng pin bền bỉ và hiệu năng mạnh mẽ vượt trội từ chip M3 (tiến trình 3nm) để đáp ứng mượt mà từ công việc văn phòng đến chỉnh sửa đồ họa và xử lý AI.",
                    quantity: 7
                },
                {
                    id: 5,
                    name: "ThinkPad P1 Gen8",
                    price: 60000000,
                    image: "images/thinkpad.jpg",
                    descript: "Lenovo ThinkPad P1 Gen 8 là dòng máy trạm di động (Mobile Workstation) AI cao cấp thế hệ mới, được thiết kế để phá vỡ định kiến cồng kềnh của máy trạm truyền thống bằng cách gói gọn hiệu năng đồ họa chuyên nghiệp và chip xử lý AI tối tân bên trong một thân máy mỏng nhẹ như laptop doanh nhân.",
                    quantity: 5
                },
                {
                    id: 6,
                    name: "Dell XPS 15",
                    price: 15000000,
                    image: "images/dell.jpg",
                    descript: "Dell XPS 15 là dòng laptop cao cấp (Ultrabook) đầu bảng của Dell, nổi tiếng với sự kết hợp hoàn hảo giữa thiết kế sang trọng từ nhôm nguyên khối, màn hình tràn viền InfinityEdge siêu đẹp và cấu hình mạnh mẽ tối ưu cho các công việc đồ họa, sáng tạo nội dung.",
                    quantity: 0
                },
                {
                    id: 7,
                    name: "Chuột Logitech",
                    price: 500000,
                    image: "images/mouse.jpg",
                    descript: "Chuột Logitech có thiết kế tiện dụng, kết nối không dây và phù hợp cho học tập, làm việc, tối ưu tốc độ phản hồi bằng công nghệ không dây Lightspeed độc quyền và mắt đọc Hero siêu chính xác.",
                    quantity: 20
                },
                {
                    id: 8,
                    name: "Bàn phím cơ",
                    price: 1200000,
                    image: "images/keyboard.jpg",
                    descript: "Bàn phím cơ là loại bàn phím mà mỗi phím sử dụng một công tắc riêng biệt (switch) có lò xo và cơ chế cơ học bên trong để tạo độ nảy, mang lại cảm giác gõ chính xác, bền bỉ và phản hồi xúc giác tốt hơn hẳn bàn phím thường.",
                    quantity: 0
                }
            ]
        };
    }
}).mount("#app");