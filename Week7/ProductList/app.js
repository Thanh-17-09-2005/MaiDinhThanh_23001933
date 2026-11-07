const { createApp } = Vue;

createApp({
    // 1. Data
    data() {
        return {
            status: "Đang tải trang",

            keyword: "",
            searchMessage: "",
            selectedCategory: "",
            sortOrder: "",

            products: [
                {
                    id: 1,
                    name: "IPhone 18 Pro Max",
                    price: 42000000,
                    category: "Điện thoại",
                    quantity: 10
                },
                {
                    id: 2,
                    name: "Samsung Galaxy S25 Ultra",
                    price: 42000000,
                    category: "Điện thoại",
                    quantity: 5
                },
                {
                    id: 3,
                    name: "MacBook Air M3",
                    price: 28000000,
                    category: "Laptop",
                    quantity: 7
                },
                {
                    id: 4,
                    name: "Dell XPS 15",
                    price: 35000000,
                    category: "Laptop",
                    quantity: 0
                },
                {
                    id: 5,
                    name: "Chuột Logitech",
                    price: 500000,
                    category: "Phụ kiện",
                    quantity: 20
                },
                {
                    id: 6,
                    name: "Bàn phím cơ",
                    price: 1200000,
                    category: "Phụ kiện",
                    quantity: 0
                }
            ],

            newProduct: {
                name: "",
                price: null,
                category: "",
                quantity: null
            }
        };
    },

    // 2. Computed
    computed: {
        // Tìm kiếm + lọc + sắp xếp
        filteredProducts() {
            let result = this.products;

            // Tìm kiếm theo tên
            if (this.keyword.trim() !== "") {
                const searchText = this.keyword.toLowerCase().trim();

                result = result.filter(product => product.name.toLowerCase().includes(searchText));
            }

            // Lọc theo danh mục
            if (this.selectedCategory.trim() !== "") {
                result = result.filter(product => product.category === this.selectedCategory);
            }

            // Sắp xếp theo giá
            if (this.sortOrder === "asc") {
                result = [...result].sort((a, b) => a.price - b.price);
            } else if (this.sortOrder === "desc") {
                result = [...result].sort((a, b) => b.price - a.price);
            }

            return result;
        },

        // Tổng giá trị tồn kho
        totalInventoryValue() {
            return this.filteredProducts.reduce((total, product) => {
                return total + product.price * product.quantity;
            }, 0);
        }
    },

    // 3. Watch
    watch: {
        keyword(newValue) {
            if (newValue.length === 1) {
                this.searchMessage = "Vui lòng nhập ít nhất 2 ký tự để tìm kiếm!";
            } else {
                this.searchMessage = "";
            }
        }
    },

    // 4. Methods
    methods: {
        // Thêm sản phẩm
        addProduct() {
            const name = this.newProduct.name.trim();
            const price = this.newProduct.price;
            const category = this.newProduct.category;
            const quantity = this.newProduct.quantity;

            // Kiểm tra tên
            if (name === "") {
                alert("Tên sản phẩm không được để trống!");

                return;
            }

            // Kiểm tra giá
            if (price === "" || !Number.isFinite(price) || price <= 0) {
                alert("Giá sản phẩm phải lớn hơn 0!");
                return;
            }

            // Kiểm tra danh mục
            if (category === "") {
                alert("Vui lòng chọn danh mục!");
                return;
            }

            // Kiểm tra số lượng
            if (quantity === "" || !Number.isInteger(quantity) || quantity < 0) {
                alert("Số lượng tồn kho phải là số nguyên không âm!");
                return;
            }

            // Tạo sản phẩm mới
            const product = {
                id: this.products.length > 0 ? Math.max(...this.products.map(p => p.id)) + 1 : 1,
                name: name,
                price: price,
                category: category,
                quantity: quantity
            };

            this.products.push(product);

            alert("Thêm sản phẩm mới thành công!");

            // Reset form
            this.newProduct = {
                name: "",
                price: null,
                category: "",
                quantity: null
            };
        },

        // Xóa sản phẩm
        deleteProduct(id) {
            const confirmDelete = confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?");

            if (confirmDelete) {
                this.products = this.products.filter(product => product.id !== id);
                alert("Xóa sản phẩm thành công!")
            }
        },

        // Định dạng tiền
        formatPrice(price) {
            return price.toLocaleString("vi-VN") + " VNĐ";
        }
    },

    // 5. Mounted
    mounted() {
        this.status = "Sẵn sàng";
    }
}).mount("#app");