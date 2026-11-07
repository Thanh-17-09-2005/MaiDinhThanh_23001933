// Lấy hàm createApp từ Vue
const { createApp } = Vue;

createApp({
    // 1. Khai báo dữ liệu
    data() {
        return {
            customerName: "",
            showtime: "",
            showdate: "",
            ticketType: "normal",
            quantity: 1,
            hasCombo: false,

            // Lưu thông tin xác nhận sau khi đặt vé
            confirmation: null
        };
    },

    // 2. Tính toán các giá trị tự động
    computed: {
        // Giá của một vé
        ticketPrice() {
            if (this.ticketType === "vip") {
                return 100000;
            } 

            return 70000
        },

        // Kiểm tra số lượng vé có hợp lệ không
        isQuantityValid() {
            return (
                Number.isInteger(this.quantity) &&
                this.quantity >= 1 &&
                this.quantity <= 10
            );
        },

        // Kiểm tra toàn bộ điều kiện đặt vé
        isFormValid() {
            return (
                this.customerName.trim() !== "" &&
                this.ticketType !== "" &&
                this.isQuantityValid
            );
        },

        // Tổng tiền vé
        ticketTotal() {
            if (!this.isQuantityValid) {
                return 0;
            }

            return this.ticketPrice * this.quantity;
        },

        // Tiền combo
        comboPrice() {
            return this.hasCombo ? 45000 : 0;
        },

        // Tổng tiền cần thanh toán
        totalPrice() {
            return this.ticketTotal + this.comboPrice;
        }
    },

    // 3. Các hàm xử lý sự kiện
    methods: {
        // Định dạng số tiền theo tiền Việt Nam
        formatMoney(amount) {
            return Number(amount || 0).toLocaleString("vi-VN") + " đồng";
        },

        // Tăng số lượng vé
        increaseQuantity() {
            if (
                this.isQuantityValid &&
                this.quantity < 10
            ) {
                this.quantity++;
            }
        },

        // Giảm số lượng vé
        decreaseQuantity() {
            if (
                this.isQuantityValid &&
                this.quantity > 0
            ) {
                this.quantity--;
            }
        },

        // Xử lý khi nhấn nút Đặt vé
        bookTicket() {
            if (!this.isFormValid) {
                return;
            }

            // Lưu lại thông tin tại thời điểm đặt vé
            this.confirmation = {
                customerName: this.customerName,
                showtime: this.showtime,
                showdate: this.showdate,

                ticketType:
                    this.ticketType === "vip"
                        ? "Vé VIP"
                        : "Vé thường",

                quantity: this.quantity,
                hasCombo: this.hasCombo,
                totalPrice: this.totalPrice
            };
        },

        // Đặt lại form về trạng thái ban đầu
        resetForm() {
            this.customerName = "";
            this.showtime = "";
            this.showdate = "";
            this.ticketType = "normal";
            this.quantity = 1;
            this.hasCombo = false;
            this.confirmation = null;
        }
    }

}).mount("#app");