const TheSanPham = {
    // 1. Khai báo props
    props: {
        name: {
            type: String,
            required: true
        },

        price: {
            type: Number,
            required: true
        },

        image: {
            type: String,
            default: "images/no-image.png"
        },

        descript: {
            type: String,
            default: "Chưa có mô tả sản phẩm."
        },

        quantity: {
            type: Number,
            required: true
        }
    },

    // 2. Data riêng của component
    data() {
        return {
            showDescription: false
        };
    },

    // 3. Methods
    methods: {
        toggleDescription() {
            this.showDescription = !this.showDescription;
        },

        formatPrice(price) {
            return price.toLocaleString("vi-VN") + " VNĐ";
        }
    },

    // 4. Template hiển thị
    template: `
        <div class="product-card">
            <img :src="image" :alt="name" class="product-image">
            
            <h3>{{ name }}</h3>

            <p class="price">Giá: {{ formatPrice(price) }}</p>
            
            <p>Số lượng tồn: {{ quantity }}</p>

            <span 
                v-if="quantity > 0"
                class = "in-stock"
            >
                Còn hàng
            </span>
            
            <span 
                v-else
                class = "out-stock"
            >
                Hết hàng
            </span>

            <div class="description-section">
                <button @click="toggleDescription">
                    {{ showDescription ? "Ẩn mô tả" : "Xem mô tả" }}
                </button>

                <p v-if="showDescription" class="description">{{ descript }}</p>
            </div>

            <button 
                class="buy-btn"
                :disabled="quantity === 0"
            >
                Mua
            </button>
        </div>
    `
};

export default TheSanPham;