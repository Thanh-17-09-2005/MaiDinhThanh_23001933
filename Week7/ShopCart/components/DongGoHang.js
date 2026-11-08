const DongGioHang = {
    props: {
        id: {
            type: Number,
            required: true
        },

        name: {
            type: String,
            required: true
        },

        price: {
            type: Number,
            required: true
        },

        quantity: {
            type: Number,
            required: true
        },

        image: {
            type: String,
            default: "images/no-image.png"
        }
    },

    emits: ["doi-so-luong", "yeu-cau-xoa"],

    computed: {
        // Thành tiền
        totalPrice() {
            return this.price * this.quantity;
        }
    },

    methods: {
        // Tăng số lượng
        increaseQuantity() {
            if (this.quantity < 99) {
                this.$emit("doi-so-luong", {
                    id: this.id,
                    newQuantity: this.quantity + 1
                });
            }
        },

        // Giảm số lượng
        decreaseQuantity() {
            if (this.quantity > 1) {
                this.$emit("doi-so-luong", {
                    id: this.id,
                    newQuantity: this.quantity - 1
                });
            }
        },

        // Xóa sản phẩm
        deleteProduct() {
            this.$emit("yeu-cau-xoa", this.id);
        },

        // Định dạng tiền
        formatPrice(price) {
            return price.toLocaleString("vi-VN") + " VNĐ";
        }
    },

    template: `
        <div class="cart-item">
            <div class="product-info">
                <div class="product-info-details">
                    <h3>{{ name }}</h3>
                    <p>Đơn giá: {{ formatPrice(price) }}</p>
                </div>

                <img :src="image" :alt="name" class="product-image">
            </div>

            <div class="quantity-control">
                <button
                    @click="decreaseQuantity"
                    :disabled="quantity <= 1"
                >
                    -
                </button>

                <span class="quantity">{{ quantity }}</span>

                <button
                    @click="increaseQuantity"
                    :disabled="quantity >= 99"
                >
                    +
                </button>
            </div>

            <div class="item-total">
                {{ formatPrice(totalPrice) }}
            </div>

            <button class="delete-btn" @click="deleteProduct">
                Xóa
            </button>
        </div>
    `
};

export default DongGioHang;