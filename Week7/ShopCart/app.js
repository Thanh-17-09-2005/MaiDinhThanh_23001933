import DongGioHang from "./components/DongGoHang.js";

const { createApp } = Vue;

createApp({
    components: {
        "dong-gio-hang": DongGioHang
    },

    data() {
        return {
            carts: [
                {
                    id: 1,
                    name: "Bút bi",
                    price: 3000,
                    quantity: 2,
                    image: "images/butbi.jpg"
                },
                {
                    id: 2,
                    name: "Vở thếp Campus",
                    price: 5000,
                    quantity: 5,
                    image: "images/vothep.jpg"
                },
                {
                    id: 3,
                    name: "Thước Hồng Hà",
                    price: 3500,
                    quantity: 10,
                    image: "images/thuoc.jpg"
                },
                {
                    id: 4,
                    name: "Bút chì Thiên Long",
                    price: 4000,
                    quantity: 6,
                    image: "images/butchi.jpg"
                }
            ]
        };
    },

    computed: {
        // Tổng số lượng các sản phẩm
        totalQuantity() {
            return this.carts.reduce((total, pr) => {
                return total + pr.quantity;
            }, 0);
        },

        // Tổng tiền
        totalPrice() {
            return this.carts.reduce((total, pr) => {
                return total + pr.price * pr.quantity;
            }, 0);
        }
    },

    methods: {
        // Cập nhật số lượng
        updateQuantity(data) {
            const {id, newQuantity } = data;

            // Kiểm tra số lượng phải là số nguyên từ 1 đến 99
            if (!Number.isInteger(newQuantity) || newQuantity < 1 || newQuantity > 99) {
                return;
            }

            // Tìm sản phẩm theo id
            const produce = this.carts.find(pr => pr.id === id);

            if (produce) {
                // Component cha cập nhật dữ liệu
                produce.quantity = newQuantity;
            }
        },

        // Xóa sản phẩm
        deleteProduct(id) {
            this.carts = this.carts.filter(pr => pr.id !== id);
        },

        // Định dạng tiền
        formatPrice(price) {
            return price.toLocaleString("vi-VN") + " VNĐ";
        }
    }
}).mount("#app");